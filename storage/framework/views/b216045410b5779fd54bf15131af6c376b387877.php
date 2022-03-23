

<?php $__env->startSection('content'); ?>
<section class="content-header">
	<div class="content-header-left">
		<h1>All Testimonials</h1>
	</div>
	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('testimonial-create')): ?>
	<div class="content-header-right">
		<a href="<?php echo e(route('testimonial.create')); ?>" class="btn btn-primary btn-sm">Add Testimonial</a>
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
								<th>Image</th>
								<th>Name</th>
								<th>Designation</th>
								<th>Comment</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr id="id-<?php echo e($testimonial->slug); ?>">
									<td><?php echo e($testimonial->id); ?>.</td>
									<td>
										<?php if($testimonial->image): ?>
											<img src="<?php echo e(asset('public/admin/assets/images/testimonials/'.$testimonial->image)); ?>" alt="" style="width:60px;">
										<?php else: ?> 
											<img src="<?php echo e(asset('public/admin/assets/images/testimonials/no-photo1.jpg')); ?>" style="width:60px;">
										<?php endif; ?>
									</td>
									<td><?php echo $testimonial->name; ?></td>
									<td><?php echo $testimonial->designation; ?></td>
									<td><?php echo \Illuminate\Support\Str::limit($testimonial->comment,60); ?></td>
									<td>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('testimonial-edit')): ?>
											<a href="<?php echo e(route('testimonial.edit', $testimonial->slug)); ?>" data-toggle="tooltip" data-placement="top" title="Edit testimonial" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
										<?php endif; ?>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('testimonial-delete')): ?>
											<a class="btn btn-danger btn-xs delete-btn" data-toggle="tooltip" data-placement="top" title="Delete testimonial" data-testimonial-slug="<?php echo e($testimonial->slug); ?>"><i class="fa fa-trash"></i> Delete</a>
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
            var testimonial_slug = $(this).attr('data-testimonial-slug');
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
                        url : "<?php echo e(url('testimonial')); ?>/"+testimonial_slug,
						type : 'DELETE',
                        data: {
                                "_token": "<?php echo e(csrf_token()); ?>",
                            },
                        success : function(response){
                            if(response){
                                $('#id-'+testimonial_slug).hide();
                                Swal.fire(
                                    'Deleted!',
                                    'Testimonial has been deleted.',
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
<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/admin/testimonial/index.blade.php ENDPATH**/ ?>