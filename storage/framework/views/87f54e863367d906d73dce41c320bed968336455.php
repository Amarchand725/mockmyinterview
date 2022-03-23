
<?php $__env->startSection('content'); ?>
<section class="content-header">
	<div class="content-header-left">
		<h1>All Sliders</h1>
	</div>
	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('slider-create')): ?>
	<div class="content-header-right">
		<a href="<?php echo e(route('slider.create')); ?>" class="btn btn-primary btn-sm">Add Slider</a>
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
								<th>Image</th>
								<th>Created by</th>
								<th>Title</th>
								<th>Description</th>
								<th>Status</th>
								<th width="140">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr id="id-<?php echo e($slider->id); ?>">
									<td><?php echo e($slider->id); ?>.</td>
									<td style="width:150px;">
										<?php if($slider->left_sec_image): ?>
											<img src="<?php echo e(asset('public/admin/assets/images/slider/'.$slider->left_sec_image)); ?>" style="width:60px;">
										<?php else: ?> 
											<img src="<?php echo e(asset('public/admin/assets/images/slider/no-photo1.jpg')); ?>" style="width:60px;">
										<?php endif; ?>
									</td>
									<td><?php echo e($slider->hasCreatedBy->name); ?></td>
									<td><?php echo \Illuminate\Support\Str::limit($slider->left_sec_title,40); ?></td>
									<td><?php echo \Illuminate\Support\Str::limit($slider->left_sec_sub_description,60); ?></td>
									<td>
										<?php if($slider->status): ?>
											<span class="badge badge-success">Active</span>
										<?php else: ?> 
											<span class="badge badge-danger">In-Active</span>
										<?php endif; ?>
									</td>
									<td width="250px">
										<a href="<?php echo e(route('slider.show', $slider->id)); ?>" data-toggle="tooltip" data-placement="top" title="Show Slider" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Show</a>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('slider-edit')): ?>
											<a href="<?php echo e(route('slider.edit', $slider->id)); ?>" data-toggle="tooltip" data-placement="top" title="Edit Slider" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
										<?php endif; ?>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('slider-delete')): ?>
											<a class="btn btn-danger btn-xs delete-btn" data-toggle="tooltip" data-placement="top" title="Delete Slider" data-slider-id="<?php echo e($slider->id); ?>"><i class="fa fa-trash"></i> Delete</a>
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
            var slider_id = $(this).attr('data-slider-id');
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
                        url : "<?php echo e(url('slider')); ?>/"+slider_id,
                        type : 'DELETE',
                        data: {
                                "_token": "<?php echo e(csrf_token()); ?>",
                            },
                        success : function(response){
                            if(response){
                                $('#id-'+slider_id).hide();
                                Swal.fire(
                                    'Deleted!',
                                    'Slider has been deleted.',
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
<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/admin/slider/index.blade.php ENDPATH**/ ?>