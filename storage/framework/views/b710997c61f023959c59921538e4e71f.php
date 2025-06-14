

<?php $__env->startSection('title','Edit Jenis Surat'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card border-left-primary h-100">
                <div class="card-header">
                    <h3 class="mb-0 text-gray-800">Edit Jenis Surat: <span style="color:#4e73df"><?php echo e($jnsSurat->jenis_surat); ?></span></h3>
                </div>
                <div class="card-body">
                    <div class="col-lg-6">
                        <form method="POST" action="<?php echo e(url('/dashboard/jenissurat/simpan')); ?>">
                            <div class="form-group">
                                <label for="" class="text-gray-800">Nama Jenis Surat</label>
                                <input type="text" name="jenis_surat" placeholder="Masukkan Jenis Surat" class="form-control" value="<?php echo e($jnsSurat->jenis_surat); ?>">
                                <input type="hidden" name="id_jenis_surat" value="<?php echo e($jnsSurat->id_jenis_surat); ?>">
                                <?php echo csrf_field(); ?>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2 col-lg-12">Simpan</button>
                        </form>
                    </div>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\persuratan\resources\views/jenissurat/edit.blade.php ENDPATH**/ ?>