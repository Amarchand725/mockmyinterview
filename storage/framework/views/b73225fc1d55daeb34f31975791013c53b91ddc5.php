<aside>
    <div class="sidebar left ">
        <ul class="list-sidebar bg-defoult">
            <li>
                <a href="<?php echo e(route('dashboard')); ?>" class="<?php echo e(request()->is('dashboard') ? 'active' : ''); ?>">
                    <i class="fa fa-th-large"></i> <span class="nav-label"> Dashboard </span>
                </a>
            </li>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('schedule interview-list')): ?>
            <li>
                <a href="<?php echo e(route('book-interview')); ?>" class="<?php echo e(request()->is('book-interview') ? 'active' : ''); ?>">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <span class="nav-label">Book Interview</span></a>
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
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('booked interviews-list')): ?>
            <li> <a href="<?php echo e(route('booked-interviews')); ?>" class="<?php echo e(request()->is('booked-interviews') ? 'active' : ''); ?>">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <span class="nav-label">Booked Interviews </span></a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('resources-list')): ?>
            <li>
                <a href="<?php echo e(route('blog-resources')); ?>" class="<?php echo e(request()->is('blog-resources') ? 'active' : ''); ?>">
                    <i class="fa fa-bar-chart-o"></i> <span class="nav-label">Resources</span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('buy & credits-list')): ?>
            <li>
                <a href="<?php echo e(route('buy-credits')); ?>" class="<?php echo e(request()->is('buy-credits') ? 'active' : ''); ?>">
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