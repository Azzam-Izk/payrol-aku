<div class="space-y-6 max-w-7xl mx-auto">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-gray-900 tracking-tight">Dashboard Overview</h1>
            <p class="mt-1 text-sm text-gray-500 font-medium">Selamat datang kembali! Berikut ringkasan operasional dan penggajian.</p>
        </div>
        <div class="flex items-center gap-3">
            <span class="inline-flex items-center gap-1.5 rounded-full bg-white px-4 py-2 text-sm font-bold text-primary-700 shadow-sm border border-gray-100">
                <div class="w-2 h-2 rounded-full bg-primary-500 animate-pulse"></div>
                Periode: {{ $periode }}
            </span>
            <button class="bg-gray-900 hover:bg-gray-800 text-white px-4 py-2 rounded-xl text-sm font-semibold transition-colors shadow-sm">
                Download Report
            </button>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
        <!-- Card 1 -->
        <div class="group relative overflow-hidden rounded-2xl bg-white shadow-[0_2px_10px_rgba(0,0,0,0.04)] border border-gray-100 p-6 transition-all hover:shadow-[0_8px_30px_rgba(15,157,88,0.08)] hover:-translate-y-1 cursor-default">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-primary-50 rounded-full group-hover:scale-150 transition-transform duration-500 ease-out opacity-50"></div>
            <div class="relative flex items-center justify-between mb-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-primary-100 text-primary-600">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                    </svg>
                </div>
                <span class="flex items-center text-xs font-bold text-emerald-600 bg-emerald-50 px-2 py-1 rounded-md">
                    <svg class="w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                    12%
                </span>
            </div>
            <div class="relative">
                <dt class="text-sm font-semibold text-gray-500 mb-1">Total Karyawan</dt>
                <dd class="text-3xl font-extrabold text-gray-900">{{ $totalKaryawan }} <span class="text-base font-medium text-gray-400">org</span></dd>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="group relative overflow-hidden rounded-2xl bg-white shadow-[0_2px_10px_rgba(0,0,0,0.04)] border border-gray-100 p-6 transition-all hover:shadow-[0_8px_30px_rgba(15,157,88,0.08)] hover:-translate-y-1 cursor-default">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-emerald-50 rounded-full group-hover:scale-150 transition-transform duration-500 ease-out opacity-50"></div>
            <div class="relative flex items-center justify-between mb-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-100 text-emerald-600">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <div class="relative">
                <dt class="text-sm font-semibold text-gray-500 mb-1">Gaji Dicairkan (Bulan Ini)</dt>
                <dd class="text-3xl font-extrabold text-gray-900 tracking-tight">Rp{{ number_format($totalGaji / 1000000, 1, ',', '.') }}<span class="text-base font-medium text-gray-400">Jt</span></dd>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="group relative overflow-hidden rounded-2xl bg-white shadow-[0_2px_10px_rgba(0,0,0,0.04)] border border-gray-100 p-6 transition-all hover:shadow-[0_8px_30px_rgba(15,157,88,0.08)] hover:-translate-y-1 cursor-default">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-blue-50 rounded-full group-hover:scale-150 transition-transform duration-500 ease-out opacity-50"></div>
            <div class="relative flex items-center justify-between mb-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-100 text-blue-600">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <span class="flex items-center text-xs font-bold text-gray-500 bg-gray-100 px-2 py-1 rounded-md">
                    Hari Ini
                </span>
            </div>
            <div class="relative">
                <dt class="text-sm font-semibold text-gray-500 mb-1">Kehadiran Harian</dt>
                <dd class="text-3xl font-extrabold text-gray-900">{{ $kehadiranHariIni }} <span class="text-base font-medium text-gray-400">hadir</span></dd>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="group relative overflow-hidden rounded-2xl bg-white shadow-[0_2px_10px_rgba(0,0,0,0.04)] border border-gray-100 p-6 transition-all hover:shadow-[0_8px_30px_rgba(15,157,88,0.08)] hover:-translate-y-1 cursor-default">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-orange-50 rounded-full group-hover:scale-150 transition-transform duration-500 ease-out opacity-50"></div>
            <div class="relative flex items-center justify-between mb-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-orange-100 text-orange-600">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6z" />
                    </svg>
                </div>
            </div>
            <div class="relative">
                <dt class="text-sm font-semibold text-gray-500 mb-1">Total Divisi</dt>
                <dd class="text-3xl font-extrabold text-gray-900">{{ $totalDivisi }} <span class="text-base font-medium text-gray-400">dept</span></dd>
            </div>
        </div>
    </div>

    <!-- Charts & Timeline Area -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
        <!-- Analytics Chart -->
        <div class="lg:col-span-2 bg-white rounded-2xl shadow-[0_2px_10px_rgba(0,0,0,0.04)] border border-gray-100 p-6 relative overflow-hidden">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h3 class="text-lg font-bold text-gray-900">Salary Analytics</h3>
                    <p class="text-sm text-gray-500">Trend pengeluaran gaji 6 bulan terakhir</p>
                </div>
                <select class="text-sm border-gray-200 rounded-lg text-gray-600 focus:ring-primary-500 bg-gray-50">
                    <option>6 Bulan Terakhir</option>
                    <option>Tahun Ini</option>
                </select>
            </div>
            <div class="h-72 w-full">
                <!-- Fallback Chart UI (Karena Chart.js butuh script) -->
                <div class="w-full h-full flex items-end justify-between px-2 pb-6 gap-2 border-b border-gray-100 relative">
                    <!-- Grid Lines -->
                    <div class="absolute w-full border-b border-dashed border-gray-200 bottom-[25%]"></div>
                    <div class="absolute w-full border-b border-dashed border-gray-200 bottom-[50%]"></div>
                    <div class="absolute w-full border-b border-dashed border-gray-200 bottom-[75%]"></div>
                    
                    <!-- Bars -->
                    <div class="w-full bg-primary-100 rounded-t-lg h-[40%] hover:bg-primary-200 transition-colors relative group"><span class="absolute -bottom-6 w-full text-center text-xs font-semibold text-gray-400">Jan</span></div>
                    <div class="w-full bg-primary-100 rounded-t-lg h-[45%] hover:bg-primary-200 transition-colors relative group"><span class="absolute -bottom-6 w-full text-center text-xs font-semibold text-gray-400">Feb</span></div>
                    <div class="w-full bg-primary-100 rounded-t-lg h-[60%] hover:bg-primary-200 transition-colors relative group"><span class="absolute -bottom-6 w-full text-center text-xs font-semibold text-gray-400">Mar</span></div>
                    <div class="w-full bg-primary-100 rounded-t-lg h-[55%] hover:bg-primary-200 transition-colors relative group"><span class="absolute -bottom-6 w-full text-center text-xs font-semibold text-gray-400">Apr</span></div>
                    <div class="w-full bg-primary-100 rounded-t-lg h-[80%] hover:bg-primary-200 transition-colors relative group"><span class="absolute -bottom-6 w-full text-center text-xs font-semibold text-gray-400">Mei</span></div>
                    <div class="w-full bg-primary-600 shadow-glow rounded-t-lg h-[95%] relative group"><span class="absolute -bottom-6 w-full text-center text-xs font-bold text-primary-600">Jun</span></div>
                </div>
            </div>
        </div>

        <!-- Activity Timeline & Reminders -->
        <div class="bg-white rounded-2xl shadow-[0_2px_10px_rgba(0,0,0,0.04)] border border-gray-100 p-6 flex flex-col">
            <h3 class="text-lg font-bold text-gray-900 mb-6">Upcoming Reminders</h3>
            
            <div class="space-y-4 flex-1">
                <!-- Reminder Item -->
                <div class="flex gap-4 p-4 rounded-xl border border-gray-100 hover:border-primary-200 hover:bg-primary-50/50 transition-all cursor-default">
                    <div class="w-10 h-10 rounded-lg bg-orange-100 text-orange-600 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-gray-900">Cut-off Penggajian</h4>
                        <p class="text-xs text-gray-500 mt-1">Batas akhir input data absen untuk periode ini.</p>
                        <p class="text-xs font-semibold text-orange-600 mt-2">Besok, 23:59 WIB</p>
                    </div>
                </div>

                <!-- Reminder Item -->
                <div class="flex gap-4 p-4 rounded-xl border border-gray-100 hover:border-primary-200 hover:bg-primary-50/50 transition-all cursor-default">
                    <div class="w-10 h-10 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-gray-900">Evaluasi Karyawan</h4>
                        <p class="text-xs text-gray-500 mt-1">Review performa divisi IT bulan ini.</p>
                        <p class="text-xs font-semibold text-blue-600 mt-2">Kamis Depan</p>
                    </div>
                </div>
            </div>

            <button class="w-full mt-4 py-2.5 rounded-xl border-2 border-dashed border-gray-200 text-sm font-semibold text-gray-500 hover:border-primary-400 hover:text-primary-600 transition-colors">
                + Add Reminder
            </button>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="mt-8 mb-4">
        <h3 class="text-lg font-bold text-gray-900 mb-4">Quick Actions</h3>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <a href="{{ route('employee.index') }}" class="group relative bg-white rounded-2xl p-5 shadow-[0_2px_10px_rgba(0,0,0,0.04)] border border-gray-100 flex items-center space-x-4 hover:border-primary-300 hover:shadow-md transition-all overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-primary-50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <div class="w-12 h-12 rounded-xl bg-primary-100 flex items-center justify-center flex-shrink-0 group-hover:bg-primary-600 transition-colors shadow-sm">
                    <svg class="h-6 w-6 text-primary-600 group-hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                </div>
                <div class="relative z-10">
                    <h4 class="text-sm font-bold text-gray-900">Add Employee</h4>
                    <p class="text-xs text-gray-500 mt-0.5">Register staff baru</p>
                </div>
            </a>

            <a href="{{ route('attendance.index') }}" class="group relative bg-white rounded-2xl p-5 shadow-[0_2px_10px_rgba(0,0,0,0.04)] border border-gray-100 flex items-center space-x-4 hover:border-primary-300 hover:shadow-md transition-all overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-emerald-50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <div class="w-12 h-12 rounded-xl bg-emerald-100 flex items-center justify-center flex-shrink-0 group-hover:bg-emerald-600 transition-colors shadow-sm">
                    <svg class="h-6 w-6 text-emerald-600 group-hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                </div>
                <div class="relative z-10">
                    <h4 class="text-sm font-bold text-gray-900">Input Attendance</h4>
                    <p class="text-xs text-gray-500 mt-0.5">Catat kehadiran harian</p>
                </div>
            </a>

            <a href="{{ route('payroll.calculator') }}" class="group relative bg-white rounded-2xl p-5 shadow-[0_2px_10px_rgba(0,0,0,0.04)] border border-gray-100 flex items-center space-x-4 hover:border-primary-300 hover:shadow-md transition-all overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center flex-shrink-0 group-hover:bg-blue-600 transition-colors shadow-sm">
                    <svg class="h-6 w-6 text-blue-600 group-hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" /></svg>
                </div>
                <div class="relative z-10">
                    <h4 class="text-sm font-bold text-gray-900">Run Payroll</h4>
                    <p class="text-xs text-gray-500 mt-0.5">Kalkulasi slip gaji</p>
                </div>
            </a>
        </div>
    </div>
</div>