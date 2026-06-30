@extends('admin.layouts.master')
@section('title', 'Tambah Roles')

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tambah Data Roles</h3>
                <p class="text-subtitle text-muted">Silahkan isi data roles yang ingin ditambahkan.</p>
            </div>
        </div>
    </div>

<div class="card">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="form" action="{{ route('roles.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Nama Role</label>
                                    <input type="text" class="form-control" id="name" placeholder="Masukan nama menu" name="role_name" required>
                                </div>

                                <div class="form-group">
                                    <label for="description">Deskripsi</label>
                                    <textarea type="text" class="form-control" id="description" placeholder="Masukan deskripsi menu" name="description" required></textarea>
                                </div>

                                <div class="form-group d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    <a href="{{ route('roles.index') }}" type="submit" class="btn btn-warning me-1 mb-1">Batal</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
@endsection