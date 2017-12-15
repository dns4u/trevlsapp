<div class="sidebar" id="sidebar">
    <script type="text/javascript">
        try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
    </script>

    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
                <i class="icon-signal"></i>
            </button>

            <button class="btn btn-info">
                <i class="icon-pencil"></i>
            </button>

            <button class="btn btn-warning">
                <i class="icon-group"></i>
            </button>

            <button class="btn btn-danger">
                <i class="icon-cogs"></i>
            </button>
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div><!-- #sidebar-shortcuts -->

    <ul class="nav nav-list">
        <li {!! request()->is('admin/dashboard')?'class="active" ':'' !!}>
            <a href="{{route('admin.dashboard')}}">
                <i class="icon-dashboard"></i>
                <span class="menu-text"> Dashboard </span>
            </a>
        </li>

        <li {!! request()->is('admin/user*')?'class="active"':'' !!}>
            <a href="#" class="dropdown-toggle">
                <i class="icon-user"></i>
                <span class="menu-text"> User </span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li {!! request()->is('admin/user')?'class="active"':'' !!}>
                    <a href="{{ route('admin.user') }}">
                        <i class="icon-double-angle-right"></i>
                        List
                    </a>
                </li>

                <li {!! request()->is('admin/user/create')?'class="active"':'' !!}>
                    <a href="{{ route('admin.user.create') }}">
                        <i class="icon-double-angle-right"></i>
                        Add
                    </a>
                </li>

            </ul>
        </li>
        <li {!! request()->is('admin/product*')?'class="active"':'' !!}>
            <a href="#" class="dropdown-toggle">
                <i class="icon-briefcase"></i>
                <span class="menu-text">Product</span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li {!! request()->is('admin/product')?'class="active"':'' !!}>
                    <a href="{{ route('admin.product') }}">
                        <i class="icon-double-angle-right"></i>
                        List
                    </a>
                </li>

                <li {!! request()->is('admin/product/create')?'class="active"':'' !!}>
                    <a href="{{ route('admin.product.create') }}">
                        <i class="icon-double-angle-right"></i>
                        Add
                    </a>
                </li>

            </ul>
        </li>
        <li {!! request()->is('admin/order*')?'class="active"':'' !!}>
            <a href="#" class="dropdown-toggle">
                <i class="icon-shopping-cart"></i>
                <span class="menu-text">Order</span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li {!! request()->is('admin/order')?'class="active"':'' !!}>
                    <a href="{{ route('admin.order') }}">
                        <i class="icon-double-angle-right"></i>
                        List
                    </a>
                </li>
            </ul>
        </li>


    </ul><!-- /.nav-list -->

    <div class="sidebar-collapse" id="sidebar-collapse">
        <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
    </div>

    <script type="text/javascript">
        try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
    </script>
</div>
