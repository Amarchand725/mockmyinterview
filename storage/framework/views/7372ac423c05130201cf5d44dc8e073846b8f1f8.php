<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
	<div class="content-header-left">
		<h1><?php echo e($page_title); ?></h1>
	</div>
	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('why_choose-create')): ?>
	<div class="content-header-right">
		<a href="<?php echo e(route('why_choose.create')); ?>" class="btn btn-primary btn-sm">Add New</a>
	</div>
	<?php endif; ?>
</section>

<section class="content" style="min-height:auto;margin-bottom: -30px;">
	<div class="row">
		<div class="col-md-12">
			<?php if(session('status')): ?>
				<div class="callout callout-success">
					<?php echo e(session('status')); ?>

				</div>
			<?php endif; ?>
		</div>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>SL</th>
								<th>Image</th>
								<th>Icon</th>
								<th>Name</th>
								<th>Content</th>
								<th>Status</th>
								<th width="140">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $whychooses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $whychoose): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr id="id-<?php echo e($whychoose->id); ?>">
								<td><?php echo e($whychoose->id); ?>.</td>
								<td>
									<?php if($whychoose->image): ?>
										<img src="<?php echo e(asset('public/admin/assets/images/why_choose/'.$whychoose->image)); ?>" alt="" style="width:60px; height:40px">
									<?php else: ?>
										<img src="<?php echo e(asset('public/admin/assets/images/why_choose/no-photo1.jpg')); ?>" alt="" style="width:60px;">
									<?php endif; ?>
								</td>
								<td>
									<?php if($whychoose->icon): ?>
										<img src="<?php echo e(asset('public/admin/assets/images/why_choose/'.$whychoose->icon)); ?>" alt="" style="width:60px; height:40px">
									<?php else: ?>
										<img src="<?php echo e(asset('public/admin/assets/images/why_choose/no-photo1.jpg')); ?>" alt="" style="width:60px;">
									<?php endif; ?>
								</td>
								<td><?php echo \Illuminate\Support\Str::limit($whychoose->name,40); ?></td>
								<td><?php echo \Illuminate\Support\Str::limit($whychoose->content,60); ?></td>
								<td>
									<?php if($whychoose->status): ?>
										<span class="badge badge-success">Active</span>
									<?php else: ?>
										<span class="badge badge-danger">In-Active</span>
									<?php endif; ?>
								</td>
								<td>
									<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('why_choose-edit')): ?>
										<a href="<?php echo e(route('why_choose.edit', $whychoose->id)); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
									<?php endif; ?>
									<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('why_choose-delete')): ?>
										<a class="btn btn-danger btn-xs delete-btn" data-whychoose-id="<?php echo e($whychoose->id); ?>"><i class="fa fa-trash"></i> Delete</a>
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
            var whychoose_id = $(this).attr('data-whychoose-id');
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
                        url : "<?php echo e(url('why_choose')); ?>/"+whychoose_id,
                        type : 'DELETE',
                        data: {
                                "_token": "<?php echo e(csrf_token()); ?>",
                            },
                        success : function(response){
                            // console.log(response);
                            if(response){
                                $('#id-'+whychoose_id).hide();
                                Swal.fire(
                                    'Deleted!',
                                    'Whychoose us has been deleted successfully.',
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

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/admin/why_choose/index.blade.php ENDPATH**/ ?>