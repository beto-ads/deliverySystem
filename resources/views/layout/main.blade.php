<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <script src= "{{ asset('js/jQuery.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
                
       
    </head>

    <body >
    <!-- Navbar -->
    <nav class="navbar ">
        <div class="container-fluid">
            <button class="btn btn-success" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft" aria-controls="offcanvasLeftLabel"><span class="navbar-toggler-icon"></span></button>
            <a class="navbar-brand text-white" href="#">
            SOFT SELL
            </a>
        </div>
    </nav>

        
<!-- offcanvas -->
<div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="offcanvasLeft" aria-labelledby="offcanvasBottomLabel">
  <div class="offcanvas-header text-bg-white">
    <h4 class="offcanvas-title text-white" id="offcanvasBottomLabel">MENU</h4>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <li class="nav-item">
      <a class="nav-link" href="/">
       <i class="fas fa-solid fa-home"></i>  Inicio
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/usuario">
        <i class="fas fa-solid fa-user"></i>  Usuario
      </a>
    </li> 
    <li class="nav-item">
      <a class="nav-link" href="/pedido">
        <i class="fas fa-shopping-cart"></i>  Pedido
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/entrega">
        <i class="fas fa-solid fa-car"></i>  Entregas
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/produto">
        <i class="fas fa-solid fa-box-open"></i>  Produto
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/cliente">
        <i class="fas fa-solid fa-user"></i>  Cliente
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/entregador">
        <i class="fas fa-solid fa-motorcycle"></i>  Entregador
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/fornecedor">
       <i class="fas fa-solid fa-dolly"></i>  Fornecedor
      </a>
    </li>
    
  </div>
</div>


@yield('content')
    </body>
</html>
