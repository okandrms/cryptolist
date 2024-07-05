<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FetchController extends Controller
{
    public static function getBitcoinPrice()
    {
        $json = Http::withoutVerifying()->withOptions(["verify" => false])->get('https://api.coindesk.com/v1/bpi/currentprice.json');
        $data = json_decode($json, true);
        return $data['bpi']['EUR']['rate_float'];
    }

    public static function getBitcoinHistory()
{
    $start_date = now()->subDays(30)->format('Y-m-d'); // 30 days before
    $end_date = now()->format('Y-m-d'); // Today

    $json = Http::withoutVerifying()->withOptions(["verify" => false])->get("https://api.coindesk.com/v1/bpi/historical/close.json", [
        'start' => $start_date,
        'end' => $end_date,
        'currency' => 'EUR'
    ]);
    $data = json_decode($json, true);
    return response()->json($data['bpi']); // return data in JSON format
}

}
