<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
        <?php if($home_page_data['header_logo']): ?>
            <h1 class="logo">
                <a href="<?php echo e(url('/')); ?>"> 
                    <img src="<?php echo e(asset('public/admin/assets/images/page')); ?>/<?php echo e($home_page_data['header_logo']); ?>" alt="logo" class="img-fluid">
                </a>
            </h1>
        <?php endif; ?>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto <?php echo e(request()->is('login') ? 'active' : ''); ?>" href="<?php echo e(route('login')); ?>">LOG IN</a></li>
                <li><a class="nav-link scrollto <?php echo e(request()->is('signup') ? 'active' : ''); ?>" href="<?php echo e(route('signup')); ?>">SIGN-UP</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/layouts/auth/header.blade.php ENDPATH**/ ?>