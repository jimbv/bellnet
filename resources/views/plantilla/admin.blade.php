<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>@yield('titulo')</title>

  <!-- Tell the browser to be responsive to screen width -->

  <meta name="viewport" content="width=device-width, initial-scale=1">

  @yield('estilos')

  <!-- Font Awesome -->

  <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">

  <!-- Ionicons -->

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- overlayScrollbars -->

  <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->

  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>

<body class="hold-transition sidebar-mini text-sm">

<!-- Site wrapper -->

<div class="wrapper">

  <!-- Navbar -->

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- Left navbar links -->

    <ul class="navbar-nav">

      <li class="nav-item">

        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>

      </li>

      <li class="nav-item d-none d-sm-inline-block">

        <a href="/admin" class="nav-link">Inicio</a>

      </li>

       

    </ul>



    <!-- SEARCH FORM 

    <form class="form-inline ml-3">

      <div class="input-group input-group-sm">

        <input class="form-control form-control-navbar" type="search" placeholder="Buscar" aria-label="Search">

        <div class="input-group-append">

          <button class="btn btn-navbar" type="submit">

            <i class="fas fa-search"></i>

          </button>

        </div>

      </div>

    </form>

-->

    <!-- Right navbar links -->

    <ul class="navbar-nav ml-auto">

       

      

      </li>
      <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </div>
      </li>
      <li class="nav-item">
 

      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">

<i class="fas fa-th-large"></i>

</a>

        <!--

          Barra para editar los colores del menu

          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">

          <i class="fas fa-th-large"></i>

        </a>



        -->

      </li>

    </ul>

  </nav>

  <!-- /.navbar -->



  <!-- Main Sidebar Container (le quite estilo elevation-4 de sombra)-->

  <aside class="main-sidebar sidebar-dark-primary ">

    <!-- Brand Logo -->

    <a href="/admin/" class="brand-link">

      <img src="/img/icono.png"

           alt="bellnet"

           class="brand-image img-circle elevation-3" >

      <span class="brand-text font-weight-light">&nbsp;bellnet</span>

    </a>



    <!-- Sidebar -->

    <div class="sidebar">

       

      <!-- Sidebar Menu -->

      <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">

          <!-- Add icons to the links using the .nav-icon class

               with font-awesome or any other icon font library -->

           


          <!-- Administración de usuarios, roles y permisos -->
          <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Usuarios
              <i class="right fas fa-angle-left"></i>
            </p>

          </a>

          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="{{route('admin.role.index')}}" class="nav-link">
                <i class="fas fa-user nav-icon"></i>
                <p>Roles</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('admin.user.index')}}" class="nav-link">
                <i class="fas fa-users nav-icon"></i>
                <p>Usuarios</p>
              </a>
            </li> 
          </ul>
          </li>

          <!-- Categorias -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Categorías
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.category.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de categorías</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.category.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nueva categoría</p>
                </a>
              </li> 
            </ul>
          </li>

          <!-- Productos -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Productos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.product.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de productos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.product.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nuevo producto</p>
                </a>
              </li> 
            </ul>
          </li> 
      </nav>

      <!-- /.sidebar-menu -->

    </div>

    <!-- /.sidebar -->

  </aside>



  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper" style='background:#FEF8F5;'> 

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>@yield('titulo')</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="/admin">Inicio</a></li>

              @yield('breadcrumb')

              

            </ol>

          </div>

        </div>

      </div><!-- /.container-fluid -->

    </section>

    <!-- Main content -->

    <section class="content">





    @if(session('cancelar'))

   

    <div class="alert alert-danger alert-dismissible fade show" role="alert">

      {{session('cancelar')}}

      <button type="button" class="close" data-dismiss='alert' aria-label='close'>

        <span aria-hidden='true'>&times;</span>

      </button>

    </div>



    @endif



    @if($errors->any())

      <div class="alert alert-danger">

      <ul>

      @foreach($errors->all() as $error)

        <li>{{$error}}</li>

      @endforeach

      </ul>

      </div>

    @endif



    @if(session('datos'))

   

    <div class="alert alert-success alert-dismissible fade show" role="alert">

      {{session('datos')}}

      <button type="button" class="close" data-dismiss='alert' aria-label='close'>

        <span aria-hidden='true'>&times;</span>

      </button>

    </div>



    @endif



    @yield('contenido')







    </section>

    <!-- /.content -->

  </div>

  <!-- /.content-wrapper -->



  <footer class="main-footer">

    

    <strong>&copy; <a href="http://www.bellnet.com.ar">Bellnet</a>.</strong>

  </footer>



  <!-- Control Sidebar -->

  <aside class="control-sidebar control-sidebar-dark">

    <!-- Control sidebar content goes here -->

  </aside>

  <!-- /.control-sidebar -->

</div>

<!-- ./wrapper -->

<!-- jQuery -->
<script src="/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="/adminlte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->

<script src="/adminlte/dist/js/demo.js"></script>



<!-- SweetAlert -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<!-- Scripts -->
<script src="{{ asset('js/app_admin.js') }}?v=10" defer></script> 

@yield('scripts')


</body>

</html>

