@extends('templates.layout')

@section('title','Tambah Jenis Surat')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card border-left-primary h-100">
                <div class="card-header">
                    <h3 class="mb-0 text-gray-800">Tambah Surat</h3>
                </div>
                <div class="card-body">
                    <div class="col-lg-6">

                    @if ($errors->any())

    <div class="alert alert-danger">

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

                        <form method="POST" action="{{url('/dashboard/surat/simpan')}}">
                            <div class="form-group">
                                <label for="" class="text-gray-800">Jenis Surat</label>
                                <select name="id_jenis_surat" class="form-control" id="id_jenis_surat">
                                    <!-- Assuming you have a list of jenis surat -->
                                    @foreach($jenis_surat as $jenis)
                                        <option value="{{ $jenis->id }}">{{ $jenis->jenis_surat}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" class="text-gray-800">Id/User</label>
                                <select name="id_user" class="form-control">
                                    @foreach($id_user as $user)
                                        <option value="{{ $user->id }}">{{ $user->id_user}} / {{ $user->username}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" class="text-gray-800">Tanggal Surat</label>
                                <input type="date" name="tanggal_surat" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="" class="text-gray-800">Nomor Surat</label>
                                <input type="text" name="nomor_surat" class="form-control"  placeholder="Masukkan Nomor Surat">
                            </div>
                            <div class="form-group">
                                <label for="" class="text-gray-800">Ringkasan</label>
                                <textarea name="ringkasan" placeholder="Masukkan Ringkasan" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="" class="text-gray-800">File Surat</label>
                                <input type="file" name="file" class="form-control">
                            </div>
                            @csrf
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