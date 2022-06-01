<aside>
    <div class="sidebar left ">
        <ul class="list-sidebar bg-defoult">
            <li style="border-bottom: 1px solid white;">
                <a href="" class="">
                    <i class="fa fa-user"></i>
                    <span class="nav-label">Logged In: <?php echo e(Auth::user()->roles->pluck('name')[0]); ?>

                        <?php if(Auth::check()): ?>
                            <span class="logged-in">●</span>
                        <?php else: ?>
                            <span class="logged-out">●</span>
                        <?php endif; ?>
                    </span>
                </a>
            </li>
            <li style="margin-top:4px">
                <a href="<?php echo e(route('dashboard')); ?>" class="<?php echo e(request()->is('dashboard') ? 'active' : ''); ?>">
                    <i class="fa fa-th-large"></i> <span class="nav-label"> Dashboard </span>
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('book_interview.index')); ?>" class="<?php echo e(request()->is('book_interview') ? 'active' : ''); ?>">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <span class="nav-label">Booked Interviews</span></a>
            </li>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('book interview-list')): ?>
            <li>
                <a href="<?php echo e(route('book_interview.create')); ?>" class="<?php echo e(request()->is('book_interview/*') ? 'active' : ''); ?>">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <span class="nav-label">Book Interview</span></a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('schedule interview-list')): ?>
            <li>
                <a href="<?php echo e(route('schedule-interview')); ?>" class="<?php echo e(request()->is('schedule-interview') ? 'active' : ''); ?>">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <span class="nav-label">Schedule Interview</span></a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('report-list')): ?>
            <li>
                <a href="<?php echo e(route('report')); ?>" class="<?php echo e(request()->is('report') ? 'active' : ''); ?>">
                    <i class="fa fa-bar-chart-o"></i> <span class="nav-label">Reports</span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('test setup-list')): ?>
            <li>
                <a href="<?php echo e(route('test_setup')); ?>" class="<?php echo e(request()->is('test_setup') ? 'active' : ''); ?>">
                    <i class="fa fa-laptop"></i> <span class="nav-label">Test My setup</span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('notifications-list')): ?>
            <li>
                <a href="<?php echo e(route('notifications')); ?>" class="<?php echo e(request()->is('notifications') ? 'active' : ''); ?>">
                    <i class="fa fa-bell" aria-hidden="true"></i>
                    <span class="nav-label">Notifications</span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('resources-list')): ?>
            <li>
                <a href="<?php echo e(route('blog.index')); ?>" class="<?php echo e(request()->is('blog') ? 'active' : ''); ?>">
                    <i class="fa fa-bar-chart-o"></i> <span class="nav-label">Resources</span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('buy & credits-list')): ?>
            <li>
                <a href="<?php echo e(route('wallet.create')); ?>" class="<?php echo e(request()->is('wallet/create') ? 'active' : ''); ?>">
                    <i class="fa fa-bar-chart-o"></i> <span class="nav-label">Buy Credits</span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('refer & earn-list')): ?>
            <li>
                <a href="<?php echo e(route('refer_and_earn')); ?>" class="<?php echo e(request()->is('refer_and_earn') ? 'active' : ''); ?>">
                    <i class="fa fa-bell" aria-hidden="true"></i>
                    <span class="nav-label">Refer and Earn</span>
                </a>
            </li>
            <?php endif; ?>
            <li>
                <a href="<?php echo e(route('my_profile')); ?>" class="<?php echo e(request()->is('my_profile') ? 'active' : ''); ?>">
                    <i class="fa fa-user"></i>
                    </i> <span class="nav-label">My Profile</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
<?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/web-views/dashboard/master/sidebar.blade.php ENDPATH**/ ?>