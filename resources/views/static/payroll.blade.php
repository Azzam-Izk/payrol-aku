<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Input Payroll - Payroll App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 p-8">
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow border border-gray-100">
        <h2 class="text-2xl font-bold text-gray-800 border-b pb-4 mb-6">Pemrosesan Payroll Bulanan</h2>

        <form>
            <!-- 1. Pilih Karyawan -->
            <div class="mb-6">
                <label class="block font-medium text-gray-700 mb-2">Pilih Karyawan</label>
                <select class="w-full rounded-md border-gray-300 shadow-sm">
                    <option disabled selected>-- Cari Karyawan --</option>
                    <option>EMP-001 | Budi Santoso</option>
                </select>
            </div>

            <!-- 2. Grid Komponen Gaji -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <!-- Sisi Pendapatan -->
                <div class="p-4 bg-green-50 border border-green-200 rounded">
                    <h3 class="font-bold text-green-800 mb-4">Pendapatan</h3>
                    <div class="mb-3">
                        <label class="block text-sm text-gray-700">Gaji Pokok</label>
                        <input type="number" class="mt-1 w-full rounded border-gray-300" placeholder="Rp 0">
                    </div>
                    <div class="mb-3">
                        <label class="block text-sm text-gray-700">Tunjangan Transportasi</label>
                        <input type="number" class="mt-1 w-full rounded border-gray-300" placeholder="Rp 0">
                    </div>
                </div>

                <!-- Sisi Potongan -->
                <div class="p-4 bg-red-50 border border-red-200 rounded">
                    <h3 class="font-bold text-red-800 mb-4">Potongan</h3>
                    <div class="mb-3">
                        <label class="block text-sm text-gray-700">Pajak (PPh 21)</label>
                        <input type="number" class="mt-1 w-full rounded border-gray-300" placeholder="Rp 0">
                    </div>
                    <div class="mb-3">
                        <label class="block text-sm text-gray-700">Potongan BPJS / Lainnya</label>
                        <input type="number" class="mt-1 w-full rounded border-gray-300" placeholder="Rp 0">
                    </div>
                </div>
            </div>

            <!-- 3. Hasil Akhir (Take Home Pay) -->
            <div class="mt-8 border-t pt-6 flex flex-col md:flex-row items-center justify-between">
                <div>
                    <h3 class="text-xl font-bold text-gray-800">Total Take Home Pay (THP)</h3>
                    <p class="text-gray-500 text-sm">Gaji Pokok + Tunjangan - Potongan</p>
                </div>
                <div class="text-3xl font-extrabold text-blue-600 mt-4 md:mt-0">
                    Rp 0
                </div>
            </div>
        </form>
    </div>
</body>

</html>