

<?php $__env->startSection('title', $page_title); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid py-3 ">
        <div class="row mx-auto">
            <h2 class="mb-3">Booked Interviews </h2>
            <div class="container pt-5">
                <div class="row">
                    <div class="col-sm-6 ">
                        <select class="form-select" id="interview_type" name="interview_type" aria-label="Default select example">
                            <option value="All" selected>Search by interview type</option>
                            <option value="hr">HR</option>
                            <option value="technical">TECHNICAL</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <div class="input-group rounded">
                            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                            <span class="input-group-text border-0" id="search-addon">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- scheduling code -->
            <div class="container pt-5">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered resource_tb">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Condidate</th>
                                    <th>Priority</th>
                                    <th>Interview Type</th>
                                    <th>Meeting ID</th>
                                    <th>Duration</th>
                                    <th>Join URL</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $booked_interviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$interview): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr id="id-<?php echo e($interview->id); ?>">
                                        <td><?php echo e($booked_interviews->firstItem()+$key); ?>.</td>
                                        <td><?php echo e($interview->hasCandidate->name); ?></td>
                                        <td><?php echo e(\Illuminate\Support\Str::upper($interview->booking_type_slug)); ?></td>
                                        <td><?php echo e(\Illuminate\Support\Str::upper($interview->interview_type)); ?></td>
                                        <td><?php echo e($interview->meeting_id); ?></td>
                                        <td><?php echo e($interview->duration); ?> Minutes</td>
                                        <td>
                                            <a href="<?php echo e($interview->join_url); ?>">JOIN Meeting</a>
                                        </td>
                                        <td><?php echo e(date('d, F-Y', strtotime($interview->date))); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                        <div class="card-footer p-3">
                            Displying <?php echo e($booked_interviews->firstItem()); ?> to <?php echo e($booked_interviews->lastItem()); ?> of <?php echo e($booked_interviews->total()); ?> records
                            <div class="d-flex justify-content-right mt-3">
                                <?php echo $booked_interviews->links('pagination::bootstrap-4'); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('web-views.dashboard.master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/web-views/interviews/index.blade.php ENDPATH**/ ?>