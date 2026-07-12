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
                        ->where('status', 'success') 
                        ->orderBy('created_at', 'desc')
                        ->get();

        $totalPesanan = $orders->count();
        $totalPendapatan = $orders->sum('total_price'); 

        // 3. Lempar data ke view blade
        $pdf = Pdf::loadView('laporan.admin_rincian_pdf', compact('orders', 'totalPesanan', 'totalPendapatan'));

        // 4. Stream langsung ke browser
        return $pdf->stream('laporan-rincian-admin.pdf');
    }
}