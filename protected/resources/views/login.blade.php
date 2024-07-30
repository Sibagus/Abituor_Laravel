<html lang="en">



<head>

    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />

    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>Sibag - Abitour Login</title>

    <!-- CSS files -->

    <link href="{{ url('/public/dist/css/tabler.min.css?1684106062') }}" rel="stylesheet" />

    <link href="{{ url('/public/dist/css/demo.min.css?1684106062') }}" rel="stylesheet" />



</head>



<body class=" d-flex flex-column">

    <div class="page page-center">

        <div class="container container-tight py-4">

            <div class="text-center mb-4">

                <!-- <a href="." class="navbar-brand navbar-brand-autodark"><img src="./static/logo.svg" height="36" alt=""></a> -->

            </div>

            <form class="card card-md" action="{{ url('valid-login') }}" method="POST">

                @csrf

                <div class="card-body">

                    <div class="text-center">



                        <h2 class="card-title mb-4">Silahkan Login</h2>

                        <p class="card-subtitle">Sistem Abitour</p>

                    </div>



                    <div class="mb-3">

                        <label class="form-label">Email</label>

                        <input type="email" class="form-control @error('email')

                            is-invalid

                        @enderror" name="email" placeholder="Masukkan Email" value="{{ old('email') }}">

                        @error('email')

                        <div class="invalid-feedback">{{ $message }}</div>

                        @enderror



                    </div>



                    <div class="mb-3">

                        <label class="form-label">Password</label>

                        <input type="password" class="form-control @error('password')

                            is-invalid

                        @enderror" name="password" placeholder="Masukkan Password" autocomplete="off">

                        @error('password')

                        <div class="invalid-feedback">{{ $message }}</div>

                        @enderror

                    </div>



                    <div class="form-footer">

                        <button type="submit" class="btn btn-primary w-100">Login</button>

                    </div>

                </div>

            </form>

        </div>

    </div>

    <!-- Libs JS -->

    <!-- Tabler Core -->

    <script src="{{ url('/public/dist/js/tabler.min.js?1684106062') }}" defer></script>

    <script src="{{ url('/public/dist/js/demo.min.js?1684106062') }}" defer></script>

    <script src="{{ url('/public/dist/js/sweetalert.js') }}"></script>

    @include('sweetalert::alert')



    {{-- <script>

        $('#show-password').on('click', () => {

            var x = $('input[name="password"]');

            if (x.attr('type') === "password") {

                x.attr('type', 'text');

            } else {

                x.attr('type', 'password');

            }

        });

    </script> --}}

</body>



</html>