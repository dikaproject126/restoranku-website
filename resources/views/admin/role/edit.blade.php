@extends('admin.layouts.master')
@section('title', 'Edit Role')

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Data Role</h3>
                <p class="text-subtitle text-muted">Silahkan isi data role yang ingin diedit.</p>
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

                <form class="form" action="{{ route('roles.update', $role->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Nama Role</label>
                                    <input type="text" class="form-control" id="name" placeholder="Masukan nama menu" name="role_name" required value="{{ $role->role_name }}">
                                </div>

                                <div class="form-group">
                                    <label for="description">Deskripsi</label>
                                    <textarea type="text" class="form-control" id="description" placeholder="Masukan deskripsi menu" name="description" required>{{ $role->description }}</textarea>
                                </div>

                                <div class="form-group d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Edit</button>
                                    <a href="{{ route('roles.index') }}" class="btn btn-warning me-1 mb-1">Batal</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>

@endsection