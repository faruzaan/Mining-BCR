<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DevicesController extends Controller
{
    public function index()
    {
        $data['result'] = \App\Models\Devices::all();
        return view('device/index')->with($data);
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $status = \App\Models\Devices::create($input);
        return redirect('/device-list');
    }
}
