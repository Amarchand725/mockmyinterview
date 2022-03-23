
<?php $__env->startSection('content'); ?>
<section class="content-header">
	<div class="content-header-left">
		<h1>All Blogs</h1>
	</div>
	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category-create')): ?>
	<div class="content-header-right">
		<a href="<?php echo e(route('blog.create')); ?>" class="btn btn-primary btn-sm">Add blog</a>
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
								<th>SL</th>
								<th>Post</th>
								<th>Category</th>
								<th>Title</th>
								<th>Description</th>
								<th>Status</th>
								<th>Created by</th>
								<th>Created at</th>
								<th width="140">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr id="id-<?php echo e($model->id); ?>">
									<td><?php echo e($model->id); ?>.</td>
									<td>
										<?php if($model->post): ?>
											<img src="<?php echo e(asset('public/admin/assets/posts/'.$model->post)); ?>" alt="" style="width:60px;">
										<?php else: ?> 
											<img src="<?php echo e(asset('public/admin/assets/posts/no-photo1.jpg')); ?>" style="width:60px;">
										<?php endif; ?>
									</td>
									<td><?php echo e(isset($model->hasCategory)?$model->hasCategory->name:'N/A'); ?></td>
									<td><?php echo \Illuminate\Support\Str::limit($model->title,40); ?></td>
									<td><?php echo \Illuminate\Support\Str::limit($model->description,60); ?></td>
									<td>
										<?php if($model->status): ?>
											<span class="badge badge-success">Active</span>
										<?php else: ?> 
											<span class="badge badge-danger">In-Active</span>
										<?php endif; ?>
									</td>
									<td><?php echo e(isset($model->hasCreatedBy)?$model->hasCreatedBy->name:'N/A'); ?></td>
									<td><?php echo e(date('d, F-Y H:i:s A', strtotime($model->created_at))); ?></td>
									<td width="250px">
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('blog-edit')): ?>
											<a href="<?php echo e(route('blog.edit', $model->slug)); ?>" data-toggle="tooltip" data-placement="top" title="Edit post" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
										<?php endif; ?>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('blog-delete')): ?>
											<a class="btn btn-danger btn-xs delete-btn" data-toggle="tooltip" data-placement="top" title="Delete post" data-id="<?php echo e($model->id); ?>"><i class="fa fa-trash"></i> Delete</a>
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
    <script>
        $('.delete-btn').on('click', function(){
            var id = $(this).attr('data-id');
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
                        url : "<?php echo e(url('blog')); ?>/"+id,
                        type : 'DELETE',
                        data: {
                                "_token": "<?php echo e(csrf_token()); ?>",
                            },
                        success : function(response){
                            if(response){
                                $('#id-'+id).hide();
                                Swal.fire(
                                    'Deleted!',
                                    'category has been deleted.',
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
<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/admin/blog/index.blade.php ENDPATH**/ ?>