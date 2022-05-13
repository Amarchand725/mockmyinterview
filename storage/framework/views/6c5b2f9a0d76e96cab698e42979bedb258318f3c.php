<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr id="id-<?php echo e($model->slug); ?>">
        <td><?php echo e($models->firstItem()+$key); ?>.</td>
        <td>
            <?php if($model->banner): ?>
                <img src="<?php echo e(asset('public/admin/assets/coupons/'.$model->banner)); ?>" alt="" style="width:60px;">
            <?php else: ?>
                <img src="<?php echo e(asset('public/admin/assets/images/team/no-photo1.jpg')); ?>" style="width:60px;">
            <?php endif; ?>
        </td>
        <td><?php echo e($model->name); ?></td>
        <td><?php echo e($model->type); ?></td>
        <td><?php echo e($model->coupon_code); ?></td>
        <td><?php echo e($model->discount); ?></td>
        <td><?php echo e($model->start_date); ?> - <?php echo e($model->end_date); ?></td>
        <td><?php echo \Illuminate\Support\Str::limit($model->description,40); ?></td>
        <td>
            <?php if($model->status): ?>
                <span class="badge badge-success">Active</span>
            <?php else: ?>
                <span class="badge badge-danger">In-Active</span>
            <?php endif; ?>
        </td>
        <td>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('coupon-edit')): ?>
                <a href="<?php echo e(route('coupon.edit', $model->slug)); ?>" data-toggle="tooltip" data-placement="top" title="Edit model" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('coupon-delete')): ?>
                <button class="btn btn-danger btn-xs delete" data-slug="<?php echo e($model->slug); ?>" data-del-url="<?php echo e(url('coupon', $model->slug)); ?>"><i class="fa fa-trash"></i> Delete</button>
            <?php endif; ?>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td colspan="10">
        Displying <?php echo e($models->firstItem()); ?> to <?php echo e($models->lastItem()); ?> of <?php echo e($models->total()); ?> records
        <div class="d-flex justify-content-center">
            <?php echo $models->links('pagination::bootstrap-4'); ?>

        </div>
    </td>
</tr><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/admin/coupons/search.blade.php ENDPATH**/ ?>