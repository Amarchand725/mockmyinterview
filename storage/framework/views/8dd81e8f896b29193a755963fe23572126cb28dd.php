

<?php $__env->startSection('title', $page_title); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid py-3 ">
        <div class="row mx-auto">
            <h2 class="mb-3">Resource - Single - Blog  <span><a href="<?php echo e(route('blog-resources')); ?>" class="btn btn-primary btn-sm">Back to List</a></span></h2>
            
            <div class="container pt-5">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered resource_tb">
                            <tr>
                                <?php if($blog->post): ?>
                                <td>
                                    <?php if($blog->mime_type=='video'): ?>
                                        <video width="320" height="240" controls>
                                            <source src="<?php echo e(asset('public/admin/assets/posts')); ?>/<?php echo e($blog->post); ?>" type="video/mp4">
                                            <source src="movie.ogg" type="video/ogg">
                                            Your browser does not support the video tag.
                                        </video>
                                    <?php else: ?> 
                                        <img src="<?php echo e(asset('public/admin/assets/posts')); ?>/<?php echo e($blog->post); ?>" width="320" height="240" alt="">
                                    <?php endif; ?>
                                </td>
                                <?php endif; ?>
                                <td>
                                    <b><u> <?php echo e($blog->title); ?></u></b>
                                    <br>
                                    <span class="label interview-tips"> <?php echo e($blog->hasCategory->name); ?></span>
                                    <span class="label interview-tips1 ml-2 ">
                                        <?php if($blog->is_paid): ?>
                                            Paid
                                        <?php else: ?> 
                                            Free
                                        <?php endif; ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo $blog->description; ?>

                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
    
<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('web-views.dashboard.master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/web-views/interviewer/resource-single.blade.php ENDPATH**/ ?>