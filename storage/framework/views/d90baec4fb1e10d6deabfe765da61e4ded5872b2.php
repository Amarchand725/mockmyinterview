
<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
    <input type="hidden" id="page_url" value="<?php echo e(route('degree.index')); ?>">
    <section class="content-header">
        <div class="content-header-left">
            <h1><?php echo e($page_title); ?></h1>
        </div>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('degree-create')): ?>
        <div class="content-header-right">
            <a href="<?php echo e(route('degree.create')); ?>" class="btn btn-primary btn-sm">Add New degree</a>
        </div>
        <?php endif; ?>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <?php if(session('success')): ?>
                    <div class="callout callout-success">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>

                <div class="box box-info">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-1">Search:</div>
                            <div class="d-flex col-sm-6">
                                <input type="text" id="search" class="form-control" placeholder="Search">
                            </div>
                            <div class="d-flex col-sm-5">
                                <select name="" id="status" class="form-control status" style="margin-bottom:5px">
                                    <option value="All" selected>Search by status</option>
                                    <option value="1">Active</option>
                                    <option value="2">In-Active</option>
                                </select>
                            </div>
                        </div>
                        <table id="" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Degree</th>
                                    <th>Description</th>
                                    <th>Created By</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="body">
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
                                                <button class="btn btn-danger btn-xs delete" data-slug="<?php echo e($degree->slug); ?>" data-del-url="<?php echo e(url('degree', $degree->slug)); ?>"><i class="fa fa-trash"></i> Delete</button>
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/admin/degree/index.blade.php ENDPATH**/ ?>