@extends('layout')
@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection
@section('title') Inicio @endsection
@section('content')
  <div class="container-fluid p-5 bg-primary text-white text-center">
    <h1>Prueba de Bilioteca 2.0</h1>
    <p>Objetivos del aplicativo!</p>
  </div>
  <div class="container card">
    <div class="center">
    <h3>Accesos Directos</h3>
    </div>
    <hr>
  <div class="row">
    <div class="col s12 m6">
      <div class="card center">
        <div class="card-content">
          <h4>Modulo de Proveedores</h4>
          <div class="center"><i class="large material-icons indigo-text">assignment_ind</i></div>
            <div class="card-action">
              <a href="{{route('suppliers.index')}}" class="btn green darken-4 white-text">Ingresar</a>
            </div>
        </div>
      </div>
    </div>
    <div class="col s12 m6">
      <div class="card center">
        <div class="card-content">
          <h4>Modulo de Pedidos</h4>
          <div class="center"><i class="large material-icons indigo-text">library_books</i></div>
            <div class="card-action">
              <a href="{{route('orders.index')}}" class="btn green darken-4 white-text">Ingresar</a>
            </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col s12 m6">
      <div class="card center">
        <div class="card-content">
          <h4>Modulo de Documentos</h4>
          <div class="center"><i class="large material-icons indigo-text">folder</i></div>
            <div class="card-action">
              <a href="{{route('docs.index')}}" class="btn green darken-4 white-text">Ingresar</a>
            </div>
        </div>
      </div>
    </div>
    <div class="col s12 m6">
      <div class="card center">
        <div class="card-content">
          <h4>Modulo de Seguimiento</h4>
          <div class="center"><i class="large material-icons indigo-text">chrome_reader_mode</i></div>
            <div class="card-action">
              <a href="{{route('follows.index')}}" class="btn green darken-4 white-text">Ingresar</a>
            </div>
        </div>
      </div>
    </div>
  </div>
<div class="container mt-5">
@if($cant == '0')
  <div class="alert green darken-4 white-text">No tienes ningun pedido pendiente.
</div>
  @else
  <div class="alert red darken-4 white-text">
  <strong>Alerta!</strong> Tienes {{$cant[0]->cant}} pedido/s sin radicar.
</div>
  @endif
<table class="table table-dark table-striped">
    <thead>
      <tr>
        <th>Acreedor</th>
        <th>Proveedor</th>
        <th>Periodo por Pagar</th>
        <th>Tipo de Moneda</th>
        <th>Valor por Pagar</th>
      </tr>
    </thead>
    <tbody>
      @foreach($pendientes as $pendiente)
        <tr>
            <td>{{$pendiente->acreedor}}</td>
            <td>{{$pendiente->Nombre_proveedor}}</td>
            <td>{{$pendiente->periodo}}</td>
            <td>{{$pendiente->Moneda_Pago}}</td>
            <td>{{$pendiente->value}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.tooltipped');
    var instances = M.Tooltip.init(elems, options);
  });

  $(document).ready(function(){
    $('.tooltipped').tooltip();
  });
      
</script>
@endsection