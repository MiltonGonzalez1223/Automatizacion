@extends('layout')
@section('title') Edicion de la Informacion @endsection
@section('content')
<div class="container mt-3">
  <h2>Bienvenido a la actualizacion de Pedidos</h2>
  <form action="{{route('orders.update', $orders[0]->acreedor)}}" method="POST">
      @csrf
      @method('put')
      <select name="status" class="form-select">
      <option value="{{$orders[0]->status}}">Seleccione SÍ cambio el estado del pedido</option>
          @foreach($status as $statu)
            <option value="{{$statu->id}}">{{$statu->name}}</option>
          @endforeach
          </select>
    <div class="form-floating mt-3 mb-3">
      <input type="text" class="form-control" id="acreedor"  value="{{$orders[0]->acreedor}}" name="acreedor">
      <label for="acreedor">Acreedor</label>
    </div>
      <div class="form-floating mb-3 mt-3">
      <input type="text" class="form-control" id="periodo"  value="{{$orders[0]->periodo}}" name="periodo">
      <label for="periodo">Periodo</label>
    </div>
    <div class="form-floating mb-3 mt-3">
      <input type="text" class="form-control" id="value"  value="{{$orders[0]->value}}" name="value">
      <label for="value">Valor de la Factura</label>
    </div>
    <div class="form-floating mt-3 mb-3">
      <input type="text" class="form-control" id="pedido"  value="{{$orders[0]->pedido}}" name="pedido">
      <label for="pedido">Pedido</label>
    </div>
    <div class="form-floating mb-3 mt-3">
      <input type="text" class="form-control" id="migo"  value="{{$orders[0]->migo}}" name="migo">
      <label for="migo">Migo</label>
    </div>
    <div class="form-floating mb-3 mt-3">
      <input type="text" class="form-control" id="tecnologia"  value="{{$orders[0]->tecnologia}}" name="tecnologia">
      <label for="tecnologia">Tecnologia</label>
    </div>
    <button type="submit" class="btn btn-primary">Registrar</button>
  </form>
</div>
@endsection