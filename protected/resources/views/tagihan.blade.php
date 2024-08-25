@extends('template.index')



@section('content')

<div class="modal modal-blur fade" id="modal-form" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Tagihan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('tagihan') }}">
                    @csrf
                    <input type="hidden" id="id" name="id">
                    <div class="form-group mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                            value="{{ old('nama') }}">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">NIK</label>
                        <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik"
                            value="{{ old('nik') }}">
                        @error('nik')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Nominal Tagihan</label>
                        <input type="number" class="form-control @error('nominal') is-invalid @enderror" name="nominal"
                            min="0" value="{{ old('nominal') }}">
                        @error('nominal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Informasi</label>
                        <input type="text" class="form-control @error('informasi') is-invalid @enderror"
                            name="informasi" value="{{ old('informasi') }}">
                        @error('informasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>


<div class="modal modal-blur fade" id="modal-hapus" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Peringatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('tagihan-delete') }}">
                    @csrf
                    <input type="hidden" id="id_hapus" name="id">
                    <p>Apakah anda yakin ingin menghapus tahihan ini ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
            </form>
        </div>
    </div>
</div>


<div class="row">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Master Data Tagihan Pembayaran Jamaah</h3>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                </div>
            </div>
        </div>

        <div class="card-body">

            <form method="POST" action="{{url('/tagihan_filter')}}">
                @csrf
                <div class="form-group row">
                    <div class="col-md-2">
                        <input type='date' name="tgl_awal" class="form-control" value="{{$tgl_awal}}">
                    </div>
                    <div class="col-md-2">
                        <input type='date' data-date="" data-date-format="DD MMMM YYYY" name="tgl_akhir"
                            class="form-control" value="{{$tgl_akhir}}">
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn rounded-pill btn-info waves-effect waves-light"
                            value="Filter"><i data-feather="eye"></i> Lihat</button>
                        <button type="button" class="btn rounded-pill btn-success waves-effect waves-light"
                            id="btn-add"><i data-feather="plus"></i> Tagihan</button>
                        <a href="{{url('users/export/' . $tgl_awal . '/' . $tgl_akhir)}}" type="button"
                            class="btn rounded-pill btn-info waves-effect waves-light" value="Filter"><i
                                data-feather="book"></i> Excel</a>
                    </div>
                </div>
            </form>
            <div class="table-responsive">

                <table id="example" class="table table-vcenter card-table table-striped">
                    <thead>
                        <tr>

                            <th>No Id</th>
                            <th>Id Jamaah</th>
                            <th>Nama Lengkap</th>
                            <th>Nominal Tagihan</th>
                            <th>Informasi</th>
                            <th>No Jurnal</th>
                            <th>Tanggal Invoice</th>
                            <th>Tanggal Transaksi</th>
                            <th>Status Pembayaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <!-- <td>{{ $loop->iteration }}</td> -->
                                <td>{{ $item->id_invoice }}</td>
                                <td>{{ $item->nomor_siswa }}</td>

                                <td>{{ $item->nama }}</td>

                                <td>{{ $item->nominal_tagihan }}</td>

                                <td>{{ $item->informasi }}</td>

                                <td>{{ $item->nomor_jurnal_pembukuan }}</td>

                                <td>{{ $item->tanggal_invoice }}</td>

                                <td>{{ $item->waktu_transaksi }}</td>

                                <td>{!! $item->status_pembayaran == 'SUKSES' ? '<span class="badge bg-green-lt">sukses</span>' : '<span class="badge bg-red-lt">belum bayar</span>' !!}
                                </td>
                                <td> @if($item->status_pembayaran != 'SUKSES')
                                    <button class="btn btn-blue btn-sm btn-edit" data-id="{{ $item->id_invoice }}"> <i
                                            data-feather="edit" width="15" height="15"></i> Edit</button>
                                    <button class="btn btn-danger btn-sm btn-hapus"
                                        id="{{ $item->id_invoice }}">Hapus</button>
                                @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@if ($errors->any())

    <script>
        $(document).ready(function () {

            $('#modal-form').modal('show');

        });
    </script>

@endif



<script>
    $('#btn-add').on('click', function (e) {

        e.preventDefault();

        $('input[name="nama"]').val('')

        $('input[name="nik"]').val('')

        $('input[name="nominal"]').val('')

        $('input[name="informasi"]').val('')

        $('#modal-form').modal('show');

    })

    $('.btn-edit').on('click', function (e) {

        e.preventDefault();

        let id = $(this).data('id');

        $.ajax({

            method: "POST",

            url: "/tagihan-ajax",

            data: {

                id,

                _token: '{{ csrf_token() }}'



            },

            success: function (res) {

                $('#id').val(res.id_invoice);

                $('input[name="nama"]').val(res.nama).removeClass('is-invalid');

                $('input[name="nik"]').val(res.nik).removeClass('is-invalid');

                $('input[name="nominal"]').val(res.nominal_tagihan).removeClass('is-invalid');

                $('input[name="informasi"]').val(res.informasi).removeClass('is-invalid');

                $('#modal-form').modal('show');

            }

        })

    })

    $('.btn-hapus').on('click', function (e) {
        e.preventDefault();
        let id = $(this).attr('id');
        $('#id_hapus').val(id);
        $('#modal-hapus').modal('show');

    })
</script>

@endsection