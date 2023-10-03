<?php

namespace App\Http\Controllers;
use App\Models\TransactionHistory;

use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index()
    {
        $creditCardCount = TransactionHistory::where('payment_type', 'credit_card')->count();
        $bankTransferCount = TransactionHistory::where('payment_type', 'bank_transfer')->count();
        $eWalletCount = TransactionHistory::where('payment_type', 'e-wallet')->count();

        // Menghitung jumlah pendapatan tahunan
        $annualIncome = TransactionHistory::whereYear('transaction_time', now()->year)
            ->sum('gross_amount');

        $monthlyIncome = TransactionHistory::selectRaw("DATE_FORMAT(transaction_time, '%M %Y') as month_year, SUM(gross_amount) as total_income")
            ->groupBy('month_year')
            ->orderBy('transaction_time')
            ->get();

        $labels = $monthlyIncome->pluck('month_year');
        $data = $monthlyIncome->pluck('total_income');

        return view('admin_page.homeAdmin', compact('creditCardCount', 'bankTransferCount', 'eWalletCount', 'labels', 'data', 'annualIncome', 'monthlyIncome'));
    }
}
