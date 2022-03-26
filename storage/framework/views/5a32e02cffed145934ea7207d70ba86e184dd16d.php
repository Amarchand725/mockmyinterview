<?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr id="id-<?php echo e($course->slug); ?>">
        <td><?php echo e($courses->firstItem()+$key); ?>.</td>
        <td><?php echo e(isset($course->hasDegree)?$course->hasDegree->title:'N/A'); ?></td>
        <td><?php echo \Illuminate\Support\Str::limit($course->title,40); ?></td>
        <td><?php echo \Illuminate\Support\Str::limit($course->description,60); ?></td>
        <td>
            <?php if($course->status): ?>
                <span class="badge badge-success">Active</span>
            <?php else: ?>
                <span class="badge badge-danger">In-Active</span>
            <?php endif; ?>
        </td>
        <td>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('course-edit')): ?>
                <a class="btn btn-primary btn-xs" href="<?php echo e(route('course.edit', $course->slug)); ?>"><i class="fa fa-edit"></i> Edit</a>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('course-delete')): ?>
                <button class="btn btn-danger btn-xs delete" data-course-slug="<?php echo e($course->slug); ?>"><i class="fa fa-trash"></i> Delete</button>
            <?php endif; ?>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td colspan="6">
        Displying <?php echo e($courses->count()); ?> of <?php echo e($courses->total()); ?> records
        <div class="d-flex justify-content-center">
            <?php echo $courses->links('pagination::bootstrap-4'); ?>

        </div>
    </td>
</tr>
<?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/admin/course/search.blade.php ENDPATH**/ ?>