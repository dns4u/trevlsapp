@extends('admin.auth.layout')
@section('title')
    Login Page
    @endsection
@section('content')
<div class="main-content">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="login-container">
                <div class="center">
                    <h1>
                        {{--<i class="icon-leaf green"></i>--}}
                        <span class="red">Trevls</span>
                        <span class="white">Application</span>
                    </h1>
                    <h4 class="blue">&copy; Trevls Inc</h4>
                </div>

                <div class="space-6"></div>

                <div class="position-relative">
                    <div id="login-box" class="login-box visible widget-box no-border">
                        <div class="widget-body">
                            <div class="widget-main">
                                <h4 class="header blue lighter bigger">
                                    <i class="icon-coffee green"></i>
                                    Please Enter Your Information
                                </h4>

                                <div class="space-6"></div>

                                <form method="POST" action="{{ route('login') }}">
                                    {{ csrf_field() }}
                                    <fieldset>
                                        <label class="block clearfix {{ $errors->has('email') ? ' has-error' : '' }}">
                                            <span class="block input-icon input-icon-right">
                                                <input type="text" class="form-control"
                                                       name="email" placeholder="Email" value="{{ old('email') }}"/>
                                                <i class="icon-envelope"></i>

                                            </span>
                                            @if ($errors->has('email'))
                                                  <span class="help-block">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                 </span>
                                                @endif
                                        </label>

                                        <label class="block clearfix {{ $errors->has('password') ? ' has-error' : '' }}">
                                            <span class="block input-icon input-icon-right">
                                                <input type="password" class="form-control"
                                                  name="password"     placeholder="Password" />
                                                <i class="icon-lock"></i>
                                            </span>
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                  <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </label>

                                        <div class="space"></div>

                                        <div class="clearfix">
                                            <label class="inline">
                                                <input type="checkbox" class="ace" name="remember" {{ old('remember') ? 'checked' : '' }} />
                                                <span class="lbl"> Remember Me</span>
                                            </label>
                                            <button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
                                                <i class="icon-key"></i>
                                                Login
                                            </button>
                                        </div>

                                        <div class="space-4"></div>
                                    </fieldset>
                                </form>


                            </div><!-- /widget-main -->


                        </div><!-- /widget-body -->
                    </div><!-- /login-box -->
                </div><!-- /position-relative -->
            </div>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div>
    @endsection