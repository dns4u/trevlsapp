<div class="navbar navbar-default" id="navbar">
    <script type="text/javascript">
        try{ace.settings.check('navbar' , 'fixed')}catch(e){}
    </script>

    <div class="navbar-container" id="navbar-container">
        <div class="navbar-header pull-left">
            <a href="#" class="navbar-brand">
                <small>
                    {{--<i class="icon-leaf"></i>--}}
                    Trevls Admin
                </small>
            </a><!-- /.brand -->
        </div><!-- /.navbar-header -->

        <div class="navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">

                <li class="light-blue">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo" src="{{asset('ace/assets/avatars/user.jpg')}}" alt="Jason's Photo" />
                        <span class="user-info">
									<small>Welcome,</small>
									{{auth()->user()->name}}
								</span>

                        <i class="icon-caret-down"></i>
                    </a>

                    <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <li>
                            <a href="{{route('admin.profile')}}">
                                <i class="icon-user"></i>
                                Profile
                            </a>
                        </li>

                        <li class="divider"></li>

                        <li>
                            <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit()">
                                <i class="icon-off"></i>
                                Logout
                            </a>

                            <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                                {!! csrf_field() !!}<!--generate hidden field with csrf_token()-->
                            </form>
                        </li>
                    </ul>
                </li>
            </ul><!-- /.ace-nav -->
        </div><!-- /.navbar-header -->
    </div><!-- /.container -->
</div>
