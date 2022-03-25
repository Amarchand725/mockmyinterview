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
                <li><a class="nav-link scrollto active" href="#hero">HOME</a></li>
                <li><a class="nav-link scrollto" href="#about">ABOUT</a></li>
                <li><a class="nav-link scrollto" href="#services">ADVANTAGES OF MOCK INTERVIEWS</a></li>
                <li><a class="nav-link scrollto " href="#portfolio">HOW IT WORKS</a></li>
                <li><a class="nav-link scrollto" href="#team">PRICING</a></li>
                <li><a class="nav-link scrollto" href="#teams">TEAMS</a></li>
                <li><a class="nav-link scrollto" href="#contact">CONTACT</a></li>
                <li>
                    <?php if(Auth::check()): ?>
                        <a class="getstarted scrollto" href="<?php echo e(route('dashboard')); ?>">
                            <i class="fa fa-tachometer"></i><span> &nbsp; DASHBOARD</span>
                        </a>
                    <?php else: ?> 
                        <a class="getstarted scrollto" href="<?php echo e(route('login')); ?>">
                            <i class="fa fa-sign-in"></i><span> &nbsp; LOG-IN</span>
                        </a>
                    <?php endif; ?>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/layouts/web/header.blade.php ENDPATH**/ ?>