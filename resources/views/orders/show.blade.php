@extends('layout')
@section('title') Inicio @endsection
@section('content')
  <div class="container-fluid p-5 bg-primary text-white text-center">
    <h1>Listado de Pedidos {{$orders[0]->fecha_cargue}}</h1>
  </div>
<div class="btn-group" style="float:right;">
    <a href="{{route('orders.create')}}"><button type="button" class="btn btn-success">Crear Nuevo Cargue</button></a>
  </div><br><br>
<table class="table">
    <thead>
      <tr style="background-color:#212529;color:white;">
        <th>Proveedor</th>
        <th>Acreedor</th>
        <th>Periodo</th>
        <th>Valor de la Factura</th>
        <th>Valor del Pedido</th>
        <th>Pedido</th>
        <th>Migo</th>
        <th>Tecnología</th>
        <th>Estado</th>
        <th>Accion</th>
      </tr>
    </thead>
    <tbody>
      @foreach($orders as $order)
        <tr  class="{{$order->name}}">
            <td>{{$order->Nombre_Proveedor}}</td>
            <td>{{$order->acreedor}}</td>
            <td>{{$order->periodo}}</td>  
            <td>{{$order->value}}</td>
            <td>{{$order->value}}</td>
            <td>{{$order->pedido}}</td>
            <td>{{$order->migo}}</td>
            <td>{{$order->tecnologia}}</td>
            <form action="{{route('orders.update', $order->pedido)}}" method="POST">
            @csrf
            @method('put')
            <td>
            <select name="status" class="">
      <option value="{{$order->status}}">{{$order->name}}</option>
          @foreach($status as $statu)
            <option value="{{$statu->id}}">{{$statu->name}}</option>
          @endforeach
          </select>
            </td>
            <td><input type="submit" value="Editar" style="border-radius:0px!important;" class="btn btn-success">
            </form></td>
        </tr>
      @endforeach
    </tbody>
  </table>
  </div>
</div>
@endsection