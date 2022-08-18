<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title><?php echo $__env->yieldContent('title'); ?></title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo e(asset('admintle/plugins/fontawesome-free/css/all.min.css')); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('admintle/dist/css/adminlte.min.css')); ?>">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <?php echo $__env->yieldContent('css'); ?>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        
        <?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        
        <?php echo $__env->make('partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        
        <?php echo $__env->yieldContent('content'); ?>

        <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="<?php echo e(asset('admintle/plugins/jquery/jquery.min.js')); ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo e(asset('admintle/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo e(asset('admintle/dist/js/adminlte.min.js')); ?>"></script>
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php echo $__env->yieldContent('js'); ?>
</body>

</html>
<?php /**PATH C:\Users\Admin\OneDrive\Desktop\App\School\test\Laptop-and-Accessories-project\resources\views/layouts/admin.blade.php ENDPATH**/ ?>