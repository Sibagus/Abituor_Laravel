<?php $__env->startSection('content'); ?>

<h2 class="page-title">
    Selamat Datang
</h2>

<div class="row row-cards mt-2">
    <div class="col-sm-6 col-lg-2">
        <div class="card card-sm">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <span class="bg-primary text-white avatar">
                            <i data-feather="archive"></i>
                        </span>
                    </div>
                    <div class="col">
                        <div class="font-weight-medium">
                            Jumlah Data
                        </div>
                        <div class="text-muted">
                            <?php echo e($jml_data . ' Data'); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-2">
        <div class="card card-sm">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <span class="bg-warning text-white avatar">
                            <i data-feather="dollar-sign"></i>
                        </span>
                    </div>
                    <div class="col">
                        <div class="font-weight-medium">
                            Nominal Belum Bayar
                        </div>
                        <div class="text-muted">
                            <?php echo e('Rp.' . number_format($nominal_blmbayar, 2, ",", ".")); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-2">
        <div class="card card-sm">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <span class="bg-twitter text-white avatar">
                            <i data-feather="info"></i>
                        </span>
                    </div>
                    <div class="col">
                        <div class="font-weight-medium">
                            Status Belum Bayar
                        </div>
                        <div class="text-muted">
                            <?php echo e($status_blmbayar . ' Data'); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-2">
        <div class="card card-sm">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <span class="bg-green text-white avatar">
                            <i data-feather="dollar-sign"></i>
                        </span>
                    </div>
                    <div class="col">
                        <div class="font-weight-medium">
                            Nominal Sudah Bayar
                        </div>
                        <div class="text-muted">
                            <?php echo e('Rp.' . number_format($nominal_bayar, 2, ",", ".")); ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-2">
        <div class="card card-sm">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <span class="bg-facebook text-white avatar">
                            <i data-feather="info"></i>
                        </span>
                    </div>
                    <div class="col">
                        <div class="font-weight-medium">
                            Status Sudah Bayar
                        </div>
                        <div class="text-muted">
                            <?php echo e($status_bayar . ' Data'); ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sistemba/public_html/abitour/protected/resources/views/home.blade.php ENDPATH**/ ?>