<?php $__env->startSection('title'); ?>
    Trang chủ
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <?php echo $__env->make('partials.content-header', ['name' => 'Users', 'key' => 'List'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <?php if(session('msg') && session('type')): ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-<?php echo e(session('type')); ?>"><?php echo e(session('msg')); ?></div>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo e(route('admin.users.create')); ?>" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Fullname</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty('usersList')): ?>
                                    <?php $__currentLoopData = $usersList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($user->id); ?></td>
                                            <td width="15%"><?php echo e($user->name); ?></td>
                                            <td><?php echo e($user->email); ?></td>
                                            <td>
                                                <?php echo e($user->street); ?>, ward <?php echo e($user->ward); ?>, district
                                                <?php echo e($user->district); ?>

                                            </td>
                                            <td>
                                                <div class="alert alert-info d-flex justify-content-center">
                                                    <?php echo e($user->role->name); ?></div>
                                            </td>
                                            <td><?php echo e($user->created_at); ?></td>
                                            <td width="15%">
                                                <a href="<?php echo e(route('admin.users.edit', ['id' => $user->id])); ?>"
                                                    class="btn btn-default">Edit</a>
                                                <a href="<?php echo e(route('admin.users.delete', ['id' => $user->id])); ?>"
                                                    class="btn btn-danger delete-btn delete-confirm">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <?php echo e($usersList->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script>
        document.querySelector('.delete-confirm').addEventListener('click', function archiveFunction(event) {
            event.preventDefault(); // prevent form submit
            const url = $(this).attr('href');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                    Swal.fire(
                        'Deleted!',
                        'Your user has been deleted.',
                        'success'
                    )
                }
            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\OneDrive\Desktop\App\School\test\Laptop-and-Accessories-project\resources\views/admin/user/index.blade.php ENDPATH**/ ?>