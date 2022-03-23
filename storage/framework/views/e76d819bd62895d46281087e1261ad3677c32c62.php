

<?php $__env->startSection('content'); ?>
<section class="content-header">
	<div class="content-header-left">
		<h1>Edit Team Member</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo e(route('team.index')); ?>" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="<?php echo e(route('team.update', $model->slug)); ?>" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				<?php echo csrf_field(); ?>
				<?php echo e(method_field('PATCH')); ?>

				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">First Name <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="first_name" value="<?php echo e($model->first_name); ?>" placeholder="Enter first_name">
								<span style="color: red"><?php echo e($errors->first('first_name')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Last Name </label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="last_name" value="<?php echo e($model->last_name); ?>" placeholder="Enter last_name">
								<span style="color: red"><?php echo e($errors->first('last_name')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Designation <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="designation" value="<?php echo e($model->designation); ?>" placeholder="Enter designation">
								<span style="color: red"><?php echo e($errors->first('designation')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Twitter Link</label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="twitter_link" value="<?php echo e($model->twitter_link); ?>" placeholder="Enter twitter_link">
								<span style="color: red"><?php echo e($errors->first('twitter_link')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Facbook Link</label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="facebook_link" value="<?php echo e($model->facebook_link); ?>" placeholder="Enter facebook_link">
								<span style="color: red"><?php echo e($errors->first('facebook_link')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Instagram Link</label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="instagram_link" value="<?php echo e($model->instagram_link); ?>" placeholder="Enter instagram_link">
								<span style="color: red"><?php echo e($errors->first('instagram_link')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Linkedin Link</label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="linkedin_link" value="<?php echo e($model->linkedin_link); ?>" placeholder="Enter linkedin_link">
								<span style="color: red"><?php echo e($errors->first('linkedin_link')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Description </label>
							<div class="col-sm-9">
								<textarea class="form-control texteditor" name="description" style="height:200px;" placeholder="Enter description"><?php echo $model->description; ?></textarea>
								<span style="color: red"><?php echo e($errors->first('description')); ?></span>
							</div>
						</div>
						<?php if($model->image): ?>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Exist Image </label>
								<div class="col-sm-9" style="padding-top:5px">
									<img src="<?php echo e(asset('public/admin/assets/images/team')); ?>/<?php echo e($model->image); ?>" alt="model Image" height="100px" width="100px">
								</div>
							</div>
						<?php endif; ?>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Image </label>
							<div class="col-sm-9" style="padding-top:5px">
								<input type="file" name="image" accept="image/*">(Only jpg, jpeg, gif and png are allowed) <br />
								<span style="color: red"><?php echo e($errors->first('image')); ?></span>
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
<?php $__env->startPush('js'); ?>
<script>
	$(document).ready(function() {
		if ($(".texteditor").length > 0) {
			tinymce.init({
				selector: "textarea.texteditor",
				theme: "modern",
				height: 150,
				plugins: [
					"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
					"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
					"save table contextmenu directionality emoticons template paste textcolor"
				],
				toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

			});
		}

		$("#regform").validate({
			rules: {
				first_name: "required",
				designation: "required",
			}
		});
	});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/admin/team/edit.blade.php ENDPATH**/ ?>