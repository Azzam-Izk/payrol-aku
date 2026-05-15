<?php

namespace App\Livewire\Position;

use Livewire\Component;
use App\Models\Position;
use Livewire\WithPagination;

class PositionManager extends Component
{
    use WithPagination;

    public $name = '';
    public $basic_salary = 0;
    public $position_id = null;
    public $isEditMode = false;
    public $isFormOpen = false;
    public $search = '';

    protected $rules = [
        'name' => 'required|min:2',
        'basic_salary' => 'required|numeric|min:0',
    ];

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
        $this->validate();

        Position::updateOrCreate(
            ['id' => $this->position_id],
            [
                'name' => $this->name,
                'basic_salary' => $this->basic_salary,
            ]
        );

        session()->flash('success', $this->isEditMode ? 'Jabatan berhasil diperbarui.' : 'Jabatan berhasil ditambahkan.');
        $this->isFormOpen = false;
        $this->resetForm();
    }

    public function edit($id)
    {
        $position = Position::findOrFail($id);
        $this->position_id = $position->id;
        $this->name = $position->name;
        $this->basic_salary = $position->basic_salary;
        $this->isEditMode = true;
        $this->isFormOpen = true;
    }

    public function delete($id)
    {
        Position::findOrFail($id)->delete();
        session()->flash('success', 'Jabatan berhasil dihapus.');
    }

    public function resetForm()
    {
        $this->reset(['position_id', 'name', 'basic_salary', 'isEditMode']);
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.position.position-manager', [
            'positions' => Position::where('name', 'like', '%' . $this->search . '%')
                ->orderBy('id', 'desc')
                ->paginate(10)
        ])->layout('layouts.app');
    }
}
