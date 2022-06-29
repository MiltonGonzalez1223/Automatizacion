@extends('layout')
@section('title') Inicio @endsection
@section('head')
<style>
  
</style>
@endsection
@section('content')
  <div class="container-fluid p-5 bg-primary text-white text-center">
    <h1>Listado de seguimiento</h1>
  </div>
<table class="table">
    <thead>
      <tr  style="background-color:#212529;color:white;">
      <th>Proveedor</th>
        <th>Acreedor</th>
        <th>Documento</th>
        <th>Valor Factura</th>
        <th>Valor Pedido</th>
        <th>Pedido</th>
        <th>Migo</th>
        <th>Cod. Vul</th>
        <th>Periodo</th>
        <th>Fecha de Recibido</th>
        <th>Fecha de Radicacion</th>
        <th>Observacion</th>
      </tr>
    </thead>
    <tbody>
      @foreach($follows as $follow)
        <tr class="{{$follow->name}}">
            <td>{{$follow->Nombre_Proveedor}}</td>
            <td>{{$follow->acreedor}}</td>
            <td>{{$follow->document}}</td>
            <td>{{$follow->value}}</td>
            <td>{{$follow->value}}</td>
            <td>{{$follow->pedido}}</td>
            <td>{{$follow->migo}}</td>
            <td>{{$follow->cod_vul}}</td>
            <td>{{$follow->pago}}</td>
            <td>{{$follow->created_at}}</td>
            <td>{{$follow->radicacion}}</td>
            <td>{{$follow->name}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection