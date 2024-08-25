<html lang="en">

<head>

    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />

    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>Dashboard - Payment Abitour And Traver.</title>

    <!-- CSS files -->

    <link href="{{ url('/public/dist/css/tabler.min.css?1684106062') }}" rel="stylesheet" />

    <link href="{{ url('/public/dist/css/demo.min.css?1684106062') }}" rel="stylesheet" />



    <script src="{{ url('/public/dist/js/jquery.min.js') }}"></script>



    <script src="{{ url('/public/dist/libs/datatable/jquery.dataTables.min.js') }}"></script>

    <script src="{{ url('/public/dist/libs/datatable/dataTables.bootstrap4.min.js') }}"></script>

    <script>
        $(document).ready(function() {

            $('#example').DataTable();



        });
    </script>
</head>





<body class=" layout-fluid">
    {{-- <script src="./dist/js/demo-theme.min.js?1684106062"></script> --}}

        @include('template.navbar')

      <!-- Page body -->
      <div class="page-wrapper">
        <!-- Page header -->
        
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
          @yield('content')
        
        </div>
    </div>
      


            @include('template.footer')

        </div>
    </div>


    @include('sweetalert::alert')

    <!-- Tabler Core -->

    <script src="{{ url('/public/dist/js/tabler.min.js?1684106062') }}" defer></script>

    <script src="{{ url('/public/dist/js/demo.min.js?1684106062') }}" defer></script>

    <script src="{{ url('/public/dist/js/feather.min.js') }}"></script>

    <script>
        feather.replace();
    </script>

</body>



</html>