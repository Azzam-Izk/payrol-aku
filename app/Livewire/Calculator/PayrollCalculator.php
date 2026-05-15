<?php

namespace App\Livewire\Calculator;

use Livewire\Component;
use App\Models\Payroll;
use App\Models\Employee;
use Illuminate\Validation\Rule;

class PayrollCalculator extends Component
{   
    public ?int $employee_id = null;
    public ?int $basic_salary = 0;
    public ?int $allowance = 0;
    public ?int $deduction = 0;
    public string $month_year = '';

    public ?int $net_salary = 0;

    public function mount()
    {
        $this->month_year = now()->locale('id')->isoFormat('MMMM YYYY');
    }

    public function updatedEmployeeId($value)
    {
        if ($value) {
            $employee = Employee::with('position')->find($value);
            if ($employee && $employee->position) {
                $this->basic_salary = $employee->position->basic_salary;
                $this->calculateNet();
            }
        } else {
            $this->basic_salary = 0;
            $this->calculateNet();
        }
    }

    public function updated($field)
    {
        if (in_array($field, ['basic_salary', 'allowance', 'deduction'])) {
            $this->calculateNet();
        }
    }

    private function calculateNet()
    {
        $this->net_salary = max(0, (($this->basic_salary ?? 0) + ($this->allowance ?? 0)) - ($this->deduction ?? 0));
    }

    public function savePayroll()
    {
        $this->validate([
            'employee_id' => [
                'required',
                'exists:employees,id',
                Rule::unique('payrolls', 'employee_id')->where('month_year', $this->month_year)
            ],
            'basic_salary' => 'required|integer|min:0',
            'month_year' => 'required|string',
        ], [
            'employee_id.required' => 'Pilih karyawan.',
            'employee_id.unique' => 'Slip gaji untuk karyawan ini di bulan tersebut sudah ada.',
        ]);

        Payroll::create([
            'employee_id' => $this->employee_id,
            'basic_salary' => $this->basic_salary,
            'allowance' => $this->allowance,
            'deduction' => $this->deduction,
            'net_salary' => $this->net_salary,
            'month_year' => $this->month_year,
        ]);

        session()->flash('success', 'Slip gaji berhasil diterbitkan untuk ' . $this->month_year);
        
        $this->reset(['employee_id', 'basic_salary', 'allowance', 'deduction', 'net_salary']);
        $this->month_year = now()->locale('id')->isoFormat('MMMM YYYY');
    }
    
    public function render()
    {
        return view('livewire.calculator.payroll-calculator', [
            'employees' => Employee::orderBy('name', 'asc')->get(),
        ])->layout('layouts.app');
    }
}
