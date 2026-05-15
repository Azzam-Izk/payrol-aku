<div class="max-w-7xl mx-auto space-y-6">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h2 class="text-2xl font-extrabold text-gray-900 tracking-tight">Manajemen Absensi</h2>
            <p class="text-sm text-gray-500 font-medium mt-1">Input dan pantau kehadiran harian karyawan</p>
        </div>
    </div>

    @if (session()->has('success'))
        <div class="bg-primary-50 text-primary-800 border border-primary-100 p-4 rounded-xl flex items-center shadow-sm">
            <div class="w-8 h-8 rounded-full bg-primary-100 flex items-center justify-center mr-3">
                <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </div>
            <span class="font-medium text-sm">{{ session('success') }}</span>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Form Section -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl shadow-[0_2px_10px_rgba(0,0,0,0.04)] border border-gray-100 overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-50 bg-gray-50/50">
                    <h3 class="text-lg font-bold text-gray-900">{{ $isEditMode ? 'Edit Absensi' : 'Input Absensi Baru' }}</h3>
                </div>
                <div class="p-6">
                    <form wire:submit.prevent="store" class="space-y-4">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1.5">Karyawan</label>
                            <select wire:model="employee_id" class="w-full rounded-xl border-gray-200 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm transition-shadow bg-gray-50 focus:bg-white px-4 py-2.5">
                                <option value="">-- Pilih Karyawan --</option>
                                @foreach($employees as $emp)
                                    <option value="{{ $emp->id }}">{{ $emp->nik }} - {{ $emp->name }}</option>
                                @endforeach
                            </select>
                            @error('employee_id') <span class="text-xs text-red-500 mt-1 block font-medium">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1.5">Tanggal</label>
                            <input type="date" wire:model="date" class="w-full rounded-xl border-gray-200 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm transition-shadow bg-gray-50 focus:bg-white px-4 py-2.5">
                            @error('date') <span class="text-xs text-red-500 mt-1 block font-medium">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1.5">Status Kehadiran</label>
                            <select wire:model="status" class="w-full rounded-xl border-gray-200 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm transition-shadow bg-gray-50 focus:bg-white px-4 py-2.5">
                                <option value="hadir">Hadir</option>
                                <option value="sakit">Sakit</option>
                                <option value="izin">Izin</option>
                                <option value="alpa">Alpa</option>
                            </select>
                            @error('status') <span class="text-xs text-red-500 mt-1 block font-medium">{{ $message }}</span> @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-1.5">Jam Masuk</label>
                                <input type="time" wire:model="check_in" class="w-full rounded-xl border-gray-200 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm transition-shadow bg-gray-50 focus:bg-white px-4 py-2.5">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-1.5">Jam Keluar</label>
                                <input type="time" wire:model="check_out" class="w-full rounded-xl border-gray-200 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm transition-shadow bg-gray-50 focus:bg-white px-4 py-2.5">
                            </div>
                        </div>

                        <div class="pt-4 flex flex-col space-y-2">
                            <button type="submit" wire:loading.attr="disabled" class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-xl shadow-sm text-sm font-bold text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 disabled:opacity-50 transition-colors">
                                <span wire:loading.remove>{{ $isEditMode ? 'Simpan Perubahan' : 'Catat Kehadiran' }}</span>
                                <span wire:loading>Menyimpan...</span>
                            </button>
                            @if($isEditMode)
                                <button type="button" wire:click="resetForm" class="w-full flex justify-center py-2.5 px-4 border border-gray-200 rounded-xl text-sm font-bold text-gray-600 bg-white hover:bg-gray-50 transition-colors shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                                    Batal Edit
                                </button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-[0_2px_10px_rgba(0,0,0,0.04)] border border-gray-100 overflow-hidden flex flex-col h-full">
                <div class="p-4 border-b border-gray-100 flex justify-between items-center bg-gray-50/30">
                    <div class="relative w-full max-w-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        </div>
                        <input wire:model.live="search" type="text" placeholder="Cari nama karyawan..." class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-xl leading-5 bg-white placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-primary-500 focus:border-primary-500 sm:text-sm transition-shadow shadow-sm">
                    </div>
                </div>

                <div class="overflow-x-auto flex-1">
                    <table class="min-w-full divide-y divide-gray-100">
                        <thead class="bg-gray-50/80">
                            <tr>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Tanggal</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Karyawan</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Status & Waktu</th>
                                <th scope="col" class="px-6 py-4 text-right text-xs font-bold text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-50">
                            @forelse ($attendances as $att)
                                <tr class="hover:bg-gray-50/50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                        {{ \Carbon\Carbon::parse($att->date)->format('d M Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-bold text-gray-900">{{ $att->employee->name ?? 'Unknown' }}</div>
                                        <div class="text-xs text-gray-500 mt-0.5">{{ $att->employee->nik ?? '-' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center gap-3">
                                            @if($att->status == 'hadir')
                                                <span class="px-2.5 py-1 inline-flex text-xs leading-5 font-bold rounded-md bg-emerald-50 text-emerald-700 border border-emerald-100">Hadir</span>
                                            @elseif($att->status == 'sakit')
                                                <span class="px-2.5 py-1 inline-flex text-xs leading-5 font-bold rounded-md bg-orange-50 text-orange-700 border border-orange-100">Sakit</span>
                                            @elseif($att->status == 'izin')
                                                <span class="px-2.5 py-1 inline-flex text-xs leading-5 font-bold rounded-md bg-blue-50 text-blue-700 border border-blue-100">Izin</span>
                                            @else
                                                <span class="px-2.5 py-1 inline-flex text-xs leading-5 font-bold rounded-md bg-red-50 text-red-700 border border-red-100">Alpa</span>
                                            @endif
                                            
                                            @if($att->status == 'hadir')
                                                <div class="text-xs font-medium text-gray-500">
                                                    {{ $att->check_in ? date('H:i', strtotime($att->check_in)) : '--:--' }} - {{ $att->check_out ? date('H:i', strtotime($att->check_out)) : '--:--' }}
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-3">
                                        <button wire:click="edit({{ $att->id }})" class="text-primary-600 hover:text-primary-900 transition-colors">Edit</button>
                                        <button wire:click="delete({{ $att->id }})" wire:confirm="Hapus data ini?" class="text-red-500 hover:text-red-700 transition-colors">Hapus</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-center text-sm text-gray-500">
                                        <div class="flex flex-col items-center justify-center">
                                            <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mb-4 border border-gray-100">
                                                <svg class="w-8 h-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                            </div>
                                            <h3 class="text-sm font-bold text-gray-900">Tidak ada absensi</h3>
                                            <p class="text-xs text-gray-500 mt-1">Data kehadiran untuk pencarian ini kosong.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="p-4 border-t border-gray-50 bg-gray-50/30 mt-auto">
                    {{ $attendances->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
