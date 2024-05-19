<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FetchController extends Controller
{
    public static function getBitcoinPrice()
    {
        $json = file_get_contents('https://api.coindesk.com/v1/bpi/currentprice.json');
        $data = json_decode($json, true);
        // dd($data);
        return $data['bpi']['EUR']['rate_float'];
    }   

   
}
