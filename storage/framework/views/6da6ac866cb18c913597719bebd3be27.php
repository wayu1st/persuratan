

<?php $__env->startSection('title','Tambah Pengguna'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card border-left-primary h-100">
                <div class="card-header">
                    <h3 class="mb-0 text-gray-800">Tambah Pengguna Baru</h3>
                </div>
                <div class="card-body">
                    <div class="col-lg-6">
                        <form method="POST" action="<?php echo e(url('/dashboard/manage-pengguna/simpan')); ?>">
                            <div class="form-group">
                                <label for="" class="text-gray-800">Username</label>
                                <input type="text" name="username" placeholder="Masukkan Username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="" class="text-gray-800">Password</label>
                                <input type="password" name="password" placeholder="Masukkan Password" class="form-control">
                                <?php echo csrf_field(); ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>&copy; <?php echo e(date('Y')); ?> Wahyu</span>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\persuratan\resources\views/pengguna/tambah.blade.php ENDPATH**/ ?>