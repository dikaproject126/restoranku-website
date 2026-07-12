<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; 
use Barryvdh\DomPDF\Facade\Pdf; // Pastikan facade dompdf sudah di-import

class LaporanController extends Controller
{
    public function cetakRincianAdmin()
    {
        $orders = Order::with(['user'])
                    ->whereIn('status', ['settlement', 'capture']) 
                    ->orderBy('created_at', 'desc')
                    ->get();

        $totalPesanan = $orders->count();
        $totalPendapatan = $orders->sum('total_price'); // Pastikan 'total_price' sesuai nama kolom harga di database kamu

        $pdf = Pdf::loadView('laporan.admin_rincian_pdf', compact('orders', 'totalPesanan', 'totalPendapatan'));

        return $pdf->stream('laporan-rincian-admin.pdf');
    }
}