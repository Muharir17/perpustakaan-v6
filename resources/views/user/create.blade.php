@extends('layouts.admin')

@section('main-content')
<h1 class="h3 mb-4 text-gray-800">Data User</h1>
<div class="row">

    <div class="col-lg-12 mb-4">

        <!-- Approach -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">TAMBAH DATA USER</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name" class="mb-1">Nama Depan</label>
                        <input type="text" class="form-control py-4" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama" require autofocus>
                    </div>
                    <div class="form-group">
                        <label for="last_name" class="mb-1">Nama Belakang</label>
                        <input type="text" class="form-control py-4" name="last_name" value="{{ old('last_name') }}" placeholder="Masukkan Belakang" require autofocus>
                    </div>
                    <div class="form-group">
                        <label for="email" class="mb-1">Email</label>
                        <input type="email" class="form-control py-4" name="email" value="{{ old('email') }}" placeholder="Masukkan Email" require autofocus>
                    </div>
                    <div class="form-group">
                        <label for="password" class="mb-1">Password</label>
                        <input type="password" class="form-control py-4" name="password" value="{{ old('password') }}" placeholder="Masukkan Password" require autofocus>
                    </div>

                    <div class="form-group d-flex align-items-center mt-4 mb-0">
                        <button type="submit" class="btn btn-primary">SIMPAN</button> &nbsp;
                        <a href="{{ route('users.index') }}" class="btn btn-danger">BATAL</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

@endsection