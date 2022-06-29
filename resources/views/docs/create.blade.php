@extends('layout')
@section('head')
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endsection
@section('title') Creacion de Proveedores @endsection
@section('content')
<div class="container-fluid p-5 bg-primary text-white text-center">
    <h1>Cargue de Datos-Documentos</h1>
  </div>
<div class="container mt-3">
  
  <div class="col-sm-8">
    <form action="{{route('docs.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
        <select name="año" id="" class="form-select">
          <option value="null">Seleccione el año a cargar</option>
          <option value="2022">2022</option>
          <option value="2023">2023</option>
          <option value="2024">2024</option>
          <option value="2025">2025</option>
          <option value="2026">2026</option>
          <option value="2027">2027</option>
          <option value="2028">2028</option>
          <option value="2029">2029</option>
          <option value="2030">2030</option>
        </select><br>
        <select name="mes" id="" class="form-select">
          <option value="null">Seleccione el mes a cargar</option>
          <option value="01">Enero</option>
          <option value="02">Febrero</option>
          <option value="03">Marzo</option>
          <option value="04">Abril</option>
          <option value="05">Mayo</option>
          <option value="06">Junio</option>
          <option value="07">Julio</option>
          <option value="08">Agosto</option>
          <option value="09">Septiembre</option>
          <option value="10">Octubre</option>
          <option value="11">Noviembre</option>
          <option value="12">Diembre</option>
        </select></div>
          <select name="acreedor" class="form-select">
          @foreach($suppliers as $supplier)
            <option value="{{$supplier->Acreedor}}">{{$supplier->Nombre_proveedor}}</option>
          @endforeach
          </select>
          <div class="form-floating mb-3 mt-3">
            <input type="text" class="form-control" id="document" name="document">
            <label for="document">Documento de Referencia</label>
          </div>
          <div class="form-floating mb-3 mt-3">
            <input type="text" class="form-control" id="value" name="value">
            <label for="value">Valor de la Factura</label>
          </div>
          <input type="file" name="file" class="dropzone"><br><br>
          <input type="submit" class="btn btn-primary">
      </form>
      </div>
</div>
@endsection
