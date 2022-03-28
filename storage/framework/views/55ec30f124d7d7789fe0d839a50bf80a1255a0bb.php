<?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr id="id-<?php echo e($slider->id); ?>">
        <td><?php echo e($sliders->firstItem()+$key); ?>.</td>
        <td style="width:150px;">
            <?php if($slider->left_sec_image): ?>
                <img src="<?php echo e(asset('public/admin/assets/images/slider/'.$slider->left_sec_image)); ?>" style="width:60px;">
            <?php else: ?>
                <img src="<?php echo e(asset('public/admin/assets/images/slider/no-photo1.jpg')); ?>" style="width:60px;">
            <?php endif; ?>
        </td>
        <td><?php echo e($slider->hasCreatedBy->name); ?></td>
        <td><?php echo \Illuminate\Support\Str::limit($slider->left_sec_title,40); ?></td>
        <td><?php echo \Illuminate\Support\Str::limit($slider->left_sec_sub_description,60); ?></td>
        <td>
            <?php if($slider->status): ?>
                <span class="badge badge-success">Active</span>
            <?php else: ?>
                <span class="badge badge-danger">In-Active</span>
            <?php endif; ?>
        </td>
        <td width="250px">
            <a href="<?php echo e(route('slider.show', $slider->id)); ?>" data-toggle="tooltip" data-placement="top" title="Show Slider" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Show</a>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('slider-edit')): ?>
                <a href="<?php echo e(route('slider.edit', $slider->id)); ?>" data-toggle="tooltip" data-placement="top" title="Edit Slider" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('slider-delete')): ?>
                <a class="btn btn-danger btn-xs delete-btn" data-toggle="tooltip" data-placement="top" title="Delete Slider" data-slider-id="<?php echo e($slider->id); ?>"><i class="fa fa-trash"></i> Delete</a>
            <?php endif; ?>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td colspan="7">
        Displying <?php echo e($sliders->firstItem()); ?> to <?php echo e($sliders->lastItem()); ?> of <?php echo e($sliders->total()); ?> records
        <div class="d-flex justify-content-center">
            <?php echo $sliders->links('pagination::bootstrap-4'); ?>

        </div>
    </td>
</tr>
<?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/admin/slider/search.blade.php ENDPATH**/ ?>