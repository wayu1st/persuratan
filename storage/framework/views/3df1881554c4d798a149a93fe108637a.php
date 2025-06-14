

<?php $__env->startSection('title','Tambah Jenis Surat'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card border-left-primary h-100">
                <div class="card-header">
                    <h3 class="mb-0 text-gray-800">Tambah Surat</h3>
                </div>
                <div class="card-body">
                    <div class="col-lg-6">

                    <?php if($errors->any()): ?>

    <div class="alert alert-danger">

        <ul>

            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <li><?php echo e($error); ?></li>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </ul>

    </div>

<?php endif; ?>

                        <form method="POST" action="<?php echo e(url('/dashboard/surat/simpan')); ?>">
                            <div class="form-group">
                                <label for="" class="text-gray-800">Jenis Surat</label>
                                <select name="id_jenis_surat" class="form-control" id="id_jenis_surat">
                                    <!-- Assuming you have a list of jenis surat -->
                                    <?php $__currentLoopData = $jenis_surat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($jenis->id); ?>"><?php echo e($jenis->jenis_surat); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" class="text-gray-800">Id/User</label>
                                <select name="id_user" class="form-control">
                                    <?php $__currentLoopData = $id_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($user->id); ?>"><?php echo e($user->id_user); ?> / <?php echo e($user->username); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                            <?php echo csrf_field(); ?>
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
<?php echo $__env->make('templates.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\persuratan\resources\views/surat/tambah.blade.php ENDPATH**/ ?>