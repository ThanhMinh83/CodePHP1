<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NOOB Shop | @yield('title')</title>
  <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('Backend/css/bootstrap.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('Backend/css/app.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('Backend/css/icons.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('Backend/fonts/fontawesome-pro-5.14.0-web/css/all.min.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('Backend/css/admin.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('Backend/dist/css/select2.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('Backend/DataTables/datatables.css') }}">
  <link rel="stylesheet" href="{{ asset ('Frontend/css/sweetalert.css') }}">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  @routes
</head>

<body>
  <!-- Begin page -->
  <div id="wrapper">
    <!-- Topbar Start -->
    @include('backend.share.navbar')
    <!-- end Topbar -->
    <!-- ========== Left Sidebar Start ========== -->
    @include('backend.share.sidebar')
    <!-- Left Sidebar End -->
    <!--========================= -->
    <!-- Start Page Content here -->
    <!-- ========================================== -->
    <div class="content-page">
      <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
          <!-- start page title -->
          @include('backend.share.sub_menu')
          <!-- end page title -->
          @yield('content')
        </div> <!-- end container-fluid -->
      </div>
      <!-- end content -->
      <!-- Footer Start -->
      @include('backend.share.footer')
      <!-- end Footer -->
    </div>
    <!-- =============================== -->
    <!-- End Page content -->
    <!-- ============================== -->
  </div>
  <!-- END wrapper -->

  <!-- Right Sidebar -->
  @include('backend.share.sidebar_right')
  <!-- /Right-bar -->

  <!-- Right bar overlay-->
  <div class="rightbar-overlay"></div>
  <a href="javascript:void(0);" class="right-bar-toggle demos-show-btn">
    <i class="mdi mdi-settings-outline mdi-spin"></i> &nbsp;Choose Demos
  </a>

  <!-- Vendor js -->
  <script src="{{ asset('Backend/js/vendor.min.js') }}"></script>

  <!--C3 Chart-->
  <script src="{{ asset('Backend/libs/d3/d3.min.js') }}"></script>
  <script src="{{ asset('Backend/libs/c3/c3.min.js') }}"></script>

  <script src="{{ asset('Backend/libs/echarts/echarts.min.js') }}"></script>

  <script src="{{ asset('Backend/js/pages/dashboard.init.js') }}"></script>

  <!-- App js -->
  <script src="{{ asset('Backend/js/app.min.js') }}"></script>
  <script src="{{ asset('Backend/js/admin.js') }}"></script>
  <script src="{{ asset('Backend/js/order.js') }}"></script>
  <script src="{{ asset('Backend/DataTables/datatables.js') }}"></script>
  <script src="{{ asset ('Frontend/js/sweetalert.js') }} "></script>
  <!-- jQuery -->
  <script type="text/javascript" src="{{ asset('Backend/js/jquery-3.5.0.min.js') }}"></script>
  {{-- ckedit --}}
  {{-- <script type="text/javascript" src="{{ asset('js/jquery-3.5.0.min.js') }}"></script> --}}
  <script src="{{ asset('Backend/dist/js/select2.min.js') }}"></script>
  <script>
    $('.select2_init').select2({
    'placeholder':'Ch???n Vai Tr??'
  })
  </script>

  {{-- ckeditor --}}
  <script type="text/javascript" src="{{ asset('Backend/libs/ckeditor/ckeditor.js') }}"></script>
  <script>
    CKEDITOR.replace('ckeditor_content');
    CKEDITOR.replace('ckeditor_desc');
    CKEDITOR.replace('ckeditor_keywords');
    CKEDITOR.replace('ckeditor_meta');
  </script> --}}
  
    
</body>

</html>