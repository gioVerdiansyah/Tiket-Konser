<?php

namespace App\Http\Controllers;

use App\Models\TransactionHistory;

use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index()
    {
        $creditCardCount = TransactionHistory::where('payment_type', 'credit_card')->count();
        $bankTransferCount = TransactionHistory::where('payment_type', 'bank_transfer')->orWhere('payment_type', 'echannel')->count();
        $eWalletCount = TransactionHistory::where('payment_type', 'qris')->count();

        
        $annualIncome = TransactionHistory::whereYear('transaction_time', now()->year)
            ->sum('gross_amount');

        $monthlyIncome = TransactionHistory::selectRaw("DATE_FORMAT(transaction_time, '%M %Y') as month_year, SUM(gross_amount) as total_income")
            ->groupBy('month_year')
            ->orderBy('transaction_time')
            ->get();

        $allMonths = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December',
        ];
        // $labels = $monthlyIncome->pluck('month_year');
        // $data = $monthlyIncome->pluck('total_income');

        foreach ($allMonths as $month) {
            $label = $month . ' ' . date('Y');
            $income = 0; // Nilai default jika tidak ada data
    
            // Cari data yang sesuai dari hasil query database
            foreach ($monthlyIncome as $item) {
                if ($item->month_year === $label) {
                    $income = $item->total_income;
                    break;
                }
            }
    
            $labels[] = $label;
            $data[] = $income;
        }

        return view('admin_page.homeAdmin', compact('creditCardCount', 'bankTransferCount', 'eWalletCount', 'labels', 'data', 'annualIncome', 'monthlyIncome'));
    }
}