<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="{{ route('dashboard') }}" class="{{ request()->is('admin/dashboard') || request()->is('admin/profile/*') ? 'active' : '' }}">
                    <i class="fa fa-laptop"></i> <span>Dashboard</span>
                </a>
            </li>
            {{-- @can('setting-list')
            <li class="treeview">
                <a href="{{ route('setting.index') }}" class="{{ request()->is('setting') || request()->is('setting/*') ? 'active' : '' }}">
                    <i class="fa fa-cog"></i> <span>Settings</span>
                </a>
            </li>
            @endcan --}}
            @can('page-list')
            <li class="treeview">
                <a href="{{ route('page.index') }}" class="{{ request()->is('page') || request()->is('page/*') || request()->is('page_setting/*') ? 'active' : '' }}">
                    <i class="fa fa-cog"></i> <span>Settings</span>
                </a>
            </li>
            @endcan
            @can('role-list')
            <li class="treeview">
                <a href="{{ route('role.index') }}" class="{{ request()->is('role') || request()->is('role/create') || request()->is('role/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-picture-o"></i> <span>Roles</span>
                </a>
            </li>
            @endcan
            @can('user-list')
            <li class="treeview">
                <a href="{{ route('user.index') }}" class="{{ request()->is('user') || request()->is('user/create') || request()->is('user/edit/*') ? 'active' : '' }}">
                    <i class="fa fa-picture-o"></i> <span>Users</span>
                </a>
            </li>
            @endcan
            @can('permission-list')
            <li class="treeview">
                <a href="{{ route('permission.index') }}" class="{{ request()->is('permission') || request()->is('permission/create') || request()->is('permission/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-picture-o"></i> <span>Permissions</span>
                </a>
            </li>
            @endcan
            @can('service-list')
            <li class="treeview">
                <a href="{{ route('service.index') }}" class="{{ request()->is('service') || request()->is('service/create') || request()->is('service/*/edit') || request()->is('service/*') ? 'active' : '' }}">
                    <i class="fa fa-picture-o"></i> <span>Service</span>
                </a>
            </li>
            @endcan
            @can('slider-list')
            <li class="treeview">
                <a href="{{ route('slider.index') }}" class="{{ request()->is('slider') || request()->is('slider/create') || request()->is('slider/*/edit') || request()->is('slider/*') ? 'active' : '' }}">
                    <i class="fa fa-picture-o"></i> <span>Slider</span>
                </a>
            </li>
            @endcan
            @can('category-list')
            <li class="treeview">
                <a href="{{ route('category.index') }}" class="{{ request()->is('category') || request()->is('category/create') || request()->is('category/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-user-plus"></i> <span>Category</span>
                </a>
            </li>
            @endcan
            @can('blog-list')
            <li class="treeview">
                <a href="{{ route('blog.index') }}" class="{{ request()->is('blog') || request()->is('blog/create') || request()->is('blog/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-user-plus"></i> <span>Blogs</span>
                </a>
            </li>
            @endcan
            @can('testimonial-list')
            <li class="treeview">
                <a href="{{ route('testimonial.index') }}" class="{{ request()->is('testimonial') || request()->is('testimonial/create') || request()->is('testimonial/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-user-plus"></i> <span>Testimonial</span>
                </a>
            </li>
            @endcan
            @can('advantage-list')
            <li class="treeview">
                <a href="{{ route('advantage.index') }}" class="{{ request()->is('advantage') || request()->is('advantage/create') || request()->is('advantage/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-user-plus"></i> <span>Mock Advantage</span>
                </a>
            </li>
            @endcan
            @can('work-process-list')
            <li class="treeview">
                <a href="{{ route('work-process.index') }}" class="{{ request()->is('work-process') || request()->is('work-process/create') || request()->is('work-process/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-user-plus"></i> <span>Work Process</span>
                </a>
            </li>
            @endcan
            @can('package-list')
            <li class="treeview">
                <a href="{{ route('package.index') }}" class="{{ request()->is('package') || request()->is('package/create') || request()->is('package/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-user-plus"></i> <span>Packages</span>
                </a>
            </li>
            @endcan
            @can('team-list')
            <li class="treeview">
                <a href="{{ route('team.index') }}" class="{{ request()->is('team') || request()->is('team/create') || request()->is('team/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-user-plus"></i> <span>Team</span>
                </a>
            </li>
            @endcan
            @can('help-list')
            <li class="treeview">
                <a href="{{ route('help.index') }}" class="{{ request()->is('help') || request()->is('help/create') || request()->is('help/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-user-plus"></i> <span>Help</span>
                </a>
            </li>
            @endcan
            @can('why_choose-list')
            <li class="treeview">
                <a href="{{ route('why_choose.index') }}" class="{{ request()->is('why_choose') || request()->is('why_choose/create') || request()->is('why_choose/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-paper-plane-o"></i> <span>Why Choose Us</span>
                </a>
            </li>
            @endcan
            @can('social media-list')
            <li class="treeview">
                <a href="{{ route('social_media.index') }}" class="{{ request()->is('social_media') || request()->is('social_media/create') || request()->is('social_media/edit/*') ? 'active' : '' }}">
                    <i class="fa fa-address-book"></i> <span>Social Media</span>
                </a>
            </li>
            @endcan
        </ul>
    </section>
</aside>