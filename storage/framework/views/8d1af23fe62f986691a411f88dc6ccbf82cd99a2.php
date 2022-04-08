<div class="row" id="slotsInDate">
    <div class="col-md-2 available-date ng-binding" id="slotDate">
       <span id="first_date"><?php echo e(date('d M Y', strtotime($current_date))); ?></span>
    </div>
    <div class="col-md-10">
      <div class="row">
         <?php 
         $date = date('Y-m-d', strtotime($current_date));
         $day = date("D", strtotime($date));
         ?>
         <?php if($day == 'Sat' || $day == 'Sun'): ?>
             <?php $__currentLoopData = $slots['weekends_slots']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $weekend_slot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <div class="col-sm-2">
                     <button class="mt-3 slot"><?php echo e($weekday_slot); ?></button>
                 </div>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <?php else: ?>
             <?php $__currentLoopData = $slots['weekdays_slots']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $weekday_slot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <div class="col-sm-2">
                     <button class="mt-3 slot"><?php echo e($weekday_slot); ?></button>
                 </div>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <?php endif; ?>
      </div>
    </div>
 </div>
 <hr />
 <div class="row" id="slotsInDate">
     <div class="col-md-2 available-date ng-binding" id="slotDate">
        <span id="second_date"><?php echo e(date('d M Y', strtotime($date. "+1 day"))); ?></span>
     </div>
     <div class="col-md-10">
         <div class="row">
            <?php 
            $date = date('d M Y', strtotime($date. "+1 day"));
            $day = date("D", strtotime($date));
            ?>
            <?php if($day == 'Sat' || $day == 'Sun'): ?>
                <?php $__currentLoopData = $slots['weekends_slots']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $weekend_slot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-sm-2">
                        <button class="mt-3 slot"><?php echo e($weekend_slot); ?></button>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <?php $__currentLoopData = $slots['weekdays_slots']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $weekday_slot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-sm-2">
                        <button class="mt-3 slot"><?php echo e($weekday_slot); ?></button>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
         </div>
     </div>
 </div><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/web-views/candidate/next-pre-slots.blade.php ENDPATH**/ ?>