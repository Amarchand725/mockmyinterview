<?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr id="id-<?php echo e($language->slug); ?>">
        <td><?php echo e($languages->firstItem()+$key); ?>.</td>
        <td><?php echo e($language->title); ?></td>
        <td><?php echo e($language->code); ?></td>
        <td><?php echo $language->description; ?></td>
        <td>
            <?php if($language->status): ?>
                <span class="badge badge-success">Active</span>
            <?php else: ?>
                <span class="badge badge-danger">In-Active</span>
            <?php endif; ?>
        </td>
        <td>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('language-edit')): ?>
                <a class="btn btn-primary btn-xs" href="<?php echo e(route('language.edit', $language->slug)); ?>"><i class="fa fa-edit"></i> Edit</a>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('language-delete')): ?>
                <button class="btn btn-danger btn-xs delete" data-language-slug="<?php echo e($language->slug); ?>"><i class="fa fa-trash"></i> Delete</button>
            <?php endif; ?>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td colspan="6">
        Displying <?php echo e($languages->count()); ?> of <?php echo e($languages->total()); ?> records
        <div class="d-flex justify-content-center">
            <?php echo $languages->links('pagination::bootstrap-4'); ?>

        </div>
    </td>
</tr>
<?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/admin/language/search.blade.php ENDPATH**/ ?>