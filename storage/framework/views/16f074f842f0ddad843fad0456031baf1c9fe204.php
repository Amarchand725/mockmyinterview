
<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
	<section class="content-header">
		<div class="content-header-left">
			<h1><?php echo e($page_title); ?></h1>
		</div>
		<div class="content-header-right">
			<a href="<?php echo e(route('language.index')); ?>" class="btn btn-primary btn-sm">View All</a>
		</div>
	</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="<?php echo e(route('language.update', $language->slug)); ?>" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				<?php echo csrf_field(); ?>
				<?php echo e(method_field('PATCH')); ?>

				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Language <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<input type="text" class="form-control" value="<?php echo e($language->title); ?>" name="title" placeholder="Enter language">
								<span style="color: red"><?php echo e($errors->first('title')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Code <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<input type="text" class="form-control" value="<?php echo e($language->code); ?>" name="code" placeholder="Enter language code">
								<span style="color: red"><?php echo e($errors->first('code')); ?></span>
							</div>
						</div>
						
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Description </label>
							<div class="col-sm-9">
								<textarea class="form-control" name="description" style="height:80px;" placeholder="Enter description"><?php echo e($language->description); ?></textarea>
								<span style="color: red"><?php echo e($errors->first('description')); ?></span>
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
				title: "required",
			}
		});
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/admin/language/edit.blade.php ENDPATH**/ ?>