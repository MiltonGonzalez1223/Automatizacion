@extends('layout')
@section('title') Lista de Proveedores @endsection
@section('content')
  <div class="container-fluid p-5 bg-primary text-white text-center">
    <h1>Listado de proveedores</h1>
  </div>
<div class="container mt-5">
<div class="btn-group" style="float:right;">
    <a href="{{route('suppliers.create')}}"><button type="button" class="btn btn-primary">Crear Nuevo Proveedor</button></a>
  </div>
<table class="table table-dark table-striped">
    <thead>
      <tr>
        <th>Acreedor</th>
        <th>Nombre</th>
        <th>Moneda de pago</th>
        <th>Agrupador</th>
        <th>Detalles</th>
      </tr>
    </thead>
    <tbody>
      @foreach($suppliers as $supplier)
        <tr>
            <td>{{$supplier->Acreedor}}</td>
            <td>{{$supplier->Nombre_proveedor}}</td>
            <td>{{$supplier->Moneda_Pago}}</td>
            <td>{{$supplier->Agrupador}}</td>
            <td>
            <div class="btn-group">
            <a href="{{route('suppliers.show', $supplier->Acreedor)}}"><button type="button" style="border-radius:0px!important;" class="btn btn-success">Detalles</button></a>
            
            <form action="{{route('suppliers.destroy', $supplier->Acreedor)}}" method="post">
            @csrf
								@method('delete')
              <input type="submit" value="Eliminar" style="border-radius:0px!important;" class="btn btn-danger">
            </form>
            
            </div>
            </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection