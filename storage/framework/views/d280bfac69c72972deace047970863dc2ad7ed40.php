<?php $__currentLoopData = $booked_interviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$interview): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr id="id-<?php echo e($interview->id); ?>">
        <td><?php echo e($booked_interviews->firstItem()+$key); ?>.</td>
        <?php if(Auth::user()->hasRole('Interviewer')): ?>
            <td><?php echo e($interview->hasCandidate->name); ?></td>
        <?php elseif(Auth::user()->hasRole('Candidate')): ?>
            <td><?php echo e($interview->hasInterviewer->name); ?></td>
        <?php else: ?> 
            <td><?php echo e($interview->hasCandidate->name); ?></td>
            <td><?php echo e($interview->hasInterviewer->name); ?></td>
        <?php endif; ?>
        
        <td><?php echo e(\Illuminate\Support\Str::upper($interview->booking_type_slug)); ?></td>
        <td><?php echo e(\Illuminate\Support\Str::upper($interview->interview_type)); ?></td>
        <td><?php echo e($interview->meeting_id); ?></td>
        <td><?php echo e($interview->duration); ?> Minutes</td>
        <td>
            <?php if($interview->status==1): ?>
                <span class="badge badge-info">Confirmed</span>

                <?php if($interview->date<date('Y-m-d')): ?>
                    <span class="badge badge-warning">Expired</span>
                <?php endif; ?>
            <?php elseif($interview->status==2): ?>
                <span class="badge badge-danger">Rejected</span>
            <?php elseif($interview->status==0): ?>
                <span class="badge badge-primary">Pending</span>
            <?php endif; ?>
        </td>
        <td>
            <?php if($interview->status==1): ?>
                <?php if($interview->date >= date('Y-m-d')): ?>
                    <div class="time-slot">
                        <div id="countdown">
                            <span class="badge badge-primary p-2" id="timer-<?php echo e($interview->id); ?>">--</span>
                        </div>
                    </div>
                <?php elseif($interview->date == date('Y-m-d')): ?>
                    <a href="<?php echo e($interview->join_url); ?>">JOIN MEETING</a>
                <?php else: ?> 
                    <span class="badge badge-warning">Expired</span>
                <?php endif; ?>
            <?php elseif($interview->status==0): ?>
                <span class="badge badge-info">Pending</span>
            <?php endif; ?>
        </td>
        <td><?php echo e(date('d, F-Y', strtotime($interview->date))); ?></td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td colspan="9">
        Displying <?php echo e($booked_interviews->firstItem()); ?> to <?php echo e($booked_interviews->lastItem()); ?> of <?php echo e($booked_interviews->total()); ?> records
        <div class="d-flex justify-content-right mt-3">
            <?php echo $booked_interviews->links('pagination::bootstrap-4'); ?>

        </div>
    </td>
</tr><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/web-views/interviews/search.blade.php ENDPATH**/ ?>