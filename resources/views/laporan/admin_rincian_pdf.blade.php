<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Rincian Pendapatan & Pesanan Admin</title>
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; color: #333; font-size: 13px; line-height: 1.4; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #435ebe; padding-bottom: 10px; }
        .header h2 { color: #435ebe; margin: 0 0 5px 0; font-size: 22px; }
        .header p { margin: 0; color: #666; }
        
        /* Ringkasan Ringkas Card Style di PDF */
        .summary-box { width: 100%; margin-bottom: 25px; }
        .card { width: 45%; float: left; background: #f8f9fa; border: 1px solid #e3e6f0; padding: 12px; border-radius: 5px; }
        .card-right { float: right; }
        .card-title { font-size: 11px; text-transform: uppercase; color: #858796; margin-bottom: 5px; font-weight: bold; }
        .card-value { font-size: 18px; font-weight: bold; color: #4e73df; }
        .clearfix { clear: both; }

        /* Tabel Data */
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #e3e6f0; padding: 10px; text-align: left; }
        th { background-color: #435ebe; color: white; font-weight: bold; text-transform: uppercase; font-size: 11px; }
        tr:nth-child(even) { background-color: #f8f9fa; }
        
        .text-right { text-align: right; }
        .font-bold { font-weight: bold; }
    </style>
</head>
<body>

    <div class="header">
        <h2>RESTORAN - LAPORAN RINGKASAN ADMIN</h2>
        <p>Tanggal Penarikan: {{ date('d F Y H:i') }} WITA</p>
    </div>

    <div class="summary-box">
        <div class="card">
            <div class="card-title">Total Pesanan Sukses</div>
            <div class="card-value">{{ $totalPesanan }} Pesanan</div>
        </div>
        <div class="card card-right">
            <div class="card-title">Total Pendapatan Bersih</div>
            <div class="card-value">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</div>
        </div>
        <div class="clearfix"></div>
    </div>

    <h3>Rincian Transaksi Pembentuk Pendapatan:</h3>
    <table>
        <thead>
            <tr>
                <th style="width: 5%;">No</th>
                <th style="width: 20%;">ID Pesanan</th>
                <th style="width: 25%;">Waktu Transaksi</th>
                <th style="width: 25%;">Pelanggan (No. HP)</th>
                <th style="width: 25%;" class="text-right">Nominal Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $key => $order)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>#{{ $order->id }}</td>
                <td>{{ $order->created_at->format('d-m-Y H:i') }}</td>
                <td>{{ optional($order->user)->name ?? optional($order->user)->fullname ?? 'Guest Checkout' }}</td>
                <td class="text-right">Rp {{ number_format($order->grand_total, 0, ',', '.') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align: center; color: #999; padding: 20px;">
                    Tidak ada data pesanan dengan status 'settlement' atau 'capture'.
                </td>
            </tr>
            @endforelse
            
            <tr style="background-color: #eaecf4;">
                <td colspan="4" class="font-bold text-right">Akumulasi Total Pendapatan:</td>
                <td class="font-bold text-right" style="color: #435ebe; font-size: 14px;">
                    Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
                </td>
            </tr>
        </tbody>
    </table>

</body>
</html>