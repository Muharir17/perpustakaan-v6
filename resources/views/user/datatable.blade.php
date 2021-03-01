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
                    {!! $html->table(['class' => 'table table-bordered table-striped table-hover dataTable']) !!}
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@push('js')
    {!! $html->scripts() !!}
@endpush