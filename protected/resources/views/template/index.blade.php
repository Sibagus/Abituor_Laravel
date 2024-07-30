<html lang="en">



<head>

    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />

    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>Sibag - Abitour</title>

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



<body>

    {{-- <script src="./dist/js/demo-theme.min.js?1684106062"></script> --}}

    <div class="page">

        {{-- Sidebar --}}

        @include('template.navbar');

        <div class="page-wrapper mx-5">

            <!-- Page body -->

            <div class="page-body">

                <div class="container-fluid">

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