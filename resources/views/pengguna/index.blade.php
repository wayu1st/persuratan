@extends('templates.layout')

@section('title','Kelola Pengguna')

@section('content')
    <h1 class="h3 mb-50 text-gray-800" style="margin-bottom:30px">Manage Pengguna</h1>
    <div class="row mt-1">
        <div class="col-lg-12">
            <div class="card border-left-primary h-100 ">
                <div class="card-header">
                    <a href="{{url('/dashboard/manage-pengguna/tambah')}}"><btn class="btn btn-success">Tambah Pengguna Baru</btn></a>
                </div>
                <div class="card-body">
                    @if($user->count() < 1)
                        <h1 class="h3 text-gray-800">Belum ada pengguna dalam sistem</h1>
                    @else
                    <table class="table table-hovered table-bordered">
                        <thead>
                            <tr class="card-header">
                                <th class="m-0 font-weight-bold text-primary">No</th>
                                <th class="m-0 font-weight-bold text-primary">Username</th>
                                <th class="m-0 font-weight-bold text-primary">Role</th>
                                <th class="m-0 font-weight-bold text-primary">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                            ?>
                            @foreach($user as $pengguna)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$pengguna->username}}</td>
                                    <td>{{$pengguna->role}}</td>
                                    <td>
                                        <a href="{{url('/dashboard/pengguna/edit/' . $pengguna->id_user)}}"><btn class="btn btn-primary">Edit</btn></a>
                                        <btn class="btn btn-danger hpsBtn" attr-id="{{$pengguna->id_user}}">Hapus</btn>
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

@section('footer')
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>&copy; {{ date('Y') }} Wahyu</span>
        </div>
    </div>
    <script type="module">
        $('.table tbody').on('click','.hpsBtn',function(event){
            event.preventDefault();
            event.stopImmediatePropagation();
            let idUser = $(this).closest('.hpsBtn').attr('attr-id');
            // alert(idUser);
            Swal.fire({
                title : "Apakah anda ingin menghapus data ini?",
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
                confirmButtonColor: 'red'
            }).then((result)=> {
                // console.log($pesan);
                if(result.isConfirmed){
                    //jalankan ajax post utk hapus
                    axios.post('/dashboard/pengguna/hapus',{
                        'id_user': idUser
                    }).then(function(response){
                        console.log(response);
                        if(response.data.status){
                            Swal.fire({
                            title: "Berhasil!",
                            text: response.data.pesan,
                            icon: "success"
                            }).then(()=>{
                                window.location.reload();
                            });
                        }else{
                            alert(response.data.pesan);
                        }
                    }).catch(function(error){
                            Swal.fire({
                            title: "Oppsss...",
                            text: "Data Gagal Dihapus",
                            icon: "error"
                            })

                    });
                }else{
                    //close module pop-up
                }
            }).catch(function(error){
                Swal.fire({
                title: "Oppsss...",
                text: "Data Gagal Dihapus",
                icon: "error"
                })
            });
        });
    </script>
@endsection

