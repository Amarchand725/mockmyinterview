<?php $__currentLoopData = $whychooses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$whychoose): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr id="id-<?php echo e($whychoose->id); ?>">
        <td><?php echo e($whychooses->firstItem()+$key); ?>.</td>
        <td>
            <?php if($whychoose->image): ?>
                <img src="<?php echo e(asset('public/admin/assets/images/why_choose/'.$whychoose->image)); ?>" alt="" style="width:60px; height:40px">
            <?php else: ?>
                <img src="<?php echo e(asset('public/admin/assets/images/why_choose/no-photo1.jpg')); ?>" alt="" style="width:60px;">
            <?php endif; ?>
        </td>
        <td>
            <?php if($whychoose->icon): ?>
                <img src="<?php echo e(asset('public/admin/assets/images/why_choose/'.$whychoose->icon)); ?>" alt="" style="width:60px; height:40px">
            <?php else: ?>
                <img src="<?php echo e(asset('public/admin/assets/images/why_choose/no-photo1.jpg')); ?>" alt="" style="width:60px;">
            <?php endif; ?>
        </td>
        <td><?php echo \Illuminate\Support\Str::limit($whychoose->name,40); ?></td>
        <td><?php echo \Illuminate\Support\Str::limit($whychoose->content,60); ?></td>
        <td>
            <?php if($whychoose->status): ?>
                <span class="badge badge-success">Active</span>
            <?php else: ?>
                <span class="badge badge-danger">In-Active</span>
            <?php endif; ?>
        </td>
        <td>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('why_choose-edit')): ?>
                <a href="<?php echo e(route('why_choose.edit', $whychoose->id)); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('why_choose-delete')): ?>
                <a class="btn btn-danger btn-xs delete-btn" data-whychoose-id="<?php echo e($whychoose->id); ?>"><i class="fa fa-trash"></i> Delete</a>
            <?php endif; ?>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td colspan="5">
        Displying <?php echo e($whychooses->count()); ?> of <?php echo e($whychooses->total()); ?> records
        <div class="d-flex justify-content-center">
            <?php echo $whychooses->links('pagination::bootstrap-4'); ?>

        </div>
    </td>
</tr>
<?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/admin/why_choose/search.blade.php ENDPATH**/ ?>