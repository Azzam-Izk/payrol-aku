<?php

namespace App\Livewire\Employee;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Division;
use Livewire\WithPagination;

class EmployeeManager extends Component
{
    use WithPagination;

    public ?int $employee_id = null;
    public bool $isEditMode = false;
    public bool $isFormOpen = false;
    public string $search = '';

    public string $nik ='';
    public string $name = '';
    public string $phone = '';
    public ?int $position_id = null;
    public ?int $division_id = null;
    public string $address ='';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function create()
    {
        $this->resetForm();
        $this->isFormOpen = true;
    }

    public function closeForm()
    {
        $this->isFormOpen = false;
        $this->resetForm();
    }

    public function store()
    {
        $this->validate([
            'nik' => 'required|unique:employees,nik,' . $this->employee_id,
            'name' => 'required|min:3',
            'phone' => 'required',
            'position_id' => 'required|exists:positions,id',
            'division_id' => 'required|exists:divisions,id',
            'address' => 'required|min:5',
        ]);

        Employee::updateOrCreate(
            ['id' => $this->employee_id],
            [
                'nik' => $this->nik,
                'name' => $this->name,
                'phone' => $this->phone,
                'position_id' => $this->position_id,
                'division_id' => $this->division_id,
                'address' => $this->address,
            ]
        );

        session()->flash('success', $this->isEditMode ? 'Data karyawan berhasil diperbarui.' : 'Data karyawan berhasil ditambahkan.');
        $this->isFormOpen = false;
        $this->resetForm();
    }

    public function edit(int $id)
    {
        $emp = Employee::findOrFail($id);
        $this->employee_id = $emp->id;
        $this->nik         = $emp->nik;
        $this->name        = $emp->name;
        $this->position_id = $emp->position_id;
        $this->division_id = $emp->division_id;
        $this->phone       = $emp->phone;
        $this->address     = $emp->address;
        $this->isEditMode  = true;
        $this->isFormOpen  = true;
    }

    public function delete(int $id)
    {
        Employee::findOrFail($id)->delete();
        session()->flash('success', 'Karyawan berhasil dihapus.');
    }

    public function resetForm()
    {
        $this->reset(['employee_id', 'nik', 'name', 'phone', 'position_id', 'division_id', 'address', 'isEditMode']);
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.employee.employee-manager', [
            'employees' => Employee::with(['position', 'division'])
                ->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('nik', 'like', '%' . $this->search . '%')
                ->orderBy('id', 'desc')
                ->paginate(10),
            'positions' => Position::all(),
            'divisions' => Division::all(),
        ])->layout('layouts.app');
    }
}
