<?php $__currentLoopData = $degrees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$degree): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr id="id-<?php echo e($degree->slug); ?>">
        <td><?php echo e($degrees->firstItem()+$key); ?>.</td>
        <td><?php echo \Illuminate\Support\Str::limit($degree->title,40); ?></td>
        <td><?php echo \Illuminate\Support\Str::limit($degree->description,60); ?></td>
        <td><?php echo isset($degree->hasCreatedBy)?$degree->hasCreatedBy->name:'N/A'; ?></td>
        <td>
            <?php if($degree->status): ?>
                <span class="badge badge-success">Active</span>
            <?php else: ?>
                <span class="badge badge-danger">In-Active</span>
            <?php endif; ?>
        </td>
        <td>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('degree-edit')): ?>
                <a class="btn btn-primary btn-xs" href="<?php echo e(route('degree.edit', $degree->slug)); ?>"><i class="fa fa-edit"></i> Edit</a>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('degree-delete')): ?>
                <button class="btn btn-danger btn-xs delete" data-degree-slug="<?php echo e($degree->slug); ?>"><i class="fa fa-trash"></i> Delete</button>
            <?php endif; ?>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td colspan="6">
        Displying <?php echo e($degrees->firstItem()); ?> to <?php echo e($degrees->lastItem()); ?> of <?php echo e($degrees->total()); ?> records
        <div class="d-flex justify-content-center">
            <?php echo $degrees->links('pagination::bootstrap-4'); ?>

        </div>
    </td>
</tr>
<?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/admin/degree/search.blade.php ENDPATH**/ ?>