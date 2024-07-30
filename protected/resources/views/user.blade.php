@extends('template.index')
@section('content')

<div class="modal modal-blur fade" id="modal-form" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form method="POST" action="{{ url('user') }}">
                    @csrf
                    <input type="hidden" id="id" name="id">

                    <div class="form-group mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}">
                        @error('password')
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
                <form method="POST" action="{{ url('user-delete') }}">
                    @csrf
                    <input type="hidden" id="id_hapus" name="id">
                    <p>Apakah anda yakin ingin menghapus ?</p>
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
            <h3 class="card-title">Tabel Data User</h3>
            <div class="col-auto ms-auto d-print-none">

                <div class="btn-list">
                    <button type="button" class="btn btn-info d-none d-sm-inline-block" id="btn-add">
                        <i data-feather="plus"></i>Tambah User
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-vcenter card-table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>
                                <button class="btn btn-primary btn-sm btn-reset" id="{{ $row->id }}" data-name="{{ $row->name }}" data-email="{{ $row->email }}">Reset</button>
                                <button class="btn btn-danger btn-sm btn-hapus" id="{{ $row->id }}">Hapus</button>
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
    $(document).ready(function() {
        $('#modal-form').modal('show');
    });
</script>
@endif

<script>
    $('#btn-add').on('click', function(e) {
        e.preventDefault();
        $('input[name="name"]').removeAttr('readonly');
        $('input[name="email"]').removeAttr('readonly');

        $('input[name="name"]').val('')
        $('input[name="email"]').val('')

        $('#modal-form').modal('show');
    });

    $('.btn-reset').on('click', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        let name = $(this).data('name');
        let email = $(this).data('email');
        let name_val = $('input[name="name"]')
        let email_val = $('input[name="email"]')

        name_val.attr('readonly', 'readonly');
        email_val.attr('readonly', 'readonly');

        name_val.val(name);
        email_val.val(email);
        $('#id').val(id);

        console.log(id);
        $('#modal-form').modal('show');
    })

    $('.btn-hapus').on('click', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        $('#id_hapus').val(id);
        $('#modal-hapus').modal('show');

    })
</script>

@endsection