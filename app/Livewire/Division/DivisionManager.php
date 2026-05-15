<?php

namespace App\Livewire\Division;

use Livewire\Component;
use App\Models\Division;
use Livewire\WithPagination;

class DivisionManager extends Component
{
    use WithPagination;

    public $name = '';
    public $division_id = null;
    public $isEditMode = false;
    public $isFormOpen = false;
    public $search = '';

    protected $rules = [
        'name' => 'required|min:2',
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

        Division::updateOrCreate(
            ['id' => $this->division_id],
            ['name' => $this->name]
        );

        session()->flash('success', $this->isEditMode ? 'Divisi berhasil diperbarui.' : 'Divisi berhasil ditambahkan.');
        $this->isFormOpen = false;
        $this->resetForm();
    }

    public function edit($id)
    {
        $division = Division::findOrFail($id);
        $this->division_id = $division->id;
        $this->name = $division->name;
        $this->isEditMode = true;
        $this->isFormOpen = true;
    }

    public function delete($id)
    {
        Division::findOrFail($id)->delete();
        session()->flash('success', 'Divisi berhasil dihapus.');
    }

    public function resetForm()
    {
        $this->reset(['division_id', 'name', 'isEditMode']);
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.division.division-manager', [
            'divisions' => Division::where('name', 'like', '%' . $this->search . '%')
                ->orderBy('id', 'desc')
                ->paginate(10)
        ])->layout('layouts.app');
    }
}
