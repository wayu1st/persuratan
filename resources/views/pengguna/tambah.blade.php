@extends('templates.layout')

@section('title','Tambah Pengguna')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card border-left-primary h-100">
                <div class="card-header">
                    <h3 class="mb-0 text-gray-800">Tambah Pengguna Baru</h3>
                </div>
                <div class="card-body">
                    <div class="col-lg-6">
                        <form method="POST" action="{{url('/dashboard/manage-pengguna/simpan')}}">
                            <div class="form-group">
                                <label for="" class="text-gray-800">Username</label>
                                <input type="text" name="username" placeholder="Masukkan Username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="" class="text-gray-800">Password</label>
                                <input type="password" name="password" placeholder="Masukkan Password" class="form-control">
                                @csrf
                            </div>
                            <div class="form-group">
                                <label for="" class="text-gray-800">Role</label>
                                <select name="role" class="form-control">
                                    <option value="super admin">Super Admin</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2 col-lg-12">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>&copy; {{ date('Y') }} Wahyu</span>
        </div>
    </div>
@endsection