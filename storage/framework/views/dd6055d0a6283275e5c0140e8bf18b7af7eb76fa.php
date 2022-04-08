
<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Edit Post</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo e(route('blog.index')); ?>" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="<?php echo e(route('blog.update', $model->slug)); ?>" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				<?php echo csrf_field(); ?>
				<?php echo e(method_field('PATCH')); ?>

				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Category <span style='color:red'>*</span></label>
							<div class="col-sm-9">
								<select name="category_slug" id="" class="form-control">
									<option value="" selected>Select category</option>
									<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($category->slug); ?>" <?php echo e($category->slug==$model->category_slug?'selected':''); ?>><?php echo e($category->name); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
								<span style="color: red"><?php echo e($errors->first('category_id')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Title <span style="color:red">*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="title" value="<?php echo e($model->title); ?>">
								<span style="color: red"><?php echo e($errors->first('title')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Description </label>
							<div class="col-sm-9">
								<textarea class="form-control texteditor" name="description" style="height:140px;"><?php echo $model->description; ?></textarea>
								<span style="color: red"><?php echo e($errors->first('description')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Paid/Free </label>
							<div class="col-sm-9" style="padding-top:5px">
							<div class="form-check">
								<input class="form-check-input" type="radio" value="1" name="paid_free" id="paid" <?php if($model->paid_free): ?> checked <?php endif; ?>>
								<label class="form-check-label" for="paid">
								  Paid
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" value="0" name="paid_free" id="free" <?php if($model->paid_free==0): ?> checked <?php endif; ?>>
								<label class="form-check-label" for="free">
								  Free
								</label>
							</div>
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
						<?php if($model->image): ?>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Exist Image </label>
								<div class="col-sm-9" style="padding-top:5px">
									<img src="<?php echo e(asset('public/admin/assets/posts')); ?>/<?php echo e($model->image); ?>" alt="Post" height="100px" width="100px">
								</div>
							</div>
						<?php endif; ?>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Post </label>
							<div class="col-sm-9" style="padding-top:5px">
								<input type="file" name="post">
								<span style="color: red"><?php echo e($errors->first('post')); ?></span>
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
				category_id: "required",
				title: "required"
			}
		});
	});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/admin/blog/edit.blade.php ENDPATH**/ ?>