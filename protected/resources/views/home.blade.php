@extends('template.index')

@section('content')

<h2 class="page-title">
    Selamat Datang
</h2>

<div class="row row-cards mt-2">
    <div class="col-sm-6 col-lg-2">
        <div class="card card-sm">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <span class="bg-primary text-white avatar">
                            <i data-feather="archive"></i>
                        </span>
                    </div>
                    <div class="col">
                        <div class="font-weight-medium">
                            Jumlah Data
                        </div>
                        <div class="text-muted">
                            {{ $jml_data . ' Data' }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-2">
        <div class="card card-sm">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <span class="bg-warning text-white avatar">
                            <i data-feather="dollar-sign"></i>
                        </span>
                    </div>
                    <div class="col">
                        <div class="font-weight-medium">
                            Nominal Belum Bayar
                        </div>
                        <div class="text-muted">
                            {{ 'Rp.' . number_format($nominal_blmbayar, 2, ",", ".") }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-2">
        <div class="card card-sm">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <span class="bg-twitter text-white avatar">
                            <i data-feather="info"></i>
                        </span>
                    </div>
                    <div class="col">
                        <div class="font-weight-medium">
                            Status Belum Bayar
                        </div>
                        <div class="text-muted">
                            {{ $status_blmbayar . ' Data' }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-2">
        <div class="card card-sm">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <span class="bg-green text-white avatar">
                            <i data-feather="dollar-sign"></i>
                        </span>
                    </div>
                    <div class="col">
                        <div class="font-weight-medium">
                            Nominal Sudah Bayar
                        </div>
                        <div class="text-muted">
                            {{ 'Rp.' . number_format($nominal_bayar, 2, ",", ".") }}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-2">
        <div class="card card-sm">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <span class="bg-facebook text-white avatar">
                            <i data-feather="info"></i>
                        </span>
                    </div>
                    <div class="col">
                        <div class="font-weight-medium">
                            Status Sudah Bayar
                        </div>
                        <div class="text-muted">
                            {{ $status_bayar . ' Data' }}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection