@extends('layouts.admin')

@section('main-content')
<h1 class="h3 mb-4 text-gray-800">Data User</h1>
<div class="row">

    <div class="col-lg-12 mb-4">

        <!-- Approach -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DATA USER
                    <a href="{{ route('users.create') }}" class="btn btn-md btn-primary float-right">TAMBAH DATA</a>
                </h6>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>NO.</th>
                            <th>NAMA LENGKAP</th>
                            <th>EMAIL</th>
                            <th>TGL. DIBUAT</th>
                            <th>AKSI</th>
                        </tr>
                        <?php $no = 1;  ?>
                        @forelse($user as $u)
                        <tr>
                            <td>{{ $no++ }} </td>
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td>{{ $u->created_at }}</td>
                            <td>
                                <form action="{{ route('users.destroy', $u->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('users.edit', $u->id) }}" class="btn btn-sm btn-warning">EDIT</a>
                                    
                                    <input type="submit" class="btn btn-sm btn-danger" value="HAPUS">
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center"> MAAF TIDAK ADA DATA YANG DITAMPILKAN</td>
                        </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection