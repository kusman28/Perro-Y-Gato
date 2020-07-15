
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Perro y Gato</title>
  <link rel="stylesheet" type="text/css" href="/css/app.css">
  <link href="template/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <style>
    .navbar { background-color: #e85f99 !important }
    .main-sidebar { background-color: #790c5a !important }
    * {
        font-family: 'Source Sans Pro';
    }  
    body::-webkit-scrollbar {
    width: 0.4em;
    }

    body::-webkit-scrollbar-track {
    box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
    }

    body::-webkit-scrollbar-thumb {
    background-color: #e85f99;
    outline: 1px solid slategrey;
    }
    
    .sidebar::-webkit-scrollbar {
    width: 0.3em;
    }

    .sidebar::-webkit-scrollbar-track {
    box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
    }

    .sidebar::-webkit-scrollbar-thumb {
    background-color: #e85f99;
    
    outline: 1px solid slategrey;
    }
    </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="nav-icon ion-ios-settings-strong"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> 
    -->
    </ul>
      {{-- <div class="input-group input-group-xs col-md-6">
        <input class="form-control form-control-navbar" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div> --}}

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="template/img/perro.jpg" alt="AdminLTE Logo" class="brand-image img-circle"
           style="opacity: .8">
           <span style="font-size: 18px;" class="brand-text font-weight-bold"><font style="color: #e85f99;">Perro</font> <font style="color: #596e79;">y</font> <font style="color: #dddddd;">Gato</font>
           </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image" style="margin-top: 10px;">
          
            <img src="template/img/user.png" class="img-circle elevation-1" alt="User Image">&nbsp;
        </div>
        <div class="info">
          <a href="#" class="d-block mt-2">
              <span class="badge badge-success">
            {{ Auth::user()->name }} <br>
              </span>
            <span class="badge badge-success">Admin</span>
             </a>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


          <li class="nav-item">
            <a href="/dashboard" class="nav-link">
            <i class="nav-icon ion-ios-speedometer"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon ion-ios-medkit"></i>
              <p>
                Patient 
                <i class="right fas ion-ios-arrow-back mt-1"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/pendingHajj" class="nav-link">
                  <i class="nav-icon ion-ios-personadd"></i>
                  <p>Add Patient</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/pendingUmrah" class="nav-link">
                  <i class="nav-icon ion-ios-people"></i>
                  <p>List of Patient</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/registered" class="nav-link">
              <i class="nav-icon ion-card"></i>
              <p>
                Payment
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon ion-ios-filing"></i>
              <p>
                Inventory
                <i class="right fas ion-ios-arrow-back mt-1"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/hajjDocuments" class="nav-link">
                  <i class="nav-icon ion-ios-plus"></i>
                  <p>Add Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/umrahDocuments" class="nav-link">
                  <i class="nav-icon ion-ios-list"></i>
                  <p>List of Product</p>
                </a>
              </li>
            </ul>
          </li>
            <li class="nav-item">
              <a href="/history" class="nav-link">
                <i class="nav-icon ion-ios-information"></i>
                <p>
                  Record
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/history" class="nav-link">
                <i class="nav-icon ion-ios-help"></i>
                <p>
                  Activity
                </p>
              </a>
              <hr>
            </li>
            <li class="nav-item">
              <a href="/settings" class="nav-link">
                <i class="nav-icon ion-ios-toggle"></i>
                <p>
                  Settings
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              <i class="nav-icon ion-log-out"></i>
              <p>{{ __('Logout') }}</p>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
              </form>
            </li>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <router-view></router-view>
        <vue-progress-bar></vue-progress-bar>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  {{-- <footer class="main-footer">
    <!-- To the right -->
<div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Dental ClinicK Management System &copy; 2019 <a href="https://www.facebook.com/Pinaka.Mahabang.UserName.Sa.Peysbuk">K. Usman</a>.</strong> All rights reserved.
  </footer> --}}
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script src="/js/app.js"></script>
</body>
</html>
