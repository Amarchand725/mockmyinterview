<?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr id="id-<?php echo e($testimonial->slug); ?>">
        <td><?php echo e($testimonials->firstItem()+$key); ?>.</td>
        <td>
            <?php if($testimonial->image): ?>
                <img src="<?php echo e(asset('public/admin/assets/images/testimonials/'.$testimonial->image)); ?>" alt="" style="width:60px;">
            <?php else: ?>
                <img src="<?php echo e(asset('public/admin/assets/images/testimonials/no-photo1.jpg')); ?>" style="width:60px;">
            <?php endif; ?>
        </td>
        <td><?php echo $testimonial->name; ?></td>
        <td><?php echo $testimonial->designation; ?></td>
        <td><?php echo \Illuminate\Support\Str::limit($testimonial->comment,60); ?></td>
        <td>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('testimonial-edit')): ?>
                <a href="<?php echo e(route('testimonial.edit', $testimonial->slug)); ?>" data-toggle="tooltip" data-placement="top" title="Edit testimonial" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('testimonial-delete')): ?>
                <a class="btn btn-danger btn-xs delete-btn" data-toggle="tooltip" data-placement="top" title="Delete testimonial" data-testimonial-slug="<?php echo e($testimonial->slug); ?>"><i class="fa fa-trash"></i> Delete</a>
            <?php endif; ?>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td colspan="6">
        Displying <?php echo e($testimonials->count()); ?> of <?php echo e($testimonials->total()); ?> records
        <div class="d-flex justify-content-center">
            <?php echo $testimonials->links('pagination::bootstrap-4'); ?>

        </div>
    </td>
</tr>
<?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/admin/testimonial/search.blade.php ENDPATH**/ ?>