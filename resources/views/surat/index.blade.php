@extends('templates.layout')

@section('title','Transaksi Surat')

@section('content')
    <h1 class="h3 mb-50 text-gray-800" style="margin-bottom:30px">Transaksi Surat</h1>
    <div class="row mt-1">
        <div class="col-lg-12">
            <div class="card border-left-primary h-100 ">
                <div class="card-header">
                    <a href="{{url('/dashboard/surat/tambah')}}"><btn class="btn btn-success">Tambah Surat Baru</btn></a>
                </div>
                <div class="card-body">
                    @if($surat->count() < 1)
                        <h1 class="h3 text-gray-800">Belum ada surat dalam sistem</h1>
                    @else
                    <table class="table table-hovered table-bordered">
                        <thead>
                            <tr class="card-header">
                                <th class="m-0 font-weight-bold text-primary">No</th>
                                <th class="m-0 font-weight-bold text-primary">Jenis Surat</th>
                                <th class="m-0 font-weight-bold text-primary">Id/User</th>
                                <th class="m-0 font-weight-bold text-primary">Tanggal Surat</th>
                                <th class="m-0 font-weight-bold text-primary">Nomor Surat</th>
                                <th class="m-0 font-weight-bold text-primary">Ringkasan</th>
                                <th class="m-0 font-weight-bold text-primary">File</th>
                                <th class="m-0 font-weight-bold text-primary">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                            ?>
                            @foreach($surat as $surats)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$surats->jenis_surat}}</td>
                                    <td>{{$surats->id_user}} / {{$surats->username}}</td>
                                    <td>{{$surats->tanggal_surat}}</td>
                                    <td>{{$surats->nomor_surat}}</td>
                                    <td>{{$surats->ringkasan}}</td>
                                    <td>{{$surats->file}}</td>
                                    <td>
                                        <btn class="btn btn-primary">Edit</btn>
                                        <btn class="btn btn-danger">Hapus</btn>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection