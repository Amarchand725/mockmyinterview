<?php $__env->startSection('title', $page_title); ?>
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
                    <div class="row">
                        <div class="col-sm-1">Search:</div>
                        <div class="d-flex col-sm-6">
                            <input type="text" id="search" class="form-control" placeholder="Search">
                        </div>
                        <div class="d-flex col-sm-5">
                            <select name="" id="status" class="form-control status" style="margin-bottom:5px">
                                <option value="All" selected>Search by status</option>
                                <option value="1">Active</option>
                                <option value="2">In-Active</option>
                            </select>
                        </div>
                    </div>
					<table id="" class="table table-bordered table-striped">
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
						<tbody id="body">
							<?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr id="id-<?php echo e($slider->id); ?>">
									<td><?php echo e($sliders->firstItem()+$key); ?>.</td>
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
                                            <button class="btn btn-danger btn-xs delete" data-slug="<?php echo e($slider->id); ?>" data-del-url="<?php echo e(url('slider', $slider->id)); ?>"><i class="fa fa-trash"></i> Delete</button>
										<?php endif; ?>
									</td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td colspan="7">
                                    Displying <?php echo e($sliders->count()); ?> of <?php echo e($sliders->total()); ?> records
                                    <div class="d-flex justify-content-center">
                                        <?php echo $sliders->links('pagination::bootstrap-4'); ?>

                                    </div>
                                </td>
                            </tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/admin/slider/index.blade.php ENDPATH**/ ?>