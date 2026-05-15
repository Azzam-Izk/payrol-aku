<?php

namespace App\Livewire\Attendance;

use Livewire\Component;
use App\Models\Attendance;
use App\Models\Employee;
use Livewire\WithPagination;

class AttendanceManager extends Component
{
    use WithPagination;

    public $attendance_id = null;
    public $employee_id = '';
    public $date = '';
    public $status = 'hadir';
    public $check_in = '';
    public $check_out = '';
    
    public $isEditMode = false;
    public $search = '';

    public function mount()
    {
        $this->date = date('Y-m-d');
        $this->check_in = date('H:i');
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function store()
    {
        $this->validate([
            'employee_id' => 'required|exists:employees,id',
            'date' => 'required|date',
            'status' => 'required|in:hadir,sakit,izin,alpa',
        ]);

        Attendance::updateOrCreate(
            ['id' => $this->attendance_id],
            [
                'employee_id' => $this->employee_id,
                'date' => $this->date,
                'status' => $this->status,
                'check_in' => empty($this->check_in) ? null : $this->check_in,
                'check_out' => empty($this->check_out) ? null : $this->check_out,
            ]
        );

        session()->flash('success', $this->isEditMode ? 'Absensi diperbarui.' : 'Absensi ditambahkan.');
        $this->resetForm();
    }

    public function edit($id)
    {
        $att = Attendance::findOrFail($id);
        $this->attendance_id = $att->id;
        $this->employee_id = $att->employee_id;
        $this->date = $att->date;
        $this->status = $att->status;
        $this->check_in = $att->check_in;
        $this->check_out = $att->check_out;
        $this->isEditMode = true;
    }

    public function delete($id)
    {
        Attendance::findOrFail($id)->delete();
        session()->flash('success', 'Absensi dihapus.');
    }

    public function resetForm()
    {
        $this->reset(['attendance_id', 'employee_id', 'status', 'check_in', 'check_out', 'isEditMode']);
        $this->date = date('Y-m-d');
        $this->check_in = date('H:i');
        $this->resetValidation();
    }

    public function render()
    {
        $query = Attendance::with('employee');
        
        if (!empty($this->search)) {
            $query->whereHas('employee', function($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('nik', 'like', '%' . $this->search . '%');
            });
        }

        return view('livewire.attendance.attendance-manager', [
            'attendances' => $query->orderBy('date', 'desc')->orderBy('id', 'desc')->paginate(10),
            'employees' => Employee::orderBy('name')->get()
        ])->layout('layouts.app');
    }
}
