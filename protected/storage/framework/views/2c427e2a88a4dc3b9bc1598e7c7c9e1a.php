<html lang="en">



<head>

    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />

    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>Sibag - Abitour Login</title>

    <!-- CSS files -->

    <link href="<?php echo e(url('/public/dist/css/tabler.min.css?1684106062')); ?>" rel="stylesheet" />

    <link href="<?php echo e(url('/public/dist/css/demo.min.css?1684106062')); ?>" rel="stylesheet" />



</head>



<body class=" d-flex flex-column">

    <div class="page page-center">

        <div class="container container-tight py-4">

            <div class="text-center mb-4">

                <!-- <a href="." class="navbar-brand navbar-brand-autodark"><img src="./static/logo.svg" height="36" alt=""></a> -->

            </div>

            <form class="card card-md" action="<?php echo e(url('valid-login')); ?>" method="POST">

                <?php echo csrf_field(); ?>

                <div class="card-body">

                    <div class="text-center">



                        <h2 class="card-title mb-4">Silahkan Login</h2>

                        <p class="card-subtitle">Sistem Abitour</p>

                    </div>



                    <div class="mb-3">

                        <label class="form-label">Email</label>

                        <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                            is-invalid

                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" placeholder="Masukkan Email" value="<?php echo e(old('email')); ?>">

                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                        <div class="invalid-feedback"><?php echo e($message); ?></div>

                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>



                    </div>



                    <div class="mb-3">

                        <label class="form-label">Password</label>

                        <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                            is-invalid

                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" placeholder="Masukkan Password" autocomplete="off">

                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                        <div class="invalid-feedback"><?php echo e($message); ?></div>

                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    </div>



                    <div class="form-footer">

                        <button type="submit" class="btn btn-primary w-100">Login</button>

                    </div>

                </div>

            </form>

        </div>

    </div>

    <!-- Libs JS -->

    <!-- Tabler Core -->

    <script src="<?php echo e(url('/public/dist/js/tabler.min.js?1684106062')); ?>" defer></script>

    <script src="<?php echo e(url('/public/dist/js/demo.min.js?1684106062')); ?>" defer></script>

    <script src="<?php echo e(url('/public/dist/js/sweetalert.js')); ?>"></script>

    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



    

</body>



</html><?php /**PATH /home/sistemba/public_html/abitour/protected/resources/views/login.blade.php ENDPATH**/ ?>