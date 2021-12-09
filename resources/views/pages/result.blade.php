@extends('templates/header')
@section('contents')
    <p>Device : {{$device->nama_device}}</p>
    <p>Algorithm : {{$algo->algo}}</p>
    <p>Hashrate : {{$algo->hashrate}}</p>
    <p>Watt : {{$algo->watt}}</p>
    <p>Pendapatan Perhari : ${{$benefit}}</p>
    <p>Listrik Perhari : ${{$cost}}</p>
@endsection
