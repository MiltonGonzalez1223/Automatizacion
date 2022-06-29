@extends('layout')
@section('title') Inicio @endsection
@section('content')
  <div class="container-fluid p-5 bg-primary text-white text-center">
    <h1>Listado de doc</h1>
  </div>
<div class="btn-group" style="float:right;">
    <a href="{{route('docs.create')}}"><button type="button" class="btn btn-success">Crear Nuevo Cargue</button></a>
  </div>
<table class="table table-dark table-striped">
    <thead>
      <tr>
        <th>Periodo</th>
        <th>Cantida de Registros</th>
        <th>Detalles</th>
      </tr>
    </thead>
    <tbody>
      @foreach($docs as $doc)
        <tr>
            <td>{{$doc->periodo}}</td>
            <td>{{$doc->Cant}}</td>
            <td>
            <div class="btn-group">
            <a href="{{route('docs.show', $doc->periodo)}}"><button type="button" style="bdoc-radius:0px!important;" class="btn btn-success">Detalles</button></a>
            
            </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection