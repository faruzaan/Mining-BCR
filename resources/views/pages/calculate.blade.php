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
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Quick Calculate</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{url('/calculate')}}" method="POST">
              {{ csrf_field() }}
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">El. costs</label>
                  <input type="text" name="elcost" class="form-control" id="exampleInputEmail1" placeholder="Masukan Electric Cost">
                </div>
                <div class="form-group">
                    <label>Device</label>
                    <select class="form-control select2" style="width: 100%;" name="id_device">
                        @foreach (\App\Models\Devices::all() as $device)
                            <option value="{{$device->id_device}}">{{$device->nama_device}}</option>
                        @endforeach
                      <option style="display: none" selected="selected">Pilih Device</option>
                    </select>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Calculate</button>
              </div>
            </form>
          </div>
          <!-- /.card -->

        </div>
        <!--/.col (left) -->

        @isset($algo)
        <!-- right column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">{{$algo->device->nama_device}}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Device</label>
                  <input type="text" class="form-control" disabled value="{{$algo->device->nama_device}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Algorithm</label>
                  <input type="text" class="form-control" disabled value="{{$algo->algo}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Hashrate</label>
                  <input type="text" class="form-control" disabled value="{{$algo->hashrate}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Watt</label>
                  <input type="text" class="form-control" disabled value="{{$algo->watt}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Pendapatan Perhari ($)</label>
                  <input type="text" class="form-control" disabled value="$ {{$benefit}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Biaya Listrik Perhari ($)</label>
                  <input type="text" class="form-control" disabled value="$ {{$cost}}">
                </div>
              </div>
              <!-- /.card-body -->
            </form>
          </div>
          <!-- /.card -->

        </div>
        <!--/.col (right) -->
        @endisset

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection
