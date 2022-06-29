@extends('layout')
@section('title') Creacion de Proveedores @endsection
@section('content')
<div class="container mt-3">
  <h2>Bienvenido a la creacion de Proveedores</h2>
  <form action="{{route('suppliers.store')}}" method="POST">
      @csrf
      <div class="form-floating mb-3 mt-3">
      <input type="text" class="form-control" id="num"  name="num">
      <label for="num">Numero de acreedor</label>
    </div>
    <div class="form-floating mb-3 mt-3">
      <input type="text" class="form-control" id="name"  name="name">
      <label for="name">Nombre del proveedor</label>
    </div>
    <div class="form-floating mb-3 mt-3">
      <select name="moneda" id="" class="form-select  ">
        <option value="null">Seleccione moneda de pago</option>
        <option value="USD">Dolares-USD</option>
        <option value="COP">Moneda Nacional-COP</option>
      </select>
      <label for="moneda">Moneda de Pago</label>
    </div>
    <div class="form-floating mt-3 mb-3">
      <input type="text" class="form-control" id="agrupador"  name="agrupador">
      <label for="agrupador">Agrupador</label>
    </div>
    <button type="submit" class="btn btn-primary">Registrar</button>
  </form>
</div>
@endsection
