
<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
	<div class="content-header-left">
		<h1><?php echo e($page_title); ?></h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo e(route('coupon.index')); ?>" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="<?php echo e(route('coupon.update', $model->slug)); ?>" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				<?php echo csrf_field(); ?>
				<?php echo e(method_field('PATCH')); ?>

				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Name <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="name" value="<?php echo e($model->name); ?>" placeholder="Enter name">
								<span style="color: red"><?php echo e($errors->first('name')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Type <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<div class="form-check">
									<?php if($model->type=='percent'): ?>
										<input class="form-check-input" checked value="percent" type="radio" name="type" id="percent">	
									<?php else: ?> 
										<input class="form-check-input" value="percent" type="radio" name="type" id="percent">
									<?php endif; ?>
									<label class="form-check-label" for="percent">
										<strong>Percent</strong> 
									</label>
								</div>
								<div class="form-check">
									<?php if($model->type=='fix'): ?>
										<input class="form-check-input" checked value="fix" type="radio" name="type" id="fix">
									<?php else: ?> 
										<input class="form-check-input" value="fix" type="radio" name="type" id="fix">
									<?php endif; ?>
									<label class="form-check-label" for="fix">
										<strong>Fix Amount</strong>
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Discount <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control numeric" name="discount" value="<?php echo e($model->discount); ?>" placeholder="Enter discount">
								<span style="color: red"><?php echo e($errors->first('discount')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Max Usages <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control numeric" name="max_usages" value="<?php echo e($model->max_usages); ?>" placeholder="Enter max_usages">
								<span style="color: red"><?php echo e($errors->first('max_usages')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Start Date </label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control datepicker" readonly value="<?php echo e($model->start_date); ?>" name="start_date">
								<span style="color: red"><?php echo e($errors->first('start_date')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">End Date </label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control datepicker" readonly value="<?php echo e($model->end_date); ?>" name="end_date">
								<span style="color: red"><?php echo e($errors->first('end_date')); ?></span>
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Description </label>
							<div class="col-sm-9">
								<textarea class="form-control" name="description" style="height:100px;" placeholder="Enter description"><?php echo e($model->description); ?></textarea>
								<span style="color: red"><?php echo e($errors->first('description')); ?></span>
							</div>
						</div>
						<?php if($model->banner): ?>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Exist Banner </label>
								<div class="col-sm-9" style="padding-top:5px">
									<img src="<?php echo e(asset('public/admin/assets/coupons/'.$model->banner)); ?>" alt="" style="width:60px;">
								</div>
							</div>
						<?php endif; ?>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Banner </label>
							<div class="col-sm-9" style="padding-top:5px">
								<input type="file" name="banner" accept="image/*">
								(Only jpg, jpeg, gif and png are allowed) <br />
								<span style="color: red"><?php echo e($errors->first('banner')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Status</label>
							<div class="col-sm-9">
								<select name="status" class="form-control" id="">
									<option value="1" <?php echo e($model->status==1?'selected':''); ?>>Active</option>
									<option value="0" <?php echo e($model->status==0?'selected':''); ?>>In-Active</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-9">
								<button type="submit" class="btn btn-success pull-left" name="form1">Submit</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<script>
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/admin/coupons/edit.blade.php ENDPATH**/ ?>