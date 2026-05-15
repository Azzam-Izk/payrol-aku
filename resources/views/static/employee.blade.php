<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Manajemen Karyawan - Payroll</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">
    <nav class="bg-white border-b border-gray-200 p-4 shadow-sm mb-8 relative">
        <div class="text-lg font-bold text-gray-800">Manajemen Karyawan</div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8">

        <!-- KOLOM KIRI: Form Tambah Karyawan -->
        <div class="bg-white p-6 rounded-lg shadow border border-gray-100 md:col-span-1 h-fit">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Input Karyawan Baru</h3>
            <form action="#">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" class="mt-1 block w-full rounded border-gray-300 shadow-sm" placeholder="John Doe">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Nomor Induk / NIK</label>
                    <input type="text" class="mt-1 block w-full rounded border-gray-300 shadow-sm" placeholder="EMP-001">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Jabatan</label>
                    <select class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                        <option>Staff IT</option>
                        <option>HRD / Personalia</option>
                        <option>Keuangan</option>
                    </select>
                </div>
                <button type="button" class="w-full bg-blue-600 text-white font-bold py-2 px-4 rounded">Simpan Data</button>
            </form>
        </div>

        <!-- KOLOM KANAN: Tabel Karyawan -->
        <div class="bg-white p-6 rounded-lg shadow border border-gray-100 md:col-span-2 overflow-x-auto">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Daftar Karyawan</h3>
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead>
                    <tr class="bg-gray-50 text-left">
                        <th class="px-4 py-2 font-medium text-gray-500">NIK</th>
                        <th class="px-4 py-2 font-medium text-gray-500">Nama</th>
                        <th class="px-4 py-2 font-medium text-gray-500">Jabatan</th>
                        <th class="px-4 py-2 font-medium text-gray-500">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr>
                        <td class="px-4 py-3">EMP-001</td>
                        <td class="px-4 py-3 font-semibold">Budi Santoso</td>
                        <td class="px-4 py-3">Staff IT</td>
                        <td class="px-4 py-3">
                            <button class="text-indigo-600 hover:text-indigo-900 mr-2">Edit</button>
                            <button class="text-red-600 hover:text-red-900">Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</body>

</html>