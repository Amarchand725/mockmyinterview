
<?php $__env->startSection('content'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Edit Why Choose Us</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo e(route('why_choose.index')); ?>" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="<?php echo e(route('why_choose.update', $whychoose->id)); ?>" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				<?php echo csrf_field(); ?>
				<?php echo e(method_field('PATCH')); ?>

				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Name <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<input type="text" autocomplete="off" class="form-control" name="name" value="<?php echo e($whychoose->name); ?>" placeholder="Enter name">
								<span style="color: red"><?php echo e($errors->first('name')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Content <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<textarea class="form-control" name="content" style="height:120px;" placeholder="Enter content here..."><?php echo $whychoose->content; ?></textarea>
								<span style="color: red"><?php echo $errors->first('content'); ?></span>
							</div>
						</div>
						<?php if($whychoose->icon): ?>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Exist Icon </label>
								<div class="col-sm-9" style="padding-top:5px">
									<img src="<?php echo e(asset('public/admin/assets/images/why_choose')); ?>/<?php echo e($whychoose->icon); ?>" alt="Testimonial Image" height="100px" width="100px">
								</div>
							</div>
						<?php endif; ?>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Icon </label>
							<div class="col-sm-9" style="padding-top:5px">
								<input type="file" name="icon"><span style="color: red">(Only jpg, jpeg, gif and png are allowed)</span><br />
								<span style="color: red"><?php echo e($errors->first('icon')); ?></span>
							</div>
						</div>
						<?php if($whychoose->image): ?>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Exist Image </label>
								<div class="col-sm-9" style="padding-top:5px">
									<img src="<?php echo e(asset('public/admin/assets/images/why_choose')); ?>/<?php echo e($whychoose->image); ?>" alt="Testimonial Image" height="80px" width="80px">
								</div>
							</div>
						<?php endif; ?>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Image </label>
							<div class="col-sm-9" style="padding-top:5px">
								<input type="file" name="image"><span style="color: red">(Only jpg, jpeg, gif and png are allowed)</span><br />
								<span style="color: red"><?php echo e($errors->first('image')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Status</label>
							<div class="col-sm-8">
								<select name="status" class="form-control" id="">
									<option value="1" <?php echo e($whychoose->status==1?'selected':''); ?>>Active</option>
									<option value="0" <?php echo e($whychoose->status==0?'selected':''); ?>>In-Active</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form1">Submit</button>
							</div>
						</div>

					</div>
				</div>
			</form>
		</div>
	</div>
</section>

<script>
	$(document).ready(function() {
		$("#regform").validate({
			rules: {
				name: "required",
				content: "required",
			}
		});
	});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/admin/why_choose/edit.blade.php ENDPATH**/ ?>