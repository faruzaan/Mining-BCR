<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class HashrateController extends Controller
{
    public function index()
    {
        $api = json_decode(Http::get('https://rvn.2miners.com/api/blocks'));
        $data['difficulity'] = $api->immature[0]->difficulty;
        $rate = json_decode(Http::get('https://api2.nicehash.com/exchange/api/v2/info/prices'));
        $data['reward'] = $rate->RVNUSDT*5000;
        $data['result'] = \App\Models\Hashrate::all();
        return view('algo/index')->with($data);
    }
    public function indexspec($id)
    {
        $data['result'] = \App\Models\Hashrate::where('id_device',$id);
        return view('algo/index')->with($data);
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $status = \App\Models\Hashrate::create($input);
        return redirect('/algo');
    }
}
