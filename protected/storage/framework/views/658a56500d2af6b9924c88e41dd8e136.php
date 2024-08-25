<html lang="en">

<head>

    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />

    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>Dashboard - Payment Abitour And Traver.</title>

    <!-- CSS files -->

    <link href="<?php echo e(url('/public/dist/css/tabler.min.css?1684106062')); ?>" rel="stylesheet" />

    <link href="<?php echo e(url('/public/dist/css/demo.min.css?1684106062')); ?>" rel="stylesheet" />



    <script src="<?php echo e(url('/public/dist/js/jquery.min.js')); ?>"></script>



    <script src="<?php echo e(url('/public/dist/libs/datatable/jquery.dataTables.min.js')); ?>"></script>

    <script src="<?php echo e(url('/public/dist/libs/datatable/dataTables.bootstrap4.min.js')); ?>"></script>

    <script>
        $(document).ready(function() {

            $('#example').DataTable();



        });
    </script>
</head>





<body class=" layout-fluid">
    

        <?php echo $__env->make('template.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      <!-- Page body -->
      <div class="page-wrapper">
        <!-- Page header -->
        
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
          <?php echo $__env->yieldContent('content'); ?>
        
        </div>
    </div>
      


            <?php echo $__env->make('template.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>
    </div>


    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Tabler Core -->

    <script src="<?php echo e(url('/public/dist/js/tabler.min.js?1684106062')); ?>" defer></script>

    <script src="<?php echo e(url('/public/dist/js/demo.min.js?1684106062')); ?>" defer></script>

    <script src="<?php echo e(url('/public/dist/js/feather.min.js')); ?>"></script>

    <script>
        feather.replace();
    </script>

</body>



</html><?php /**PATH /home/sistemba/public_html/abitour/protected/resources/views/template/index.blade.php ENDPATH**/ ?>