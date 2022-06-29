@extends('layout')
@section('title') Inicio @endsection
@section('content')
  <div class="container-fluid p-5 bg-primary text-white text-center">
    <h1>Listado de follow</h1>
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
      @foreach($follows as $follow)
        <tr>
            <td>{{$follow->periodo}}</td>
            <td>{{$follow->Cant}}</td>
            <td>
            <div class="btn-group">
            <a href="{{route('follows.show', $follow->periodo)}}"><button type="button" style="bfollow-radius:0px!important;" class="btn btn-success">Detalles</button></a>
            
            </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection