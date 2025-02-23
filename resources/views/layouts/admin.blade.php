<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema De Citas Medicas</title>

  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  
  <link rel="stylesheet" href="{{url ('plugins/fontawesome-free/css/all.min.css')}}">
  
  <link rel="stylesheet" href="{{url ('dist/css/adminlte.min.css')}}">
 
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  
<script src="{{url ('plugins/jquery/jquery.min.js')}}"></script>


  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 
  <link rel="stylesheet" href="{{url ('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{url ('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{url ('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">



<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.2/main.min.css' rel='stylesheet' />

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.2/main.min.js'></script>


<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale/es.js"></script> 






</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">


  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url ('/admin')}}" class="nav-link">Sistema De Citas Medicas</a>
      </li>
    </ul>

    
    <ul class="navbar-nav ml-auto">

     
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
   
    <a href="{{url ('/admin')}}" class="brand-link">
      <img src="{{url('dist/img/logo sjt.png')}}" alt="San Judas Tadeo Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">C.S SJT</span>
    </a>

    
    <div class="sidebar">
     
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      

     
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          





               @can('admin.usuarios.index')
                 
               <li class="nav-item ">
                <a href="#" class="nav-link active">
                  
                  <i class="nav-icon fas bi bi-people-fill"></i>
                  <p>
                    Usuarios
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url ('admin/usuarios/create')}}" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Creación De Usuarios</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url ('admin/usuarios')}}" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Listado De Usuarios</p>
                    </a>
                  </li>
                </ul>
              </li>
    



               @endcan
          
               @can('admin.secretarias.index')

               <li class="nav-item ">
                <a href="#" class="nav-link active">
                  
                  <i class="nav-icon fas bi bi-person-circle"></i>
                  <p>
                    Secretarias
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url ('admin/secretarias/create')}}" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Creación De Secretarias</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url ('admin/secretarias')}}" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Listado De Secretarias</p>
                    </a>
                  </li>
                </ul>
              </li>
                 
               @endcan

          @can('admin.pacientes.index')
            
          <li class="nav-item ">
            <a href="#" class="nav-link active">
              
              <i class="nav-icon fas bi bi-person-vcard"></i>
              <p>
               Pacientes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url ('admin/pacientes/create')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Creación De Pacientes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url ('admin/pacientes')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado De Paciente</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan


@can('admin.consultorios.index')
<li class="nav-item ">
  <a href="#" class="nav-link active">
    
    <i class="nav-icon fas bi bi-hospital"></i>
    <p>
     Consultorios
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{url ('admin/consultorios/create')}}" class="nav-link active">
        <i class="far fa-circle nav-icon"></i>
        <p>Creación De Consultorios</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{url ('admin/consultorios')}}" class="nav-link active">
        <i class="far fa-circle nav-icon"></i>
        <p>Listado De Consultorios</p>
      </a>
    </li>
  </ul>
</li>
@endcan
          


@can('admin.doctores.index')
  
<li class="nav-item ">
  <a href="#" class="nav-link active">
    
    <i class="nav-icon fas bi bi-person-heart"></i>
    <p>
     Doctores
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{url ('admin/doctores/create')}}" class="nav-link active">
        <i class="far fa-circle nav-icon"></i>
        <p>Creación De Doctores</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{url ('admin/doctores')}}" class="nav-link active">
        <i class="far fa-circle nav-icon"></i>
        <p>Listado De Doctores</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{url ('admin/doctores/reportes')}}" class="nav-link active">
        <i class="far fa-circle nav-icon"></i>
        <p>Reportes</p>
      </a>
    </li>
  </ul>
</li>

@endcan
          


@can('admin.horarios.index')
  
<li class="nav-item ">
  <a href="#" class="nav-link active">
    
    <i class="nav-icon fas bi bi-calendar2-heart-fill"></i>
    <p>
     Horarios
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{url ('admin/horarios/create')}}" class="nav-link active">
        <i class="far fa-circle nav-icon"></i>
        <p>Creación De Horarios</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{url ('admin/horarios')}}" class="nav-link active">
        <i class="far fa-circle nav-icon"></i>
        <p>Listado De Horarios</p>
      </a>
    </li>
  </ul>
</li>


@endcan


@can('admin.reservas.index')
  
<li class="nav-item ">
  <a href="#" class="nav-link active">
    
    <i class="nav-icon fas bi bi-building-add"></i>
    <p>
     Reservas
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{url ('admin/reservas/create')}}" class="nav-link active">
        <i class="far fa-circle nav-icon"></i>
        <p>Creación De Reservas</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{url ('admin/reservas')}}" class="nav-link active">
        <i class="far fa-circle nav-icon"></i>
        <p>Listado De Reservas</p>
      </a>
    </li>
  </ul>
</li>


@endcan






@can('admin.historial.index')
                 
               <li class="nav-item ">
                <a href="#" class="nav-link active">
                  
                  <i class="nav-icon fas bi bi-file-earmark-medical"></i>
                  <p>
                    Historial Clinico
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url ('admin/historial/create')}}" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Creación Del Historial</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url ('admin/historial')}}" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Listado Del Historial</p>
                    </a>
                  </li>


                  <li class="nav-item">
                    <a href="{{url ('admin/historial/buscar_paciente')}}" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Buscar Paciente</p>
                    </a>
                  </li>

                </ul>
              </li>
    



               @endcan

          


          




          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link " style="background-color: #a9200e" id=""
            onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();"
            >

              <i class="nav-icon fas bi bi-box-arrow-left"></i>
              <p>
                Cerrar Sesión
              </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
          </li>


        </ul>
      </nav>
    
    </div>
   

  </aside>

  @if (($message = Session::get ('mensaje')) && ($icono = Session::get ('icono')))
  <script>
      Swal.fire({
position: "top-end",
icon: "{{$icono}}",
title: "{{$message}}",
showConfirmButton: false,
timer: 4500
});
  </script>
@endif




  <div class="content-wrapper"> 
    <br>
    <div class="container">
      @yield('content')
    </div>
  </div>
  @stack('scripts')
  
  
  <aside class="control-sidebar control-sidebar-dark">
    
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
 

 
  <footer class="main-footer">
    
    <div class="float-right d-none d-sm-inline">
     
    </div>

    <p xmlns:cc="http://creativecommons.org/ns#" >Esta obra está licenciada bajo <a href="https://creativecommons.org/licenses/by/4.0/?ref=chooser-v1" target="_blank" rel="license noopener noreferrer" style="display:inline-block;">CC BY 4.0<img style="height:22px!important;margin-left:3px;vertical-align:text-bottom;" src="https://mirrors.creativecommons.org/presskit/icons/cc.svg?ref=chooser-v1" alt=""><img style="height:22px!important;margin-left:3px;vertical-align:text-bottom;" src="https://mirrors.creativecommons.org/presskit/icons/by.svg?ref=chooser-v1" alt=""></a></p>
  
    <strong><a href="https://adminlte.io">Basado En AdminLTE, Modificado Para Este Proyecto</a>.</strong>
  </footer>
</div>




<script src="{{url ('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{url ('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url ('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url ('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url ('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{url ('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{url ('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{url ('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{url ('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{url ('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{url ('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{url ('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{url ('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<script src="{{url ('dist/js/adminlte.min.js')}}"></script>
</body>
</html>