<?php $__env->startSection('content'); ?>

<h2 class="page-title">
    Dashboard Payment Gateway ABITOUR
</h2><br>

<form method="POST" action="<?php echo e(url('/home')); ?>">
    <?php echo csrf_field(); ?>
    <div class="form-group row">
        <div class="col-md-2">
            <input type='date' name="tgl_awal" class="form-control" value="<?php echo e($tgl_awal); ?>">
        </div>
        <div class="col-md-2">
            <input type='date' data-date="" data-date-format="DD MMMM YYYY" name="tgl_akhir" class="form-control"
                value="<?php echo e($tgl_akhir); ?>">
        </div>
        <div class="col-md-4 ">
            <button type="submit" class="btn rounded-pill btn-success waves-effect waves-light"
                value="Filter">Lihat</button>
        </div>
    </div>
</form>

<div class="row row-cards mt-2">
    <div class="col-sm-6 col-lg-4">
        <div class="card card-sm">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <span class="bg-success text-white avatar">
                            <i data-feather="calendar"></i>
                        </span>
                    </div>
                    <div class="col">
                        <div class="font-weight-medium">
                            <?php if(date('F', strtotime($tgl_awal)) == date('F', strtotime($tgl_akhir))): ?>
                                Total Transaksi Bulan ini (<?php echo e(date('F', strtotime($tgl_akhir))); ?>)
                            <?php else: ?> 
                                Total Transaksi Bulan ini
                                (<?php echo e(date('F', strtotime($tgl_awal)) . "-" . date('F', strtotime($tgl_akhir))); ?>)
                            <?php endif; ?>
                        </div>
                        <div class="text-muted">
                            <b> <?php echo e('Rp.' . number_format($t_bulanini, 2, ",", ".")); ?></b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-4">
        <div class="card card-sm">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <span class="bg-success text-white avatar">
                            <i data-feather="dollar-sign"></i>
                        </span>
                    </div>
                    <div class="col">
                        <div class="font-weight-medium">
                            Total Transaksi Hari ini (<?php echo e(date('d-m-Y', strtotime($tgl_awal))); ?>)
                        </div>
                        <div class="text-muted">
                            <b><?php echo e('Rp.' . number_format($t_hariini, 2, ",", ".")); ?></b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-4">
        <div class="card card-sm">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <span class="bg-twitter text-white avatar">
                            <i data-feather="dollar-sign"></i>
                        </span>
                    </div>
                    <div class="col">
                        <div class="font-weight-medium">
                            Total Transaksi Kemarin (<?php echo e(date('d-m-Y', strtotime($tgl_akhir))); ?>)
                        </div>
                        <div class="text-muted">
                            <b><?php echo e('Rp.' . number_format($t_kemarin, 2, ",", ".")); ?></b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row row-cards mt-2">
    <div class="col-sm-6 col-lg-6">
        <div class="row row-cards mt-2">
            <div class="col-sm-6 col-lg-7">
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
                                    Nominal Belum Terbayar Pertahun
                                </div>
                                <div class="text-muted">
                                    <b> <?php echo e('Rp.' . number_format($nominal_blmbayar, 2, ",", ".")); ?> </b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-5">
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
                                    Status Belum Terbayar pertahun
                                </div>
                                <div class="text-muted">
                                    <b> <?php echo e($status_blmbayar . ' Data id Jamaah'); ?></b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-6">
        <div class="row row-cards mt-2">
            <div class="col-sm-6 col-lg-7">
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
                                    Nominal Sudah Terbayar pertahun
                                </div>
                                <div class="text-muted">
                                    <b> <?php echo e('Rp.' . number_format($nominal_bayar, 2, ",", ".")); ?></b>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-5">
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
                                    Status Sudah Terbayar Pertahun
                                </div>
                                <div class="text-muted">
                                    <b> <?php echo e($status_bayar . ' Data Id Jamaah'); ?></b>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sistemba/public_html/abitour/protected/resources/views/home.blade.php ENDPATH**/ ?>