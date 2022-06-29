@extends('layout')
@section('title') Edicion de la Informacion @endsection
@section('content')
<div class="container mt-3">
  <h2>Bienvenido a la actualizacion de Proveedores</h2>
  <form action="{{route('suppliers.update', $suppliers->acreedor)}}" method="POST">
      @csrf
      @method('put')
      <div class="form-floating mb-3 mt-3">
      <input type="text" class="form-control" id="num"  value="{{$suppliers->acreedor}}" name="num">
      <label for="num">Numero de acreedor</label>
    </div>
    <div class="form-floating mb-3 mt-3">
      <input type="text" class="form-control" id="name"  value="{{$suppliers->name}}" name="name">
      <label for="name">Nombre del proveedor</label>
    </div>
    <div class="form-floating mb-3 mt-3">
      <select value="{{$suppliers->money}}" name="moneda" id="" class="form-select  ">
        <option value="USD">Dolares-USD</option>
        <option value="COP">Moneda Nacional-COP</option>
      </select>
      <label for="moneda">Moneda de Pago</label>
    </div>
    <div class="form-floating mt-3 mb-3">
      <input type="text" class="form-control" id="agrupador"  value="{{$suppliers->agrupador}}" name="agrupador">
      <label for="agrupador">Agrupador</label>
    </div>
    <button type="submit" class="btn btn-primary">Registrar</button>
  </form>
</div>
@endsection