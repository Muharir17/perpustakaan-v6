@extends('layouts.admin')

@section('main-content')
<h1 class="h3 mb-4 text-gray-800">Data Member</h1>
<div class="row">

    <div class="col-lg-12 mb-4">

        <!-- Approach -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">TAMBAH DATA MEMBER</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('members.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="user_id" class="mb-1">User</label>
                        <select name="user_id" id="user_id" class="form-control">
                            <option value="" selected disabled>---Pilih User---</option>
                            @foreach($user as $pengguna)
                            <option value="{{ $pengguna->id }}">{{ $pengguna->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="npm" class="mb-1">NPM</label>
                        <input type="number" class="form-control py-4" name="npm" value="{{ old('npm') }}" placeholder="Masukkan NPM" require>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <label for="tempat_lahir" class="col-md-2">Tempat Lahir</label>
                            <input type="text" class="form-control col-md-4" name="tempat_lahir" value="{{ old('tempat_lahir') }}" placeholder="Masukkan Tempat Lahir" require>

                            <label for="tempat_lahir" class="col-md-2">Tanggal Lahir</label>
                            <input type="date" class="form-control col-md-4" name="tgl_lahir" value="{{ old('tgl_lahir') }}" placeholder="Masukkan Tanggal Lahir" require>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <label for="jk" class="col-md-2">Jenis Kelamin</label>
                            <input type="radio" name="jk" value="L" class="col-md-1">Laki-Laki
                            <input type="radio" name="jk" value="P" class="col-md-1">Perempuan
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="prodi" class="mb-1">Prodi</label>
                        <select name="prodi" id="prodi" class="form-control">
                            <option value="" selected disabled>---PILIH PRODI---</option>
                            <option value="Sistem Informasi"> SISTEM INFORMASI </option>
                            <option value="Teknik Informatika"> TEKNIK INFORMATIKA </option>
                            <option value="Bimbingan Konseling"> BIMBINGAN KONSELING </option>
                        </select>
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