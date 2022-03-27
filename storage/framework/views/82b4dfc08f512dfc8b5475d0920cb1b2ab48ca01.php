<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Edit Slider</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo e(route('slider.index')); ?>" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="<?php echo e(route('slider.update', $slider->id)); ?>" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				<?php echo csrf_field(); ?>
				<?php echo e(method_field('PATCH')); ?>

				<div class="box box-info">
					<div class="box-body">
						<fieldset>
							<?php if($slider->left_sec_image): ?>
								<div class="form-group">
									<label for="" class="col-sm-2 control-label">Existing Image</label>
									<div class="col-sm-9" style="padding-top:5px">
										<img src="<?php echo e(asset('public/admin/assets/images/slider')); ?>/<?php echo e($slider->left_sec_image); ?>" alt="Slider Image" height="100px" width="100px">
									</div>
								</div>
							<?php endif; ?>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Image <span style="color:red">*</span></label>
								<div class="col-sm-9" style="padding-top:5px">
									<input type="file" name="left_sec_image" accept="image/*">(Only jpg, jpeg, gif and png are allowed) <br />
									<span style="color: red"><?php echo e($errors->first('image')); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Title </label>
								<div class="col-sm-9">
									<input type="text" autocomplete="off" class="form-control" name="left_sec_title" value="<?php echo e($slider->left_sec_title); ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Sub Description </label>
								<div class="col-sm-9">
									<textarea class="form-control texteditor" name="left_sec_sub_description" style="height:140px;"><?php echo $slider->left_sec_sub_description; ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Description </label>
								<div class="col-sm-9">
									<textarea class="form-control texteditor" name="left_sec_description" style="height:140px;" placeholder="Enter description"><?php echo $slider->left_sec_description; ?></textarea>
									<span style="color: red"><?php echo e($errors->first('left_sec_description')); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Status</label>
								<div class="col-sm-9">
									<select name="status" class="form-control" id="">
										<option value="1" <?php echo e($slider->status==1?'selected':''); ?>>Active</option>
										<option value="0" <?php echo e($slider->status==0?'selected':''); ?>>In-Active</option>
									</select>
								</div>
							</div>
						</fieldset>
						<fieldset>
							<legend>Right Section</legend>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Title </label>
								<div class="col-sm-9">
									<input type="text" autocomplete="off" class="form-control" name="right_sect_title" value="<?php echo e($slider->right_sect_title); ?>" placeholder="Enter slider title">
									<span style="color: red"><?php echo e($errors->first('right_sect_title')); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Description </label>
								<div class="col-sm-9">
									<textarea class="form-control" name="right_sec_description" style="height:140px;" placeholder="Enter description"><?php echo e($slider->right_sec_description); ?></textarea>
									<span style="color: red"><?php echo e($errors->first('description')); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Left Button Label </label>
								<div class="col-sm-9">
									<input type="text" autocomplete="off" class="form-control" name="right_sec_left_btn_lbl" value="<?php echo e($slider->right_sec_left_btn_lbl); ?>" placeholder="Enter slider title">
									<span style="color: red"><?php echo e($errors->first('right_sec_left_btn_lbl')); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Right Button Label </label>
								<div class="col-sm-9">
									<input type="text" autocomplete="off" class="form-control" name="right_sec_right_btn_lbl" value="<?php echo e($slider->right_sec_right_btn_lbl); ?>" placeholder="Enter slider title">
									<span style="color: red"><?php echo e($errors->first('right_sec_right_btn_lbl')); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Video Link </label>
								<div class="col-sm-9" style="padding-top:5px">
									<input type="text" autocomplete="off" class="form-control" name="right_sec_video_link" value="<?php echo e($slider->right_sec_video_link); ?>" placeholder="Enter video link here...">
									<span style="color: red"><?php echo e($errors->first('right_sec_video_link')); ?></span>
								</div>
							</div>
						</fieldset>

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
	});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/admin/slider/edit.blade.php ENDPATH**/ ?>