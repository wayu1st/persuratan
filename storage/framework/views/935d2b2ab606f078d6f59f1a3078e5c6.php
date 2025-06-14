

<?php $__env->startSection('title','Transaksi Surat'); ?>

<?php $__env->startSection('content'); ?>
    <h1 class="h3 mb-50 text-gray-800" style="margin-bottom:30px">Transaksi Surat</h1>
    <div class="row mt-1">
        <div class="col-lg-12">
            <div class="card border-left-primary h-100 ">
                <div class="card-header">
                    <a href="<?php echo e(url('/dashboard/surat/tambah')); ?>"><btn class="btn btn-success">Tambah Surat Baru</btn></a>
                </div>
                <div class="card-body">
                    <?php if($surat->count() < 1): ?>
                        <h1 class="h3 text-gray-800">Belum ada surat dalam sistem</h1>
                    <?php else: ?>
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
                            <?php $__currentLoopData = $surat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $surats): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($no++); ?></td>
                                    <td><?php echo e($surats->jenis_surat); ?></td>
                                    <td><?php echo e($surats->id_user); ?> / <?php echo e($surats->username); ?></td>
                                    <td><?php echo e($surats->tanggal_surat); ?></td>
                                    <td><?php echo e($surats->nomor_surat); ?></td>
                                    <td><?php echo e($surats->ringkasan); ?></td>
                                    <td><?php echo e($surats->file); ?></td>
                                    <td>
                                        <btn class="btn btn-primary">Edit</btn>
                                        <btn class="btn btn-danger">Hapus</btn>
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
<?php echo $__env->make('templates.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\persuratan\resources\views/surat/index.blade.php ENDPATH**/ ?>