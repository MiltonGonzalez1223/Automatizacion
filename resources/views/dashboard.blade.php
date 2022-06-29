@extends('layout')
@section('title') Inicio @endsection
@section('content')
  <div class="container-fluid p-5 bg-primary text-white text-center">
    <h1>Nombre del aplicativo</h1>
    <p>Objetivos del aplicativo!</p>
  </div>
<div class="container mt-5">
  <div class="row">
    <div class="col-sm-4">
      <h3>Carga de documentacion</h3>
      <p>Con este objetivo se busca automatizar la carga de documentacion dentro del equipo, en esta seccion se podra subir diferentes tipos de archivos como facturas, documentos de soporte, conciliaciones, etc.</p>
    </div>
    <div class="col-sm-4">
      <h3>Seguimiento de radicacion de facturas</h3>
      <p>Con este objetivo se busca realizar un seguimiento a la documentacion carga dentro del aplicativo, enfoncado en las facturas, con esto se espera evitar radicar algun proveedor todos los meses.</p>
    </div>
    <div class="col-sm-4">
      <h3>Notificacion de Seguimiento</h3>        
      <p>Con este objetivo se desea realizar un monitoreo de facturas ya sea cuando se carga algun tipo de documentacion o en cada fecha cercana al limite de radicar, no se ha recibido ninguna factura por parte del proveedor.</p>
    </div>
  </div>
</div>
@endsection