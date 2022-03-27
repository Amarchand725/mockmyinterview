<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<input type="hidden" id="page_url" value="<?php echo e(route('why_choose.index')); ?>">
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
								<th>Icon</th>
								<th>Name</th>
								<th>Content</th>
								<th>Status</th>
								<th width="140">Action</th>
							</tr>
						</thead>
						<tbody id="body">
							<?php $__currentLoopData = $whychooses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$whychoose): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr id="id-<?php echo e($whychoose->id); ?>">
                                    <td><?php echo e($whychooses->firstItem()+$key); ?>.</td>
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
                                    <td width="200px">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('why_choose-edit')): ?>
                                            <a href="<?php echo e(route('why_choose.edit', $whychoose->id)); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('why_choose-delete')): ?>
                                            <button class="btn btn-danger btn-xs delete" data-slug="<?php echo e($whychoose->id); ?>" data-del-url="<?php echo e(url('why_choose', $whychoose->id)); ?>"><i class="fa fa-trash"></i> Delete</button>
                                        <?php endif; ?>
                                    </td>
                                </tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td colspan="5">
                                    Displying <?php echo e($whychooses->count()); ?> of <?php echo e($whychooses->total()); ?> records
                                    <div class="d-flex justify-content-center">
                                        <?php echo $whychooses->links('pagination::bootstrap-4'); ?>

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

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/admin/why_choose/index.blade.php ENDPATH**/ ?>