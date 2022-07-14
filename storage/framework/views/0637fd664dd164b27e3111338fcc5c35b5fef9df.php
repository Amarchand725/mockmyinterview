<header class="header">
    <nav class="navbar navbar-toggleable-md navbar-light pt-0 pb-0 ">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <?php if($home_page_data['header_logo']): ?>
            <h1 class="logo">
                <a href="<?php echo e(route('dashboard')); ?>"> 
                    <img src="<?php echo e(asset('public/admin/assets/images/page')); ?>/<?php echo e($home_page_data['header_logo']); ?>" style="width: 80px" alt="logo" class="img-fluid">
                </a>
            </h1>
        <?php endif; ?>
        <div class="float-left" style="margin-left:140px !important"> <a href="#" class="button-left"><span class="fa fa-fw fa-bars "></span></a> </div>
        <div class="collapse navbar-collapse flex-row-reverse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                

                <li class="nav-item dropdown  user-menu">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="hidden-xs"><?php echo e(Auth::user()->name); ?></span>
                        <img src="http://via.placeholder.com/160x160" class="user-image" alt="User Image">
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?php echo e(route('my_profile')); ?>">My profile</a>
                        <a class="dropdown-item border-top" href="<?php echo e(route('logout')); ?>"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            <?php echo e(__('Logout')); ?>

                        </a>

                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                            <?php echo csrf_field(); ?>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/web-views/dashboard/master/header.blade.php ENDPATH**/ ?>