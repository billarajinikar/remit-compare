<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Provider;
class JobController extends Controller
{
    public function sample()
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Origin' => 'https://www.monito.com',
            'Referer' => 'https://www.monito.com/en/compare/transfer/se/in/sek/inr/1000',
            'apollographql-client-name' => '@gifsa/website/client',
            'apollographql-client-version' => '6.47.0',
            'User-Agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36',
        ])->post('https://www.monito.com/api/v2', [
                    'operationName' => 'GQLTransferComparison',
                    'variables' => [
                        'lang' => 'en',
                        'from' => 'SE',
                        'to' => 'IN',
                        'currencyFrom' => 'SEK',
                        'currencyTo' => 'INR',
                        'amount' => 1000, // Change dynamically
                        'maxAge' => 0
                    ],
                    'query' => 'mutation GQLTransferComparison($lang: String!, $from: String!, $to: String!, $currencyFrom: String!, $currencyTo: String!, $amount: Float!, $maxAge: Int!) {
                results: compareTransfers(
                    corridor: {from: $from, to: $to, currencyFrom: $currencyFrom, currencyTo: $currencyTo, amount: $amount}
                    sync: true
                    maxAge: $maxAge
                ) {
                    comparisonId
                    start
                    midMarket { rate }
                    providerQuotes {
                    psp {
                        name
                        affiliateUrl(locale: $lang)
                    }
                    quotes {
                        rate
                        receivedAmount
                        fee { total }
                        transferTime { min max }
                    }
                    }
                }
                }'
                ]);

        $data = $response->json();

        return $data['data']['results']['providerQuotes'];
    }
    public function storeRatesFromMonito()
    {
        $baseAmount1 = 13000;
        $baseAmounts = [100, 200, 400, 500, 1000, 2000, 3000, 5000, 10000, 11000, 12000, 15000, 18000, 20000, 25000, 30000, 35000, 40000, 50000, 75000, 100000];
        foreach ($baseAmounts as $baseAmount) {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Origin' => 'https://www.monito.com',
                'Referer' => 'https://www.monito.com/en/compare/transfer/se/in/sek/inr/' . $baseAmount,
                'apollographql-client-name' => '@gifsa/website/client',
                'apollographql-client-version' => '6.47.0',
                'User-Agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36',
            ])->post('https://www.monito.com/api/v2', [
                        'operationName' => 'GQLTransferComparison',
                        'variables' => [
                            'lang' => 'en',
                            'from' => 'SE',
                            'to' => 'IN',
                            'currencyFrom' => 'SEK',
                            'currencyTo' => 'INR',
                            'amount' => $baseAmount,
                            'maxAge' => 0
                        ],
                        'query' => 'mutation GQLTransferComparison($lang: String!, $from: String!, $to: String!, $currencyFrom: String!, $currencyTo: String!, $amount: Float!, $maxAge: Int!) {
            results: compareTransfers(
                corridor: {from: $from, to: $to, currencyFrom: $currencyFrom, currencyTo: $currencyTo, amount: $amount}
                sync: true
                maxAge: $maxAge
            ) {
                providerQuotes {
                    psp {
                        name
                        affiliateUrl(locale: $lang)
                    }
                    quotes {
                        rate
                        receivedAmount
                        fee { total }
                        transferTime { min max }
                    }
                }
            }
        }'
                    ]);

            $quotes = $response->json('data.results.providerQuotes');

            if (!$quotes) {
                return response()->json(['error' => 'No quotes found'], 500);
            }

            foreach ($quotes as $providerQuote) {
                $providerName = $providerQuote['psp']['name'];
                $affiliateUrl = $providerQuote['psp']['affiliateUrl'] ?? null;

                $provider = Provider::where('name', $providerName)->first();

                if (!$provider || empty($providerQuote['quotes'])) {
                    continue;
                }

                // ✅ Take only the first quote
                $quote = $providerQuote['quotes'][0];

                DB::table('remittance_rates')->updateOrInsert(
                    [
                        'provider_id' => $provider->id,
                        'base_amount' => $baseAmount,
                        'from_currency' => 'SEK',
                        'to_currency' => 'INR',
                        'from_country' => 'SE',
                    ],
                    [
                        'rate' => $quote['rate'],
                        'fee' => $quote['fee']['total'],
                        'received_amount' => $quote['receivedAmount'],
                        'transfer_time' => $quote['transferTime']['min'] . '-' . $quote['transferTime']['max'],
                        'affiliate_url' => $affiliateUrl,
                        'fetched_at' => now(),
                    ]
                );
            }
        }

        return response()->json(['message' => 'Only first quotes saved for each provider.']);
    }



}
