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
</tr><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/web-views/interviewer/resources-search.blade.php ENDPATH**/ ?>