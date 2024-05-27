<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class FetchController extends Controller
{
    public static function getBitcoinPrice()
    {
        $json = Http::withoutVerifying()->withOptions(["verify"=>false])->get('https://api.coindesk.com/v1/bpi/currentprice.json');
        $data = json_decode($json, true);
        // dd($data);
        return $data['bpi']['EUR']['rate_float'];
    }   
    

   
}
