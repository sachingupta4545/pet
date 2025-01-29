<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PET | services</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('build/assets/admin/mdi/css/materialdesignicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('build/assets/admin/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/admin/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/admin/font-awesome/css/font-awesome.min.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('build/assets/admin/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('build/assets/admin/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('build/assets/admin/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('build/assets/images/favicon.png')}}" />
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles        

  </head>
  <body>



    
    <div class="main-wrapper">
      @include('layouts.nav_admin')
      <div class="content-wrapper">
        <x-flash-messages/>
        {{ $slot }}
      </div>
    </div>
    



  <script src="{{ asset('build/assets/admin/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('build/assets/admin/chart.js/chart.umd.js')}}"></script>
    <script src="{{ asset('build/assets/admin/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('build/assets/admin/asset/js/off-canvas.js')}}"></script>
    <script src="{{ asset('build/assets/admin/asset/js/misc.js')}}"></script>
    <script src="{{ asset('build/assets/admin/asset/js/settings.js')}}"></script>
    <script src="{{ asset('build/assets/admin/asset/js/todolist.js')}}"></script>
    <script src="{{ asset('build/assets/admin/asset/js/jquery.cookie.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    {{-- <script src="{{ asset('assets/admin/asset/js/dashboard.js')}}"></script> --}}
    <!-- End custom js for this page -->

    @stack('scripts')
  </body>
</html>