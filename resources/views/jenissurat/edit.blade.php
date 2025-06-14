@extends('templates.layout')

@section('title','Edit Jenis Surat')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card border-left-primary h-100">
                <div class="card-header">
                    <h3 class="mb-0 text-gray-800">Edit Jenis Surat: <span style="color:#4e73df">{{$jnsSurat->jenis_surat}}</span></h3>
                </div>
                <div class="card-body">
                    <div class="col-lg-6">
                        <form method="POST" action="{{url('/dashboard/jenissurat/simpan')}}">
                            <div class="form-group">
                                <label for="" class="text-gray-800">Nama Jenis Surat</label>
                                <input type="text" name="jenis_surat" placeholder="Masukkan Jenis Surat" class="form-control" value="{{$jnsSurat->jenis_surat}}">
                                <input type="hidden" name="id_jenis_surat" value="{{$jnsSurat->id_jenis_surat}}">
                                @csrf
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