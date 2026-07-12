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
        
        // Menggunakan kolom grand_total yang benar
        $totalPendapatan = $orders->sum('grand_total'); 

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('laporan.admin_rincian_pdf', compact('orders', 'totalPesanan', 'totalPendapatan'));

        return $pdf->stream('laporan-rincian-admin.pdf');
    }
}