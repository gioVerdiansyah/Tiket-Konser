<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Konser;
use App\Models\Order;
use App\Models\TransactionHistory;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ChartUserController extends Controller
{
    public function index($konser_id)
    {
        $paymentTypeData = TransactionHistory::select('payment_type', DB::raw('count(*) as count'))
            ->whereHas('order', function ($query) use ($konser_id) {
                $query->where('konser_id', $konser_id);
            })
            ->groupBy('payment_type')
            ->get();

        $dailyIncomeData = TransactionHistory::select(
            DB::raw('DATE(transaction_time) as date'),
            DB::raw('sum(gross_amount) as total') // Menghitung total pendapatan harian
        )
        ->whereHas('order', function ($query) use ($konser_id) {
            $query->where('konser_id', $konser_id);
        })
        ->groupBy('date')
        ->get();

    $categoryIncomeData = Order::select('kategori_tiket', DB::raw('sum(harga_satuan) as total'))
        ->where('konser_id', $konser_id)
        ->groupBy('kategori_tiket')
        ->get();

    $monthlyIncomeData = TransactionHistory::select(DB::raw('DATE_FORMAT(transaction_time, "%Y-%m") as month'), DB::raw('sum(gross_amount) as total'))
        ->whereHas('order', function ($query) use ($konser_id) {
            $query->where('konser_id', $konser_id);
        })
        ->groupBy('month')
        ->get();

        $dailyData = [
            'labels' => $dailyIncomeData->pluck('date')->toArray(),
            'totals' => $dailyIncomeData->pluck('total')->toArray(),
        ];

        $paymentType = [
            'labels' => $paymentTypeData->pluck('payment_type')->toArray(),
            'totals' => $paymentTypeData->pluck('count')->toArray(),
        ];

        $categoryData = [
            'labels' => $categoryIncomeData->pluck('kategori_tiket')->toArray(),
            'totals' => $categoryIncomeData->pluck('total')->toArray(),
        ];

        $allMonths = [];
        $monthlyIncomeData = $monthlyIncomeData->keyBy('month');

        $currentMonth = Carbon::now()->startOfMonth();
        for ($i = 0; $i < 12; $i++) {
            $monthLabel = $currentMonth->format('F Y');
            $monthKey = $currentMonth->format('Y-m');

            $allMonths[] = $monthLabel;

            if (isset($monthlyIncomeData[$monthKey])) {
                $monthlyData['totals'][] = $monthlyIncomeData[$monthKey]->total;
            } else {
                $monthlyData['totals'][] = 0;
            }

            $currentMonth->subMonth();
        }

        $monthlyData['labels'] = array_reverse($allMonths);

        $monthLabels = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December',
        ];

        $monthlyData = [
            'labels' => $monthlyIncomeData->pluck('month')->map(function ($month) use ($monthLabels) {
                $date = date_create_from_format('Y-m', $month);
                return $monthLabels[$date->format('n') - 1];
            })->toArray(),
            'totals' => $monthlyIncomeData->pluck('total')->toArray(),
        ];
        return view('User_page.pendapatanku', [
            'konser_id' => $konser_id,
            'dailyData' => $dailyData,
            'categoryData' => $categoryData,
            'monthlyData' => $monthlyData,
            'paymentType' => $paymentType,
        ]);
    }
}
