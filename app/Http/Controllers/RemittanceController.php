<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RemittanceRate;
use App\Models\Provider;

class RemittanceController extends Controller
{
    public function index()
    {
        $rates = RemittanceRate::with(relations: 'provider')
            ->where('base_amount', 1000)
            ->whereHas('provider', function ($query) {
                    $query->where('status', 1);
                })
            ->orderByDesc('received_amount')
            ->get();
        return view('remittance.index', compact('rates'));
    }

    public function search(Request $request)
{
    $amount = (float) $request->input('amount', 1000);

    // Step 1: Get the closest base_amount stored
    $closestBaseAmount = RemittanceRate::select('base_amount')
        ->distinct()
        ->orderByRaw("ABS(base_amount - ?)", [$amount])
        ->limit(1)
        ->value('base_amount');

    if (!$closestBaseAmount) {
        return view('remittance.index', ['rates' => [], 'amount' => $amount]);
    }

    // Step 2: Fetch all rates for that closest base_amount
    $baseRates = RemittanceRate::with('provider')
        ->where('base_amount', $closestBaseAmount)
        ->where('status', 1)
        ->orderByDesc('received_amount')
        ->get();

    // Step 3: Calculate estimated fee & receivedAmount for user-entered amount
    $rates = $baseRates->map(function ($rate) use ($amount, $closestBaseAmount) {
        $ratePerSEK = $rate->rate;
        $fee = $rate->fee; // we assume fee is roughly same for nearby amounts

        $estReceived = ($amount - $fee) * $ratePerSEK;

        return (object)[
            'provider'        => $rate->provider,
            'base_amount'     => $amount,
            'rate'            => $ratePerSEK,
            'fee'             => $fee,
            'received_amount' => round($estReceived, 2),
            'transfer_time'   => $rate->transfer_time,
            'affiliate_url'   => $rate->affiliate_url,
        ];
    });

    if ($request->ajax()) {
        return view('includes.rates', compact('rates', 'amount'))->render();
    }

    return view('remittance.index', compact('rates', 'amount'));
}

}
