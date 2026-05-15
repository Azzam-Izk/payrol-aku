<div class="max-w-7xl mx-auto space-y-6">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h2 class="text-2xl font-extrabold text-gray-900 tracking-tight">Riwayat Penggajian</h2>
            <p class="text-sm text-gray-500 font-medium mt-1">Arsip dan pencetakan slip gaji karyawan</p>
        </div>
        <div class="flex items-center gap-3 w-full sm:w-auto">
            <select wire:model.live="filterPeriod" class="w-full sm:w-48 rounded-xl border-gray-200 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm transition-shadow bg-white px-4 py-2.5 font-medium text-gray-700">
                <option value="">Semua Periode</option>
                @foreach($periods as $period)
                    <option value="{{ $period }}">{{ $period }}</option>
                @endforeach
            </select>
            <a href="{{ route('payroll.calculator') }}" class="flex-shrink-0 inline-flex items-center justify-center px-4 py-2.5 border border-transparent text-sm font-semibold rounded-xl text-white bg-primary-600 hover:bg-primary-700 shadow-sm transition-all focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                Buat Baru
            </a>
        </div>
    </div>

    @if(session()->has('success'))
        <div class="bg-primary-50 text-primary-800 border border-primary-100 p-4 rounded-xl flex items-center shadow-sm">
            <div class="w-8 h-8 rounded-full bg-primary-100 flex items-center justify-center mr-3">
                <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </div>
            <span class="font-medium text-sm">{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow-[0_2px_10px_rgba(0,0,0,0.04)] border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-100">
                <thead class="bg-gray-50/80">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Karyawan</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Periode</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Rincian Komponen</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-900 uppercase tracking-wider bg-gray-100/50">Take Home Pay</th>
                        <th class="px-6 py-4 text-right text-xs font-bold text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-50">
                    @forelse($payrolls as $p)
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-bold text-gray-900">{{ $p->employee->name ?? 'Unknown' }}</div>
                                <div class="text-xs font-medium text-gray-500 mt-0.5">NIK: {{ $p->employee->nik ?? '-' }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2.5 py-1 inline-flex text-xs leading-5 font-bold rounded-md bg-gray-100 text-gray-700 border border-gray-200/50">
                                    {{ $p->month_year }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <div class="flex flex-col gap-1">
                                    <div class="flex justify-between items-center w-40">
                                        <span class="text-gray-500 text-xs font-semibold">Pokok</span>
                                        <span class="text-gray-900 font-bold">Rp{{ number_format($p->basic_salary / 1000, 0) }}k</span>
                                    </div>
                                    <div class="flex justify-between items-center w-40">
                                        <span class="text-emerald-600 text-xs font-semibold">+ Tunj.</span>
                                        <span class="text-emerald-700 font-bold">Rp{{ number_format($p->allowance / 1000, 0) }}k</span>
                                    </div>
                                    <div class="flex justify-between items-center w-40">
                                        <span class="text-red-500 text-xs font-semibold">- Pot.</span>
                                        <span class="text-red-600 font-bold">Rp{{ number_format($p->deduction / 1000, 0) }}k</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap bg-gray-50/30">
                                <div class="text-lg font-extrabold text-primary-600 tracking-tight">
                                    Rp {{ number_format($p->net_salary, 0, ',', '.') }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                @if(Route::has('payroll.cetak'))
                                    <a href="{{ route('payroll.cetak', $p->id) }}" target="_blank" class="inline-flex items-center rounded-xl bg-white px-3 py-2 text-sm font-bold text-gray-700 shadow-sm ring-1 ring-inset ring-gray-200 hover:bg-gray-50 hover:text-primary-600 transition-all">
                                        <svg class="-ml-0.5 mr-2 h-4 w-4 text-gray-400 group-hover:text-primary-600" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0v2.796c0 1.171.84 2.152 1.956 2.25 1.496.132 3.01.204 4.544.204s3.048-.072 4.544-.204c1.116-.098 1.956-1.079 1.956-2.25V9.31z" />
                                        </svg>
                                        Unduh PDF
                                    </a>
                                @else
                                    <span class="text-xs text-gray-400 font-medium">Modul PDF belum disetup</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mb-4 border border-gray-100">
                                        <svg class="w-8 h-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                                    </div>
                                    <h3 class="text-sm font-bold text-gray-900">Belum ada riwayat gaji</h3>
                                    <p class="text-xs text-gray-500 mt-1">Arsip penggajian masih kosong.</p>
                                    <a href="{{ route('payroll.calculator') }}" class="mt-4 text-primary-600 font-bold text-sm hover:underline">Hitung Gaji Sekarang &rarr;</a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t border-gray-50 bg-gray-50/30">
            {{ $payrolls->links() }}
        </div>
    </div>
</div>