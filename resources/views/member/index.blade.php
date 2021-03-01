@extends('layouts.admin')

@section('main-content')
<h1 class="h3 mb-4 text-gray-800">Data Member</h1>
<div class="row">

    <div class="col-lg-12 mb-4">

        <!-- Approach -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Member
                    <a href="{{ route('members.create') }}" class="btn btn-md btn-primary float-right">TAMBAH DATA</a>
                    &nbsp;<a href="{{ route('members.cetak') }}" class="btn btn-md btn-success float-right">CETAK DATA</a>
                </h6>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>NO.</th>
                            <th>NPM</th>
                            <th>NAMA LENGKAP</th>
                            <th>TEMPAT, TANGGAL LAHIR</th>
                            <th>JENIS KELAMIN</th>
                            <th>PRODI</th>
                            <th>AKSI</th>
                        </tr>
                        <?php $no = 1;  ?>
                        @forelse($member as $u)
                        <tr>
                            <td>{{ $no++ }} </td>
                            <td>{{ $u->npm }}</td>
                            <td>{{ $u->user->name.' '. $u->user->last_name}}</td>
                            <td>{{ $u->tempat_lahir.', '.$u->tgl_lahir }}</td>
                            <td>{{ $u->jk == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                            <td>{{ $u->prodi }}</td>
                            <td>
                                <form action="{{ route('members.destroy', $u->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('members.edit', $u->id) }}" class="btn btn-sm btn-warning">EDIT</a>

                                    <input type="submit" class="btn btn-sm btn-danger" value="HAPUS">
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center"> MAAF TIDAK ADA DATA YANG DITAMPILKAN</td>
                        </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection