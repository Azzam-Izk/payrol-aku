<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h2 class="text-2xl font-extrabold text-gray-900 tracking-tight">Kalkulator Penggajian</h2>
            <p class="text-sm text-gray-500 font-medium mt-1">Hitung otomatis dan terbitkan slip gaji karyawan bulanan</p>
        </div>
        <a href="{{ route('payroll.history') }}" class="inline-flex items-center px-4 py-2 border border-gray-200 rounded-xl shadow-sm text-sm font-semibold text-gray-700 bg-white hover:bg-gray-50 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
            <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            Riwayat Gaji
        </a>
    </div>

    @if(session()->has('success'))
        <div class="bg-primary-50 text-primary-800 border border-primary-100 p-4 rounded-xl flex items-center shadow-sm">
            <div class="w-8 h-8 rounded-full bg-primary-100 flex items-center justify-center mr-3">
                <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </div>
            <span class="font-medium text-sm">{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-white rounded-3xl shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-gray-100 overflow-hidden">
        <form wire:submit.prevent="savePayroll">
            <!-- Header Section Form -->
            <div class="bg-gray-50/50 p-6 md:p-8 border-b border-gray-100">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Pilih Karyawan</label>
                        <select wire:model.live="employee_id" class="w-full rounded-xl border-gray-200 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm transition-shadow bg-white px-4 py-3">
                            <option value="">-- Pilih Karyawan --</option>
                            @foreach($employees as $emp)
                                <option value="{{ $emp->id }}">{{ $emp->nik }} — {{ $emp->name }}</option>
                            @endforeach
                        </select>
                        @error('employee_id') <span class="text-xs text-red-500 mt-1.5 block font-medium">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Periode Gaji</label>
                        <input type="text" wire:model="month_year" class="w-full rounded-xl border-gray-200 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm transition-shadow bg-white px-4 py-3 font-semibold text-gray-900" placeholder="Contoh: Mei 2026">
                        @error('month_year') <span class="text-xs text-red-500 mt-1.5 block font-medium">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <!-- Kalkulator Section -->
            <div class="p-6 md:p-8 space-y-6">
                <h3 class="text-sm font-bold text-gray-400 uppercase tracking-wider mb-2">Rincian Komponen Gaji</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Gaji Pokok -->
                    <div class="relative group">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Gaji Pokok</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <span class="text-gray-400 font-medium">Rp</span>
                            </div>
                            <input type="number" wire:model.live="basic_salary" min="0" class="w-full rounded-xl border-gray-200 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-lg transition-shadow bg-gray-50 pl-11 pr-4 py-3 font-bold text-gray-900" placeholder="0">
                        </div>
                        <p class="text-xs text-primary-600 font-medium mt-1.5 flex items-center">
                            <svg class="w-3.5 h-3.5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                            Otomatis dari jabatan
                        </p>
                    </div>

                    <!-- Tunjangan -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">+ Tunjangan</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <span class="text-emerald-500 font-medium">Rp</span>
                            </div>
                            <input type="number" wire:model.live="allowance" min="0" class="w-full rounded-xl border-emerald-200 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-lg transition-shadow bg-white pl-11 pr-4 py-3 font-bold text-emerald-700" placeholder="0">
                        </div>
                    </div>

                    <!-- Potongan -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">- Potongan</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <span class="text-red-400 font-medium">Rp</span>
                            </div>
                            <input type="number" wire:model.live="deduction" min="0" class="w-full rounded-xl border-red-200 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-lg transition-shadow bg-white pl-11 pr-4 py-3 font-bold text-red-600" placeholder="0">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Result Section -->
            <div class="bg-gray-900 p-6 md:p-8 text-white relative overflow-hidden">
                <div class="absolute -right-20 -top-20 w-64 h-64 bg-primary-600/20 rounded-full blur-3xl"></div>
                <div class="absolute -left-20 -bottom-20 w-64 h-64 bg-blue-600/20 rounded-full blur-3xl"></div>
                
                <div class="relative z-10 flex flex-col md:flex-row justify-between items-center gap-6">
                    <div>
                        <h3 class="text-lg font-bold text-gray-100">Take Home Pay</h3>
                        <p class="text-sm text-gray-400 mt-1">Total gaji bersih yang akan diterima karyawan.</p>
                    </div>
                    <div class="text-4xl md:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-emerald-300 to-primary-400 tracking-tight">
                        Rp {{ number_format($net_salary, 0, ',', '.') }}
                    </div>
                </div>

                <div class="mt-8 relative z-10">
                    <button type="submit" wire:loading.attr="disabled" class="w-full bg-primary-600 hover:bg-primary-500 text-white font-extrabold py-4 px-4 rounded-xl shadow-glow transition-all focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-900 focus:ring-primary-500 disabled:opacity-50 text-lg flex items-center justify-center">
                        <span wire:loading.remove class="flex items-center">
                            <svg class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            Terbitkan Slip Gaji
                        </span>
                        <span wire:loading class="flex items-center">
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                            Memproses...
                        </span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>