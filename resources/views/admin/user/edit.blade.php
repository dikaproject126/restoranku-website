@extends('admin.layouts.master')
@section('title', 'Edit Karyawan')

@section('content')
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit Data Karyawan</h3>
                    <p class="text-subtitle text-muted">Silahkan isi data karyawan yang ingin diedit.</p>
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
                <form class="form" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Nama Karyawan</label>
                                    <input type="text" class="form-control" id="name" placeholder="Masukan Nama Karyawan" name="fullname" value="{{ $user->fullname }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" placeholder="Masukan Username"  name="username" value="{{ $user->username }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="phone">Nomer Telepon</label>
                                    <input type="number" class="form-control" id="phone" placeholder="Masukan Nomer Telepon" name="phone" value="{{ $user->phone }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select class="form-control" name="role_id" id="role" required>
                                        <option value="" disabled selected>Pilih Role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>{{ $role->role_name }} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Masukan Email" name="email" value="{{ $user->email }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="Masukan Password" name="password" required>
                                    {{-- <small><a href="#" class="toggle-password" data-target="password">Lihat Password</a></small> --}}
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation">Konfirmasi Password</label>
                                    <input type="password" class="form-control" id="password_confirmation" placeholder="Masukan Password Konfirmasi" name="password_confirmation" required>
                                    {{-- <small><a href="#" class="toggle-password" data-target="password_confirmation">Lihat Password</a></small> --}}
                                </div>

                                <div class="form-group d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    <a href="{{ route('users.index') }}" type="submit" class="btn btn-warning me-1 mb-1">Batal</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection