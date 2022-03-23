
<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <div class="content-header-left">
            <h1>All Roles</h1>
        </div>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-create')): ?>
        <div class="content-header-right">
            <a href="<?php echo e(route('role.create')); ?>" class="btn btn-primary btn-sm">Add New Role</a>
        </div>
        <?php endif; ?>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <?php if(session('success')): ?>
                    <div class="callout callout-success">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>

                <div class="box box-info">
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $counter = 1; ?> 
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr id="id-<?php echo e($role->id); ?>">
                                        <td><?php echo e($counter++); ?>.</td>
                                        <td><?php echo e($role->name); ?></td>
                                        <td><?php echo $role->description; ?></td>
                                        <td>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-edit')): ?>
                                                <a class="btn btn-primary btn-xs" href="<?php echo e(route('role.edit', $role->id)); ?>"><i class="fa fa-edit"></i> Edit</a>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-delete')): ?>
                                                <button class="btn btn-danger btn-xs delete" data-role-id="<?php echo e($role->id); ?>"><i class="fa fa-trash"></i> Delete</button>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.delete').on('click', function(){
            var role_id = $(this).attr('data-role-id');
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
                    $.ajax({
                        url : "<?php echo e(url('role')); ?>/"+role_id,
                        type : 'DELETE',
                        data: {
                                "_token": "<?php echo e(csrf_token()); ?>",
                            },
                        success : function(response){
                            if(response){
                                $('#id-'+role_id).hide();
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                ) 
                            }else{
                                Swal.fire(
                                    'Not Deleted!',
                                    'Sorry! Something went wrong.',
                                    'danger'
                                ) 
                            }
                        }
                    });
                }
            })
        });
        $(document).ready(function() {
            $("#example1").DataTable();
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/admin/role/index.blade.php ENDPATH**/ ?>