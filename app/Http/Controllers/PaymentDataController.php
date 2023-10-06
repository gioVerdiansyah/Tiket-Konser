<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\TransactionHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentDataController extends Controller
{
    public function getPaymentData()
    {
        
        $dailyIncomeData = TransactionHistory::select(DB::raw('DATE(transaction_time) as date'), DB::raw('count(*) as count'))
            ->groupBy('date')
            ->get();

        $categoryIncomeData = Order::select('kategori_tiket', DB::raw('sum(harga_satuan) as total'))
            ->groupBy('kategori_tiket')
            ->get();

        $monthlyIncomeData = TransactionHistory::select(DB::raw('DATE_FORMAT(transaction_time, "%Y-%m") as month'), DB::raw('sum(gross_amount) as total'))
            ->groupBy('month')
            ->get();

        $dailyData = [
            'labels' => $dailyIncomeData->pluck('date')->toArray(),
            'totals' => $dailyIncomeData->pluck('count')->toArray(),
        ];

        $categoryData = [
            'labels' => $categoryIncomeData->pluck('kategori_tiket')->toArray(),
            'totals' => $categoryIncomeData->pluck('total')->toArray(),
        ];

        
        $allMonths = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];
        
        // Inisialisasi array data bulanan dengan nilai 0 untuk semua bulan
        $monthlyData = [
            'labels' => $allMonths,
            'totals' => array_fill(0, 12, 0)
        ];

        foreach ($monthlyIncomeData as $income) {
            $monthKey = date_create_from_format('Y-m', $income->month)->format('n') - 1;
            $monthlyData['totals'][$monthKey] = $income->total;
        }
        
        return response()->json([
            'dailyData' => $dailyData,
            'categoryData' => $categoryData,
            'monthlyData' => $monthlyData,
        ]);
    }

}