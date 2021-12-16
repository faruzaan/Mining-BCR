<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class CalcController extends Controller
{
    public function index()
    {
        return view('pages/calculate');
    }
    public function result(Request $request)
    {
        $api = json_decode(Http::get('https://rvn.2miners.com/api/blocks'));
        $data['difficulity'] = $api->immature[0]->difficulty;
        $rate = json_decode(Http::get('https://api2.nicehash.com/exchange/api/v2/info/prices'));

        $data['device'] = \App\Models\Devices::where('id_device',$request->id_device)->first();
        $data['algo'] = \App\Models\Hashrate::where('id_device',$request->id_device)->first();
        $data['cost'] = $data['algo']->watt/1000*24*$request['elcost'];
        $data['benefit'] = $data['algo']->hashrate*5000*24/$data['difficulity']*$rate->RVNUSDT;
        $data['b/c'] = $data['benefit']/$data['cost'];

        return view('pages/calculate')->with($data);
    }
    public function compare()
    {
        return view('pages/compare');
    }
    public function comparehasil(Request $request)
    {
        $api = json_decode(Http::get('https://rvn.2miners.com/api/blocks'));
        $data['difficulity'] = $api->immature[0]->difficulty;
        $rate = json_decode(Http::get('https://api2.nicehash.com/exchange/api/v2/info/prices'));

        $data['algo1'] = \App\Models\Hashrate::where('id_device',$request->config1)->first();
        $data['cost1'] = $data['algo1']->watt/1000*24*$request['elcost'];
        $data['benefit1'] = $data['algo1']->hashrate*5000*24/$data['difficulity']*$rate->RVNUSDT;
        $data['result1'] = $data['benefit1']/$data['cost1'];

        $data['algo2'] = \App\Models\Hashrate::where('id_device',$request->config1)->first();
        $data['cost2'] = $data['algo1']->watt/1000*24*$request['elcost'];
        $data['benefit2'] = $data['algo1']->hashrate*5000*24/$data['difficulity']*$rate->RVNUSDT;
        $data['result2'] = $data['benefit2']/$data['cost2'];

        return view('pages/compare')->with($data);
    }
}
