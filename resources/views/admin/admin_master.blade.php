<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="">
   <meta name="author" content="">
   <link rel="icon" href="{{ asset('backend/images/favicon.ico') }}">

   <title>@yield('title')</title>

   <!-- Vendors Style-->
   <link rel="stylesheet" href="{{ asset('backend/css/vendors_css.css') }}">

   <!-- Style-->
   <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
   <link rel="stylesheet" href="{{ asset('backend/css/skin_color.css') }}">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


</head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">

   <div class="wrapper">

      @include('admin.body.header')

      <!-- Left side column. contains the logo and sidebar -->
      @include('admin.body.sidebar')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
         <div class="container-full">

            <!-- Main content -->
            @yield('admin')
            <!-- /.content -->
         </div>
      </div>
      <!-- /.content-wrapper -->
      @include('admin.body.footer')


      <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>

   </div>
   <!-- ./wrapper -->


   <!-- Vendor JS -->
   <script src="{{ asset('backend/js/vendors.min.js') }}"></script>
   <script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>
   <script src="{{ asset('assets/vendor_components/easypiechart/dist/jquery.easypiechart.js') }}"></script>
   <script src="{{ asset('assets/vendor_components/apexcharts-bundle/irregular-data-series.js') }}"></script>
   <script src="{{ asset('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>

   <!-- Sunny Admin App -->
   <script src="{{ asset('backend/js/template.js') }}"></script>
   <script src="{{ asset('backend/js/pages/dashboard.js') }}"></script>
   <script src="{{ asset('backend/assets/vendor_components/datatable/datatables.min.js') }}"></script>
   <script src="{{ asset('backend/js/pages/data-table.js') }}"></script>
   <script src="{{ asset('backend/assets/icons/feather-icons/feather.min.js') }}"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script>
      $(function() {
         $(document).on('click', '[id^=delete-]', function(e) {
            e.preventDefault();
            var form = $(this).closest('form'); // Get the closest form element

            Swal.fire({
               title: "Are you sure?",
               text: "You won't be able to revert this!",
               icon: "warning",
               showCancelButton: true,
               confirmButtonColor: "#3085d6",
               cancelButtonColor: "#d33",
               confirmButtonText: "Yes, delete it!"
            }).then((result) => {
               if (result.isConfirmed) {
                  form.submit();
               }
            });
         });
      });
   </script>



   <x-toastr />
</body>

</html>
