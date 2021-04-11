@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
    <h1><center>PROCESO {{$proceso}}</center></h1>
    <br>
    @if($error==1)
    <div class="alert alert-success">{{$mensaje}}</div>
    @else
    <div class="alert alert-warning">{{$mensaje}}</div>
    @endif

  
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop