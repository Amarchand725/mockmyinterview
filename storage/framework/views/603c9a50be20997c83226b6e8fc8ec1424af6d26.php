<center>
    <?php if($slot_type=='weekdays'): ?>
        <div class="panel-heading" id="weekdays">
            <label><span class="text-md">&nbsp;<strong>Weekdays</strong> </span></label>
            <input type="checkbox" name="weekdays[]" id="mon" value="Mon" class="text-md"> 
            <label for="mon">Mon</label> 
            <input type="checkbox" name="weekdays[]" id="tues" value="Tue" class="text-md"> 
            <label for="tues">Tue</label> 
            <input type="checkbox" name="weekdays[]" id="wed" value="Wed" class="text-md"> 
            <label for="wed">Wed</label> 
            <input type="checkbox" name="weekdays[]" id="thur" value="Thu" class="text-md"> 
            <label for="thur">Thu</label> 
            <input type="checkbox" name="weekdays[]" id="fri" value="Fri" class="text-md"> 
            <label for="fri">Fri</label> 
        </div>
    <?php else: ?> 
        <div class="panel-heading" id="weekdays">
            <label><span class="text-md">&nbsp;<strong>Weekands</strong> </span></label>
            <input type="checkbox" name="weekdays[]" id="sat" value="sat" class="text-md"> 
            <label for="sat">Sat</label> 
            <input type="checkbox" name="weekdays[]" id="sun" value="sun" class="text-md"> 
            <label for="sun">Sun</label> 
        </div>
    <?php endif; ?>
</center>

<div class="row mt-4 mb-4" style="margin-left:97px">
    <div class="well col-sm-5">
        <div class="py-3">
            <center> <h6>Morning Slots</h6></center>
            <div class="row py-3">
                <?php $__currentLoopData = $slots['morning_slots']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$slot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3">
                        <button type="button" class="mt-3 slot m-slot-btn" data-index="<?php echo e($key); ?>" value="<?php echo e($slot); ?>"><?php echo e($slot); ?></button>
                        <input type="hidden" id="slot-m-<?php echo e($key); ?>" name="mornings[]">
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <div class="well col-sm-5 ml-4">
        <div class=" py-3">
            <center> <h6>Evening Slots</h6></center>
            <div class="row py-3">
                <?php $__currentLoopData = $slots['evening_slots']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$slot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3">
                        <button type="button" class="mt-3 slot e-slot-btn" data-index="<?php echo e($key); ?>" value="<?php echo e($slot); ?>"><?php echo e($slot); ?></button>
                        <input type="hidden" id="slot-e-<?php echo e($key); ?>" name="evenings[]">
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/web-views/interviewer/slots.blade.php ENDPATH**/ ?>