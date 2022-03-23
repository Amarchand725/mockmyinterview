<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="<?php echo e(route('dashboard')); ?>" class="<?php echo e(request()->is('admin/dashboard') || request()->is('admin/profile/*') ? 'active' : ''); ?>">
                    <i class="fa fa-laptop"></i> <span>Dashboard</span>
                </a>
            </li>
            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('page-list')): ?>
            <li class="treeview">
                <a href="<?php echo e(route('page.index')); ?>" class="<?php echo e(request()->is('page') || request()->is('page/*') || request()->is('page_setting/*') ? 'active' : ''); ?>">
                    <i class="fa fa-cog"></i> <span>Settings</span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-list')): ?>
            <li class="treeview">
                <a href="<?php echo e(route('role.index')); ?>" class="<?php echo e(request()->is('role') || request()->is('role/create') || request()->is('role/*/edit') ? 'active' : ''); ?>">
                    <i class="fa fa-picture-o"></i> <span>Roles</span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-list')): ?>
            <li class="treeview">
                <a href="<?php echo e(route('user.index')); ?>" class="<?php echo e(request()->is('user') || request()->is('user/create') || request()->is('user/edit/*') ? 'active' : ''); ?>">
                    <i class="fa fa-picture-o"></i> <span>Users</span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-list')): ?>
            <li class="treeview">
                <a href="<?php echo e(route('permission.index')); ?>" class="<?php echo e(request()->is('permission') || request()->is('permission/create') || request()->is('permission/*/edit') ? 'active' : ''); ?>">
                    <i class="fa fa-picture-o"></i> <span>Permissions</span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('service-list')): ?>
            <li class="treeview">
                <a href="<?php echo e(route('service.index')); ?>" class="<?php echo e(request()->is('service') || request()->is('service/create') || request()->is('service/*/edit') || request()->is('service/*') ? 'active' : ''); ?>">
                    <i class="fa fa-picture-o"></i> <span>Service</span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('slider-list')): ?>
            <li class="treeview">
                <a href="<?php echo e(route('slider.index')); ?>" class="<?php echo e(request()->is('slider') || request()->is('slider/create') || request()->is('slider/*/edit') || request()->is('slider/*') ? 'active' : ''); ?>">
                    <i class="fa fa-picture-o"></i> <span>Slider</span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category-list')): ?>
            <li class="treeview">
                <a href="<?php echo e(route('category.index')); ?>" class="<?php echo e(request()->is('category') || request()->is('category/create') || request()->is('category/*/edit') ? 'active' : ''); ?>">
                    <i class="fa fa-user-plus"></i> <span>Category</span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('blog-list')): ?>
            <li class="treeview">
                <a href="<?php echo e(route('blog.index')); ?>" class="<?php echo e(request()->is('blog') || request()->is('blog/create') || request()->is('blog/*/edit') ? 'active' : ''); ?>">
                    <i class="fa fa-user-plus"></i> <span>Blogs</span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('testimonial-list')): ?>
            <li class="treeview">
                <a href="<?php echo e(route('testimonial.index')); ?>" class="<?php echo e(request()->is('testimonial') || request()->is('testimonial/create') || request()->is('testimonial/*/edit') ? 'active' : ''); ?>">
                    <i class="fa fa-user-plus"></i> <span>Testimonial</span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('advantage-list')): ?>
            <li class="treeview">
                <a href="<?php echo e(route('advantage.index')); ?>" class="<?php echo e(request()->is('advantage') || request()->is('advantage/create') || request()->is('advantage/*/edit') ? 'active' : ''); ?>">
                    <i class="fa fa-user-plus"></i> <span>Mock Advantage</span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('work-process-list')): ?>
            <li class="treeview">
                <a href="<?php echo e(route('work-process.index')); ?>" class="<?php echo e(request()->is('work-process') || request()->is('work-process/create') || request()->is('work-process/*/edit') ? 'active' : ''); ?>">
                    <i class="fa fa-user-plus"></i> <span>Work Process</span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('package-list')): ?>
            <li class="treeview">
                <a href="<?php echo e(route('package.index')); ?>" class="<?php echo e(request()->is('package') || request()->is('package/create') || request()->is('package/*/edit') ? 'active' : ''); ?>">
                    <i class="fa fa-user-plus"></i> <span>Packages</span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('team-list')): ?>
            <li class="treeview">
                <a href="<?php echo e(route('team.index')); ?>" class="<?php echo e(request()->is('team') || request()->is('team/create') || request()->is('team/*/edit') ? 'active' : ''); ?>">
                    <i class="fa fa-user-plus"></i> <span>Team</span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('help-list')): ?>
            <li class="treeview">
                <a href="<?php echo e(route('help.index')); ?>" class="<?php echo e(request()->is('help') || request()->is('help/create') || request()->is('help/*/edit') ? 'active' : ''); ?>">
                    <i class="fa fa-user-plus"></i> <span>Help</span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('why_choose-list')): ?>
            <li class="treeview">
                <a href="<?php echo e(route('why_choose.index')); ?>" class="<?php echo e(request()->is('why_choose') || request()->is('why_choose/create') || request()->is('why_choose/*/edit') ? 'active' : ''); ?>">
                    <i class="fa fa-paper-plane-o"></i> <span>Why Choose Us</span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('social media-list')): ?>
            <li class="treeview">
                <a href="<?php echo e(route('social_media.index')); ?>" class="<?php echo e(request()->is('social_media') || request()->is('social_media/create') || request()->is('social_media/edit/*') ? 'active' : ''); ?>">
                    <i class="fa fa-address-book"></i> <span>Social Media</span>
                </a>
            </li>
            <?php endif; ?>
        </ul>
    </section>
</aside><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/layouts/admin/sidebar.blade.php ENDPATH**/ ?>