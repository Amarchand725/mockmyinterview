

<?php $__env->startSection('content'); ?>
<section class="content-header">
	<div class="content-header-left">
		<h1>All Work Process</h1>
	</div>
	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('work-process-create')): ?>
	<div class="content-header-right">
		<a href="<?php echo e(route('work-process.create')); ?>" class="btn btn-primary btn-sm">Add Work Process</a>
	</div>
	<?php endif; ?>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<?php if(session('status')): ?>
				<div class="callout callout-success">
					<?php echo e(session('status')); ?>

				</div>
			<?php endif; ?>

			<div class="box box-info">
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="30">SL</th>
								<th>Title</th>
								<th>Description</th>
								<th>Created by</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr id="id-<?php echo e($model->slug); ?>">
									<td><?php echo e($model->id); ?>.</td>
									<td><?php echo \Illuminate\Support\Str::limit($model->title,40); ?></td>
									<td><?php echo \Illuminate\Support\Str::limit($model->description,60); ?></td>
									<td><?php echo e(isset($model->hasCreatedBy)?$model->hasCreatedBy->name:'N/A'); ?></td>
									<td>
										<?php if($model->status): ?>
											<span class="badge badge-success">Active</span>
										<?php else: ?> 
											<span class="badge badge-danger">In-Active</span>
										<?php endif; ?>
									</td>
									<td>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('work-process-edit')): ?>
											<a href="<?php echo e(route('work-process.edit', $model->slug)); ?>" data-toggle="tooltip" data-placement="top" title="Edit model" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
										<?php endif; ?>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('work-process-delete')): ?>
											<a class="btn btn-danger btn-xs delete-btn" data-toggle="tooltip" data-placement="top" title="Delete model" data-model-slug="<?php echo e($model->slug); ?>"><i class="fa fa-trash"></i> Delete</a>
										<?php endif; ?>
									</td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.delete-btn').on('click', function(){
            var model_slug = $(this).attr('data-model-slug');
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
                        url : "<?php echo e(url('work-process')); ?>/"+model_slug,
						type : 'DELETE',
                        data: {
                                "_token": "<?php echo e(csrf_token()); ?>",
                            },
                        success : function(response){
                            if(response){
                                $('#id-'+model_slug).hide();
                                Swal.fire(
                                    'Deleted!',
                                    'model has been deleted.',
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
<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/admin/work_process/index.blade.php ENDPATH**/ ?>