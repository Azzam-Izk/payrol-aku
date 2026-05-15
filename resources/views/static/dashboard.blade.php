<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard - Payroll</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">

    <!-- Navbar Sederhana -->
    <nav class="bg-white border-b border-gray-200 p-4 flex justify-between items-center shadow-sm">
        <div class="text-lg font-bold text-gray-800">Payroll System</div>
        <div class="flex gap-4">
            <a href="#" class="text-blue-600 font-semibold">Dashboard</a>
            <a href="#" class="text-gray-600 hover:text-gray-900">Karyawan</a>
            <a href="#" class="text-gray-600 hover:text-gray-900">Payroll</a>
            <a href="#" class="text-red-500 hover:underline">Logout</a>
        </div>
    </nav>

    <!-- Konten Utama -->
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Overview Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <div class="bg-white p-6 rounded-lg shadow border border-gray-100">
                <h3 class="text-gray-500 text-sm">Total Karyawan</h3>
                <p class="text-3xl font-bold text-gray-800 mt-2">24 Orang</p>
            </div>

            <!-- Card 2 -->
            <div class="bg-white p-6 rounded-lg shadow border border-gray-100">
                <h3 class="text-gray-500 text-sm">Gaji Cair Bulan Ini</h3>
                <p class="text-3xl font-bold text-gray-800 mt-2">Rp 125,000,000</p>
            </div>

            <!-- Card 3 -->
            <div class="bg-white p-6 rounded-lg shadow border border-gray-100">
                <h3 class="text-gray-500 text-sm">Menunggu Konfirmasi</h3>
                <p class="text-3xl font-bold text-yellow-600 mt-2">3 Slip Gaji</p>
            </div>
        </div>
    </div>
</body>

</html>