<div class="row mt-4 mb-4" style="margin-left:97px">
    <div class="well col-sm-5">
        <div class="py-3">
            <center><h6>Possible Slots</h6></center>
            <div class="row py-3">
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$slot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php 
                        $date_time = $slot['start'];
                        $slot_date = explode(' ', $date_time)[0];
                        $slot_time = date('h:i A', strtotime($date_time));
                    ?> 
                    <input type="hidden" name="date_time" value="<?php echo e($date_time); ?>">
                    <div class="col-md-3">
                        <div class="col-sm-2">
                            <article class="feature1 slot">
                                <input type="checkbox" class="e-slot-btn" name="slot" value="<?php echo e($slot_time); ?>" id="slot-e-<?php echo e($key); ?>"/>
                                <span><?php echo e($slot_time); ?></span>
                            </article>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/web-views/interviewer/slots.blade.php ENDPATH**/ ?>