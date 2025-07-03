<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RemittanceRate;
use App\Models\Provider;

class RemittanceController extends Controller
{
    public function index()
    {
        $rates = RemittanceRate::with('provider')->where('base_amount', 1000)->orderByDesc('received_amount')->get();
        return view('remittance.index', compact('rates'));
    }

    public function search(Request $request)
    {
        $amount = $request->input('amount', 1000);

        $rates = RemittanceRate::with('provider')
            ->where('base_amount', $amount)
            ->orderByDesc('received_amount')
            ->get();

        return view('remittance.index', compact('rates', 'amount'));
    }
}
