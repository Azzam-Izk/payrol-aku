<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Slip Gaji - {{ $data->employee->name }}</title>
    <style>
        /* Menggunakan CSS Klasik Standar */
        body { font-family: Arial, sans-serif; font-size: 14px; }
        .header { text-align: center; border-bottom: 2px solid #333; padding-bottom: 10px; }
        .title { font-size: 20px; font-weight: bold; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        td { padding: 8px; }
        .jumlah { text-align: right; font-weight: bold; }
        .total-area { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <div class="header">
        <div class="title">KODAKARSA CORPS</div>
        <div>SLIP GAJI KARYAWAN</div>
        <div>Periode: {{ $data->month_year }}</div>
    </div>

    <table>
        <tr>
            <td width="150"><strong>NIK</strong></td> <td>: {{ $data->employee->nik }}</td>
        </tr>
        <tr>
            <td><strong>Nama Karyawan</strong></td> <td>: {{ $data->employee->name }}</td>
        </tr>
        <tr>
            <td><strong>Jabatan</strong></td> <td>: {{ $data->employee->position }}</td>
        </tr>
    </table>

    <br><hr><br>

    <table border="1" cellpadding="8">
        <tr>
            <th align="left">Rincian Komponen</th>
            <th align="right">Nominal</th>
        </tr>
        <tr>
            <td>Gaji Pokok</td>
            <td class="jumlah">Rp {{ number_format($data->basic_salary, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td>Tunjangan Tambahan (Transportasi, dll)</td>
            <td class="jumlah">Rp {{ number_format($data->allowance, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td>Potongan / Pajak</td>
            <td class="jumlah" style="color:red;">- Rp {{ number_format($data->deduction, 0, ',', '.') }}</td>
        </tr>
        <tr class="total-area">
            <td><strong>TAKE HOME PAY (TOTAL)</strong></td>
            <td class="jumlah"><h3 style="margin:0;">Rp {{ number_format($data->net_salary, 0, ',', '.') }}</h3></td>
        </tr>
    </table>

    <p style="text-align:right; margin-top:50px;">Manajer HRD<br><br><br>(_________________)</p>
</body>
</html>