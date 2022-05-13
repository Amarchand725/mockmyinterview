

<?php $__env->startSection('title', $page_title); ?>

<?php $__env->startSection('content'); ?>
    <input type="hidden" id="page_url" value="<?php echo e(route('blog-resources')); ?>">

    <div class="container-fluid py-3 ">
        <div class="row mx-auto">
            <h2 class="mb-3">Resources </h2>
            <div class="container pt-5">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="input-group rounded">
                            <input type="search" id="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                        </div>
                    </div>
                    <div class="col-sm-6 ">
                        <select class="form-select" id="status" aria-label="Default select example">
                            <option value="All" selected>Search by category</option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->slug); ?>"><?php echo e($category->name); ?></option>    
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>
            
            <!-- scheduling code -->
            <div class="container pt-5">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered resource_tb">
                            <tbody id="body">
                                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <b><u><a href="<?php echo e(route('blog.single', $blog->slug)); ?>"> <?php echo e($blog->title); ?></a></u></b>
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
                                            <?php echo \Illuminate\Support\Str::limit($blog->description,300); ?>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <div class="card-footer p-3">
                                            Displying <?php echo e($blogs->firstItem()); ?> to <?php echo e($blogs->lastItem()); ?> of <?php echo e($blogs->total()); ?> records
                                            <div class="d-flex justify-content-right mt-3">
                                                <?php echo $blogs->links('pagination::bootstrap-4'); ?>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
    
<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('web-views.dashboard.master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/web-views/interviewer/resources.blade.php ENDPATH**/ ?>