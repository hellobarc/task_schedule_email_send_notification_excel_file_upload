@include('backend.pages.common.header')
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="images/logo1.png" alt="AdminLTELogo" height="60" width="60">
    
  </div>

  <!-- Navbar -->
  @include('backend.pages.common.nav-bar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('backend.pages.common.side-bar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('backend.pages.common.content-header')
    <!-- /.content-header -->

    <!-- Main content -->
    @yield('main-content')
   
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('backend.pages.common.footer')
</div>
<!-- ./wrapper -->
@include('backend.pages.common.scripts')