<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalcController extends Controller
{
    public function index()
    {
        return view('pages/calculate');
    }
    public function result(Request $request)
    {
        $id = $request['id_device'];
        $data['device'] = \App\Models\Devices::where('id_device',$id)->first();
        $data['algo'] = \App\Models\Hashrate::where('id_device',$id)->first();
        $data['cost'] = $data['algo']->watt/1000*24*$request['elcost'];
        $data['benefit'] = $data['algo']->hashrate*$data['algo']->blockReward*24/$data['algo']->difficulity;
        $data['b/c'] = $data['benefit']/$data['cost'];

        return view('pages/result')->with($data);
    }
}
