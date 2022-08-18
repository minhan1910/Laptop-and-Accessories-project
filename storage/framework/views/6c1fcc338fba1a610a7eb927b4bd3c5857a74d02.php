<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><?php echo e($name . ' ' . $key); ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#"><?php echo e($name); ?></a></li>
                    <?php if(!empty($key)): ?>
                        <li class="breadcrumb-item active">
                            <?php echo e($key); ?>

                        </li>
                    <?php endif; ?>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<?php /**PATH C:\Users\Admin\OneDrive\Desktop\App\School\test\Laptop-and-Accessories-project\resources\views/partials/content-header.blade.php ENDPATH**/ ?>