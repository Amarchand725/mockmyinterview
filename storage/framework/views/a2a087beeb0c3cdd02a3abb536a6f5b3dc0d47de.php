

<?php $__env->startSection('title', $page_title); ?>

<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <input type="hidden" id="page_url" value="<?php echo e(route('book_interview.index')); ?>">
    <div class="container-fluid py-3 ">
        <div class="row mx-auto">
            <h2 class="mb-3">Booked Interviews </h2>
            <div class="container pt-5">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="input-group rounded">
                            <input type="search" class="form-control rounded" id="search" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                            <input type="hidden" id="status" value="All">
                        </div>
                    </div>
                </div>
            </div>

            <!-- scheduling code -->
            <div class="container pt-5">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered pl-0">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <?php if(Auth::user()->hasRole('Interviewer')): ?>
                                        <th>Condidate</th>
                                    <?php elseif(Auth::user()->hasRole('Candidate')): ?>
                                        <th>Interviewer</th>
                                    <?php else: ?> 
                                        <th>Condidate</th>
                                        <th>Interviewer</th>
                                    <?php endif; ?>
                                    <th>Priority</th>
                                    <th>Interview Type</th>
                                    <th>Meeting ID</th>
                                    <th>Duration</th>
                                    <th>Status</th>
                                    <th>Join URL</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody id="body">
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
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<script>
        $(document).ready(function(){
            $.ajax({
                url : "<?php echo e(route('get_booked_interview_ids')); ?>",
                type : 'GET',
                success : function(response){
                    jQuery.each(response, function(index, item) {
                        timer(item.id, item.start_at);
                    });
                }
            });
        });
        function timer(id, start_at){
            // Set the date we're counting down to
            var countDownDate = new Date(start_at).getTime();
            // Update the count down every 1 second
            var x = setInterval(function() {
                // Get today's date and time
                var now = new Date().getTime();
                // Find the distance between now and the count down date
                var distance = countDownDate - now;
                
                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                // Output the result in an element with id="demo"
                var date_time = document.getElementById('timer-'+id);

                if(date_time!=null){
                    var full_timer = days+'d '+hours+' : '+minutes+' : '+seconds
                    if(distance<=0){
                        full_timer = 'Expired';
                    }
                    document.getElementById('timer-'+id).innerHTML=full_timer;
                }
            }, 1000);
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('web-views.dashboard.master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/web-views/interviews/index.blade.php ENDPATH**/ ?>