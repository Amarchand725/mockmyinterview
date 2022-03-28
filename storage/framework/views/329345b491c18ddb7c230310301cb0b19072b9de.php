
<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
	<section class="content-header">
		<div class="content-header-left">
			<h1><?php echo e($page_title); ?></h1>
		</div>
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
				<form action="<?php echo e(route('social_media.update', $social->id)); ?>" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
					<?php echo csrf_field(); ?>
					<?php echo e(method_field('PATCH')); ?>

					<div class="box box-info">
						<div class="box-body">
							<p style="padding-bottom: 20px;">If you do not want to show a social media in your front end page, just leave the input field blank.</p>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Facebook </label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="facebook" value="<?php echo e($social->facebook); ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Twitter </label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="twitter" value="<?php echo e($social->twitter); ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">LinkedIn </label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="linkedin" value="<?php echo e($social->linkedin); ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Google Plus </label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="googleplus" value="<?php echo e($social->googleplus); ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Pinterest </label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="pinterest" value="<?php echo e($social->pinterest); ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">YouTube </label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="youtube" value="<?php echo e($social->youtube); ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Instagram </label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="instagram" value="<?php echo e($social->instagram); ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Tumblr </label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="tumblr" value="<?php echo e($social->tumblr); ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Flickr </label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="flickr" value="<?php echo e($social->flickr); ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Reddit </label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="reddit" value="<?php echo e($social->reddit); ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Snapchat </label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="snapchat" value="<?php echo e($social->snapchat); ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">WhatsApp </label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="whatsapp" value="<?php echo e($social->whatsapp); ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Quora </label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="quora" value="<?php echo e($social->quora); ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">StumbleUpon </label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="stumbleupon" value="<?php echo e($social->stumbleupon); ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Delicious </label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="delicious" value="<?php echo e($social->delicious); ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Digg </label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="digg" value="<?php echo e($social->digg); ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label"></label>
								<div class="col-sm-6">
									<button type="submit" class="btn btn-success pull-left">Submit</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/admin/social_media/index.blade.php ENDPATH**/ ?>