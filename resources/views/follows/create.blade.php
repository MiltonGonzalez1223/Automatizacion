@extends('layout')
@section('head')
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endsection
@section('title') Creacion de Proveedores @endsection
@section('content')
<div class="container-fluid p-5 bg-primary text-white text-center">
    <h1>Cargue de Datos-Seguimiento</h1>
  </div>
<div class="container mt-3">
  
  <div class="col-sm-8">
      <h3>Ingreso de datos por Excel</h3>
      <p>En este Apartado se podra subir un archivo Excel para si depronto ya tiene muchos registro asi no tener que subir uno por uno.</p>
      <form action="{{route('orders.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
          <input type="file" name="file" class="dropzone"><br><br>
          <input type="submit">
      </form>
      </div>
</div>
@endsection
