
<?php $__env->startSection('content'); ?>
<section class="content-header">
	<div class="content-header-left">
		<h1><?php if(!empty($model)): ?> Edit <?php else: ?> Add <?php endif; ?> Page Setting of <strong><?php echo e($model->title); ?></strong></h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo e(route('page.index')); ?>" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<?php if(session('message')): ?>
				<div class="callout callout-success">
					<?php echo e(session('message')); ?>

				</div>
			<?php endif; ?>
			<form action="<?php echo e(route('page_setting.store')); ?>" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				<?php echo csrf_field(); ?>

				<input type="hidden" name="parent_slug" id="" value="<?php echo e($model->slug); ?>">
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Meta Title </label>
							<div class="col-sm-9">
								<input type="text" name="mt_about" class="form-control" value="<?php echo e(isset($page_data['mt_about'])?$page_data['mt_about']:''); ?>" placeholder="Enter meta title">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Meta Keyword </label>
							<div class="col-sm-9">
								<textarea class="form-control" name="mk_about" style="height:60px;" placeholder="Enter meta keyword"><?php echo e(isset($page_data['mk_about'])?$page_data['mk_about']:''); ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Meta Description </label>
							<div class="col-sm-9">
								<textarea class="form-control" name="md_about" style="height:60px;" placeholder="Enter meta description"><?php echo e(isset($page_data['md_about'])?$page_data['md_about']:''); ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Heading </label>
							<div class="col-sm-9">
								<input type="text" name="about_heading" class="form-control" value="<?php echo isset($page_data['about_heading'])?$page_data['about_heading']:''; ?>" placeholder="Enter heading">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Content </label>
							<div class="col-sm-9">
								<textarea name="about_content" class="form-control texteditor" cols="30" rows="10" placeholder="Enter content"><?php echo isset($page_data['about_content'])?$page_data['about_content']:''; ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Show on Home? </label>
							<div class="col-sm-2">
								<select name="about_status" class="form-control select2 select2-accessible" style="width:auto;" tabindex="-1" aria-hidden="true">
									<option value="1" <?php echo e((isset($page_data['about_status'])?($page_data['about_status']==1?'selected':''):'')); ?>>Show</option>
									<option value="0" <?php echo e((isset($page_data['about_status'])?($page_data['about_status']==0?'selected':''):'')); ?>>Hide</option>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form_about">Update</button>
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
<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/admin/page_setting/about.blade.php ENDPATH**/ ?>