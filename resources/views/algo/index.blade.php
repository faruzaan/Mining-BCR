@push('style')
<link rel="stylesheet" href="{{asset('assets')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('assets')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('assets')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush
@extends('templates/header')
@section('contents')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Data Devices</h1>

        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item active">Data Algorithm</li>
            </ol>
        </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="modal fade" id="modal-sm">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Tambah Data Algorithm</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{url('algo/add')}}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Device</label>
                    <select class="form-control select2" style="width: 100%;" name="id_device">
                        @foreach (\App\Models\Devices::all() as $device)
                            <option value="{{$device->id_device}}">{{$device->nama_device}}</option>
                        @endforeach
                      <option style="display: none" selected="selected">Pilih Device</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Hashrate</label>
                    <input type="text" class="form-control" name="hashrate" placeholder="Masukan Hashrate">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Algorithm</label>
                    <input type="text" class="form-control" name="algo" placeholder="Masukan Algorithm">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">BlockReward</label>
                    <input type="text" class="form-control" name="blockreward" placeholder="Masukan BlockReward">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Difficulity</label>
                    <input type="text" class="form-control" name="difficulity" placeholder="Masukan Difficulity">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Watt</label>
                    <input type="text" class="form-control" name="watt" placeholder="Masukan Watt">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
        {{-- <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
        <div class="col-12">
            <div class="card">
            <div class="card-header">
                <h3 class="card-title">List of Available Device</h3>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-sm">
                    Tambah Data
                </button>
                <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Device</th>
                    <th>Hashrate</th>
                    <th>Algo</th>
                    <th>BlockReward</th>
                    <th>Difficulity</th>
                    <th>Watt</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($result as $row)
                <tr>
                    <td>{{$row->device->nama_device}}</td>
                    <td>{{$row->hashrate}}</td>
                    <td>{{$row->algo}}</td>
                    <td>{{$row->blockReward}}</td>
                    <td>{{$row->difficulity}}</td>
                    <td>{{$row->watt}}</td>
                    <td>{{$row->difficulity}}</td>
                </tr>
                @endforeach
                </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>
    </div>
</section>
@endsection
@push('script')
<script src="{{asset('assets')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('assets')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('assets')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('assets')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('assets')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('assets')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('assets')}}/plugins/jszip/jszip.min.js"></script>
<script src="{{asset('assets')}}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('assets')}}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('assets')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('assets')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('assets')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endpush
