@extends('templates.layout')

@section('title', 'Jenis Surat')

@section('content')
<h1 class="h3 mb-50 text-gray-800" style="margin-bottom:30px">Manage Jenis Surat</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="card border-left-primary h-100">
                <div class="card-header">
                    <a href="{{url('/dashboard/jenissurat/tambah')}}"><btn class="btn btn-success">Tambah Jenis Surat</btn></a>
                </div>
                <div class="card-body">
                    @if($jenis_surat->count() < 1)
                        <h1 class="h3 text-gray-800">Belum ada surat dalam sistem</h1>
                    @else
                    <table class="table table-hovered table-bordered">
                        <thead>
                            <tr class="card-header">
                                <th class="m-0 font-weight-bold text-primary">No</th>
                                <th class="m-0 font-weight-bold text-primary">Jenis Surat</th>
                                <th class="m-0 font-weight-bold text-primary">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                            ?>
                            @foreach($jenis_surat as $js)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$js->jenis_surat}}</td>
                                    <td>
                                        <a href="{{url('/dashboard/jenissurat/edit/' . $js->id_jenis_surat)}}"><btn class="btn btn-primary">Edit</btn></a>
                                        <btn class="btn btn-danger hpsBtn" attr-id="{{$js->id_jenis_surat}}">Hapus</btn>
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
    <script type="module">
        $('.table tbody').on('click','.hpsBtn',function(event){
            event.preventDefault();
            event.stopImmediatePropagation();
            let idJnsSurat = $(this).closest('.hpsBtn').attr('attr-id');
            // alert(idJnsSurat);
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
                    axios.post('/dashboard/jenissurat/hapus',{
                        'id_jenis_surat': idJnsSurat
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