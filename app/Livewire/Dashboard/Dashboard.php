<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Payroll;
use App\Models\Attendance;
use App\Models\Division;

class Dashboard extends Component
{
    public function render()
    {
        $periodeBulanini = now()->locale('id')->isoFormat('MMMM YYYY');
        $hariIni = now()->format('Y-m-d');

        return view('livewire.dashboard.dashboard', [
            'totalKaryawan' => Employee::count(),
            'totalGaji' => Payroll::where('month_year', $periodeBulanini)->sum('net_salary'),
            'kehadiranHariIni' => Attendance::where('date', $hariIni)->where('status', 'hadir')->count(),
            'totalDivisi' => Division::count(),
            'periode' => $periodeBulanini,
        ])->layout('layouts.app');
    }
}
