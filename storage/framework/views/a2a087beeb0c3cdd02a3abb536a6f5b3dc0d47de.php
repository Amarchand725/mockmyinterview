

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
                                    <th>Meeting ID</th>
                                    <th>Parent Type</th>
                                    <th>Child Type</th>
                                    <th>Slot</th>
                                    <th>Duration</th>
                                    <th class="col-sm-1">Status</th>
                                    <th>Join URL</th>
                                    <th class="col-sm-1">Date</th>
                                    <th>Action</th>
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
                                        
                                        <td><?php echo e($interview->meeting_id); ?></td>
                                        <td><?php echo e(isset($interview->hasParentInterviewType)?$interview->hasParentInterviewType->name:''); ?></td>
                                        <td><?php echo e(isset($interview->hasChildInterviewType)?$interview->hasChildInterviewType->name:''); ?></td>
                                        <td><?php echo e($interview->slot); ?></td>
                                        <td><?php echo e($interview->duration); ?> Mins</td>
                                        <td>
                                            <?php if($interview->status==1): ?>
                                                <span class="badge badge-info">Confirmed</span>

                                                <?php if($interview->date<date('Y-m-d')): ?>
                                                    <span class="badge badge-warning">Expired</span>
                                                <?php endif; ?>
                                            <?php elseif($interview->status==3): ?>
                                                <span class="badge badge-danger">Rejected</span>
                                            <?php elseif($interview->status==0): ?>
                                                <span class="badge badge-primary">Pending</span>
                                            <?php elseif($interview->status==4): ?>
                                                <span class="badge badge-success">Completed</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($interview->date < date('Y-m-d')): ?>
                                                <span class="badge badge-warning">Expired</span>
                                            <?php else: ?> 
                                                <?php if($interview->status==1): ?>
                                                    <?php if($interview->date > date('Y-m-d')): ?>
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
                                                <?php elseif($interview->status==3): ?>
                                                    <span class="badge badge-danger">Rejected</span>
                                                <?php elseif($interview->status==4): ?>
                                                    <span class="badge badge-success">Completed</span>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e(date('d, F-Y', strtotime($interview->date))); ?></td>
                                        <td>
                                            <?php if(Auth::user()->hasRole('Candidate')): ?>
                                                <select name="" id="booking-status" data-interview-id="<?php echo e($interview->id); ?>" class="form-control" id="">
                                                    <?php if($interview->status==0): ?>
                                                        <option value="0" disabled <?php echo e($interview->status==0?'selected':''); ?>>Pending</option>
                                                        <option value="3" <?php echo e($interview->status==3?'selected':''); ?>>Reject</option>
                                                    <?php elseif($interview->status==1): ?>
                                                        <option value="1" disabled <?php echo e($interview->status==1?'selected':''); ?>>Confirme</option>
                                                    <?php elseif($interview->status==3): ?>
                                                        <option value="3" disabled <?php echo e($interview->status==3?'selected':''); ?>>Reject</option>
                                                    <?php elseif($interview->status==4): ?>
                                                        <option value="4" disabled <?php echo e($interview->status==4?'selected':''); ?>>Complete</option>
                                                    <?php endif; ?>
                                                </select>
                                                <?php if($interview->status==4): ?>
                                                    <button class="btn btn-info mt-2 review-btn" data-interview-id="<?php echo e($interview->id); ?>" data-toggle="tooltip" data-placement="top" title="Review"><i class="fa fa-star"></i> Review</button>
                                                <?php endif; ?>
                                            <?php else: ?> 
                                                <select name="" id="booking-status" data-interview-id="<?php echo e($interview->id); ?>" class="form-control" id="">
                                                    <option value="" selected>Status</option>
                                                    <?php if($interview->status==0): ?>
                                                        <option value="0" disabled <?php echo e($interview->status==0?'selected':''); ?>>Pending</option>
                                                        <option value="1" <?php echo e($interview->status==1?'selected':''); ?>>Confirm</option>
                                                        <option value="3" <?php echo e($interview->status==3?'selected':''); ?>>Reject</option>
                                                    <?php elseif($interview->status==1): ?>
                                                        <option value="4" <?php echo e($interview->status==4?'selected':''); ?>>Complete</option>
                                                    <?php elseif($interview->status==3): ?>
                                                        <option value="3" disabled <?php echo e($interview->status==3?'selected':''); ?>>Reject</option>
                                                    <?php elseif($interview->status==4): ?>
                                                        <option value="4" disabled <?php echo e($interview->status==4?'selected':''); ?>>Complete</option>
                                                    <?php endif; ?>
                                                </select>
                                                <?php if($interview->status==4): ?>
                                                    <a href="<?php echo e(route('book_interview.show', $interview->meeting_id)); ?>" class="btn btn-success mt-2" data-toggle="tooltip" data-placement="top" title="Meeting Recordings">Meeting Recordings</a>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </td>
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

    <!-- Review Modal -->
    <div class="modal fade" id="review-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-star"></i> Review Interview</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo e(route('book_interview.review')); ?>">
                <div class="modal-body">
                    <input type="hidden" name="interview_id" id="interview-id">
                    <div class="form-group">
                        <label for="review" class="control-label">Review Interview <span style='color:red'>*</span></label>
                        <textarea name="review" class="form-control" id="" cols="30" rows="5" maxlength="255" placeholder="Enter review here..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script>
        $(document).on('click', '.review-btn', function(){
            var interview_id = $(this).attr('data-interview-id');
            $('#interview-id').val(interview_id);
            $('#review-modal').modal('show');
        });
        $(document).on('change', '#booking-status', function(){
            var status = $(this).val();
            var interview_id = $(this).attr('data-interview-id');
            if(status!=''){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Do you want to save changes.!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, save it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url : "<?php echo e(route('book_interview.status')); ?>",
                            data : {'status' : status, 'interview_id' : interview_id},
                            type : 'GET',
                            success : function(response){
                                if(response){
                                    Swal.fire(
                                        'Saved!',
                                        'You changes have been saved.',
                                        'success'
                                    )
                                    window.location.reload();
                                }else{
                                    Swal.fire(
                                        'Sorry!',
                                        'Something went wrong.',
                                        'danger'
                                    )
                                }
                            }
                        });
                    }
                })
            }
        });

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