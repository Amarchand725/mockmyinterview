
<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
	<section class="content-header">
		<div class="content-header-left">
			<h1><?php echo e($page_title); ?></h1>
		</div>
		<div class="content-header-right">
			<a href="<?php echo e(route('booking_priority.index')); ?>" class="btn btn-primary btn-sm">View All</a>
		</div>
	</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="<?php echo e(route('booking_priority.update', $model->slug)); ?>" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				<?php echo csrf_field(); ?>
				<?php echo e(method_field('PATCH')); ?>

				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="title" class="col-sm-2 control-label">Type <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<select name="type" id="" class="form-control">
									<option value="uno" <?php echo e($model->type=='uno'?'selected':''); ?>>UNO</option>
									<option value="duo" <?php echo e($model->type=='duo'?'selected':''); ?>>DUO</option>
									<option value="trio" <?php echo e($model->type=='trio'?'selected':''); ?>>TRIO</option>
								</select>
								<span style="color: red"><?php echo e($errors->first('type')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="title" class="col-sm-2 control-label">Title <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<input type="text" id="title" class="form-control" value="<?php echo e($model->title); ?>" name="title" placeholder="Enter title">
								<span style="color: red"><?php echo e($errors->first('title')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="currency_code" class="col-sm-2 control-label">Currency Code</label>
							<div class="col-sm-9">
								<input type="text" id="currency_code" class="form-control" value="<?php echo e($model->currency_code); ?>" name="currency_code" placeholder="Enter currency_code">
								<span style="color: red"><?php echo e($errors->first('currency_code')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="price" class="col-sm-2 control-label">Price</label>
							<div class="col-sm-9">
								<input type="text" id="price" class="form-control" value="<?php echo e($model->price); ?>" name="price" placeholder="Enter price">
								<span style="color: red"><?php echo e($errors->first('price')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="credits" class="col-sm-2 control-label">Credits</label>
							<div class="col-sm-9">
								<input type="number" id="credits" class="form-control" value="<?php echo e($model->credits); ?>" name="credits" placeholder="Enter credits">
								<span style="color: red"><?php echo e($errors->first('credits')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="color" class="col-sm-2 control-label">Color <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<input type="color" id="color" value="<?php echo e($model->color); ?>" name="color" placeholder="Enter color">
								<span style="color: red"><?php echo e($errors->first('color')); ?></span>
							</div>
						</div>
						
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Description </label>
							<div class="col-sm-9">
								<textarea class="form-control" name="description" style="height:80px;" placeholder="Enter description"><?php echo e($model->description); ?></textarea>
								<span style="color: red"><?php echo e($errors->first('description')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="status" class="col-sm-2 control-label">Status</label>
							<div class="col-sm-9">
								<select name="status" id="status" class="form-control">
									<option value="1" <?php echo e($model->status==1?'selected':''); ?>>Active</option>
									<option value="0" <?php echo e($model->status==0?'selected':''); ?>>In-Active</option>
								</select>
								<span style="color: red"><?php echo e($errors->first('status')); ?></span>
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
<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/admin/booking_priorities/edit.blade.php ENDPATH**/ ?>