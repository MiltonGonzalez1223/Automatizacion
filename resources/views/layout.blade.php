<!--Objetivo de este mini proyecto: Realizar un aplicativo donde podamos simular la gestion de factura de aqui en las practicas"-->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Biblioteca G-BA TV y Video - @yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @yield('head')
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('js/jquery.js')}}"></script>
  <link rel="stylesheet" href="{{asset('jquery-ui-1.13.1/jquery-ui.min.css')}}">
  
  <script src="{{asset('js/jquery.js')}}"></script>

  <style>
    .hipertext{
    text-decoration: none;
    color:black;
    }

    .Pendiente{
    background-color:yellow;
  }

  .Contabilizadas, .Radicada{
    background-color:green;
    color:white;
  }

  .Pedidos{
    background-color:green;
    color:white;
  }

  .Anuladas{
    background-color:red;
    color:white;
  }
  </style>
</head>
<body>
    
    <div class="offcanvas offcanvas-end" id="demo">
        <div class="offcanvas-header">
          <h1 class="offcanvas-title">Opciones</h1>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
          <a class="hipertext" href="{{route('suppliers.index')}}"><p>Modulo de Proveedores</p></a>
          <a class="hipertext" href="{{route('orders.index')}}"><p>Modulo de Pedidos</p></a>
          <a class="hipertext" href="{{route('docs.index')}}"><p>Modulo de Documentos</p></a>
          <a class="hipertext" href="{{route('follows.index')}}"><p>Modulo de Seguimiento</p></a>
          <a class="hipertext" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesion') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
        </div>
      </div>

      
  <nav class="navbar naxvbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Simulador de Gestion</a>
      <button class="btn btn-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="xx" style="">
      </div>
    </div>
  </nav>
  @yield('content')

  @yield('script')
  </body>
</html>