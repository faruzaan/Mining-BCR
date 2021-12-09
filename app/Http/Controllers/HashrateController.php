<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HashrateController extends Controller
{
    public function index()
    {
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
