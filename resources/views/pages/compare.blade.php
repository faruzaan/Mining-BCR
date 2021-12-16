@extends('templates/header')
@section('contents')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Calculate</h1>

        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item active">Calculate</li>
            </ol>
        </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="card card-warning col-md-12">
                <div class="card-header">
                    <h3 class="card-title">Compare the potential earnings of your hardware</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{url('/compare')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-form-label" for="inputWarning"><i class="far fa-bell"></i> El. costs</label>
                            <input type="text" name="elcost" class="form-control" id="exampleInputEmail1" placeholder="Masukan Electric Cost">
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                            <!-- select -->
                                <div class="form-group">
                                    <label>CONFIGURATION 1</label>
                                    <select class="form-control" name="config1">
                                        @foreach (\App\Models\Devices::all() as $device)
                                            <option value="{{$device->id_device}}">{{$device->nama_device}}</option>
                                        @endforeach
                                    <option style="display: none" selected="selected">Pilih Device</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>CONFIGURATION 2</label>
                                    <select class="form-control" name="config2">
                                        @foreach (\App\Models\Devices::all() as $device)
                                            <option value="{{$device->id_device}}">{{$device->nama_device}}</option>
                                        @endforeach
                                    <option style="display: none" selected="selected">Pilih Device</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Calculate</button>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@if (isset($result1))
    <div class="container">
        <h3 class="text-center mb-5">Your approx. income</h3>
        <div class="row">
            <div class="col-md-5">
                <h2 class="text-center" >{{$algo1->device->nama_device}}</h2>
                <h1 class="text-center" >{{$benefit1 - $cost1}} USD/Day</h1>
            </div>
            <div class="vl" style="border-left: 5px solid rgb(173, 173, 173);"></div>
            <div class="col-md-5">
                <h2 class="text-center">{{$algo2->device->nama_device}}</h2>
                <h1 class="text-center" >{{$benefit2 - $cost2}} USD/Day</h1>
            </div>
        </div>
        <p class="mb-5">*Please note that values are only estimates based on past performance - real values can be lower or higher. Exchange rate of 1 RVN = {{$rate}} USD was used.</p>
        <h3 class="text-center mb-3">Past earnings of your setup</h3>
        <div class="row">
            <div class="col-md-6">
                <style type="text/css">
                    .tg  {border-collapse:collapse;border-spacing:0;}
                    .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
                        overflow:hidden;padding:10px 5px;word-break:normal;}
                    .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
                        font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
                    .tg .tg-0lax{text-align:left;vertical-align:top}
                </style>
                <table class="tg text-center" style="undefined;table-layout: fixed; width: 297px">
                <colgroup>
                <col style="width: 54px">
                <col style="width: 81px">
                <col style="width: 81px">
                <col style="width: 81px">
                </colgroup>
                <thead>
                    <tr>
                    <th class="tg-0lax"></th>
                    <th class="tg-0lax">1 Day</th>
                    <th class="tg-0lax">1 Week</th>
                    <th class="tg-0lax">1 Month</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td class="tg-0lax">💵 Income</td>
                    <td class="tg-0lax">{{$benefit1}} $</td>
                    <td class="tg-0lax">{{$benefit1 * 7}} $</td>
                    <td class="tg-0lax">{{$benefit1 * 30}} $</td>
                    </tr>
                    <tr>
                    <td class="tg-0lax">⚡ El. costs</td>
                    <td class="tg-0lax">{{$cost1}} $</td>
                    <td class="tg-0lax">{{$cost1 * 7}} $</td>
                    <td class="tg-0lax">{{$cost1 * 30}} $</td>
                    </tr>
                    <tr>
                    <td class="tg-0lax">💰 Profit</td>
                    <td class="tg-0lax">{{$benefit1 - $cost1}} $</td>
                    <td class="tg-0lax">{{$benefit1 - $cost1 * 7}} $</td>
                    <td class="tg-0lax">{{$benefit1 - $cost1 * 30}} $</td>
                    </tr>
                </tbody>
                </table>
            </div>
            <div class="col-md-6 mb-5">
                <style type="text/css">
                    .tg  {border-collapse:collapse;border-spacing:0;}
                    .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
                        overflow:hidden;padding:10px 5px;word-break:normal;}
                    .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
                        font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
                    .tg .tg-0lax{text-align:left;vertical-align:top}
                </style>
                <table class="tg text-center" style="undefined;table-layout: fixed; width: 297px">
                <colgroup>
                <col style="width: 54px">
                <col style="width: 81px">
                <col style="width: 81px">
                <col style="width: 81px">
                </colgroup>
                <thead>
                    <tr>
                    <th class="tg-0lax"></th>
                    <th class="tg-0lax">1 Day</th>
                    <th class="tg-0lax">1 Week</th>
                    <th class="tg-0lax">1 Month</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td class="tg-0lax">💵 Income</td>
                    <td class="tg-0lax">{{$benefit1}} $</td>
                    <td class="tg-0lax">{{$benefit1 * 7}} $</td>
                    <td class="tg-0lax">{{$benefit1 * 30}} $</td>
                    </tr>
                    <tr>
                    <td class="tg-0lax">⚡ El. costs</td>
                    <td class="tg-0lax">{{$cost1}} $</td>
                    <td class="tg-0lax">{{$cost1 * 7}} $</td>
                    <td class="tg-0lax">{{$cost1 * 30}} $</td>
                    </tr>
                    <tr>
                    <td class="tg-0lax">💰 Profit</td>
                    <td class="tg-0lax">{{$benefit1 - $cost1}} $</td>
                    <td class="tg-0lax">{{$benefit1 - $cost1 * 7}} $</td>
                    <td class="tg-0lax">{{$benefit1 - $cost1 * 30}} $</td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endif
@endsection
