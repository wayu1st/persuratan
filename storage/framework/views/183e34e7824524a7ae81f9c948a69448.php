

<?php $__env->startSection('title','Kelola Pengguna'); ?>

<?php $__env->startSection('content'); ?>
    <h1 class="h3 mb-50 text-gray-800" style="margin-bottom:30px">Manage Pengguna</h1>
    <div class="row mt-1">
        <div class="col-lg-12">
            <div class="card border-left-primary h-100 ">
                <div class="card-header">
                    <a href="<?php echo e(url('/dashboard/manage-pengguna/tambah')); ?>"><btn class="btn btn-success">Tambah Pengguna Baru</btn></a>
                </div>
                <div class="card-body">
                    <?php if($user->count() < 1): ?>
                        <h1 class="h3 text-gray-800">Belum ada pengguna dalam sistem</h1>
                    <?php else: ?>
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
                            <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pengguna): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($no++); ?></td>
                                    <td><?php echo e($pengguna->username); ?></td>
                                    <td><?php echo e($pengguna->role); ?></td>
                                    <td>
                                        <a href="<?php echo e(url('/dashboard/pengguna/edit/' . $pengguna->id_user)); ?>"><btn class="btn btn-primary">Edit</btn></a>
                                        <btn class="btn btn-danger hpsBtn" attr-id="<?php echo e($pengguna->id_user); ?>">Hapus</btn>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>&copy; <?php echo e(date('Y')); ?> Wahyu</span>
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
<?php $__env->stopSection(); ?>


<?php echo $__env->make('templates.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\persuratan\resources\views/pengguna/index.blade.php ENDPATH**/ ?>