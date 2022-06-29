@extends('layout')
@section('title') Inicio @endsection
@section('content')
  <div class="container-fluid p-5 bg-primary text-white text-center">
    <h1>Listado de proveedores</h1>
  </div>
<div class="btn-group" style="float:right;">
    <a href="{{route('docs.create')}}"><button type="button" class="btn btn-success">Crear Nuevo Documento</button></a>
  </div>
<table class="table table-dark table-striped">
    <thead>
      <tr>
        <th>Acreedor</th>
        <th>Proveedor</th>
        <th>Numero de Documento</th>
        <th>Valor de Factura</th>
        <th>Fecha de cargue</th>
        <th>Detalles</th>
      </tr>
    </thead>
    <tbody>
      @foreach($docs as $doc)
        <tr>
            <td>{{$doc->acreedor}}</td>
            <td>{{$doc->Nombre_Proveedor}}</td>
            <td>{{$doc->document}}</td>
            <td>{{$doc->value}}</td>
            <td>{{$doc->created_at}}</td>
            <td>
            <div class="btn-group">
            <a href="{{$doc->url}}"><button type="button" style="border-radius:0px!important;" class="btn btn-success">Ver Factura</button></a>
            
            </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection