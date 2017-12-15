@extends('admin.includes.layout')
@section('title')
   Update::Profile
    @endsection
@section('css')
    <style>
        .errorColor{
            color: #FF0000;
        }
    </style>
@endsection
@section('content')

    <div class="main-content">
        <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
                try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
            </script>

            <ul class="breadcrumb">
                @include('admin.includes.breadcrumb_dashboard_link')<!--Home url render -->
                <li>
                    <a href="{{ route('admin.profile') }}">Profile</a><!-- panel name-->
                </li>
                <li class="active">Update</li><!--subpanel name-->
            </ul><!-- .breadcrumb -->

           <!-- #nav-search -->
        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>
                    Profile Manager
                    <small>
                        <i class="icon-double-angle-right"></i>
                        Update Form
                    </small>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    @if (session()->has('success_message'))
                        <div class="alert alert-block alert-success">
                            <button type="button" class="close" data-dismiss="alert">
                                <i class="icon-remove"></i>
                            </button>

                            <p>
                                <strong>
                                    <i class="icon-ok"></i>
                                    Well done!
                                </strong>
                                {{ session()->get('success_message') }}
                            </p>
                        </div>
                    @endif
                    <form class="form-horizontal" role="form" method="post" action="{{route('admin.profile.update')}}">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right {{ $errors->has('name') ? ' has-error' : '' }}" for="name"> User Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name"  value="{{ old('name',$data['user']->name ) }}"  placeholder="Username" class="col-xs-10 col-sm-5">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong class="errorColor">{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="space-4"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right {{ $errors->has('email') ? ' has-error' : '' }}" for="email">Email</label>
                            <div class="col-sm-9">
                                <input type="email" name="email" value="{{ old('email',$data['user']->email ) }}"   placeholder="Valid email" class="col-xs-10 col-sm-5">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong class="errorColor">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="space-4"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right {{ $errors->has('first_name') ? ' has-error' : '' }}" for="first_name">First Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="first_name" value="{{ old('first_name',$data['user']->first_name ) }}"   placeholder="First Name" class="col-xs-10 col-sm-5">
                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong class="errorColor">{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="space-4"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right {{ $errors->has('middle_name') ? ' has-error' : '' }}" for="middle_name">Middle Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="middle_name" value="{{ old('middle_name',$data['user']->middle_name ) }}"  placeholder="Middle Name" class="col-xs-10 col-sm-5">
                                @if ($errors->has('middle_name'))
                                    <span class="help-block">
                                        <strong class="errorColor">{{ $errors->first('middle_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="space-4"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right {{ $errors->has('last_name') ? ' has-error' : '' }}" for="last_name">Last Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="last_name" value="{{ old('last_name',$data['user']->last_name ) }}"  placeholder="Last Name" class="col-xs-10 col-sm-5">
                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong class="errorColor">{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="space-4"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right {{ $errors->has('contact') ? ' has-error' : '' }}" for="contact">Contact</label>
                            <div class="col-sm-9">
                                <input type="text" name="contact" value="{{ old('contact',$data['user']->contact ) }}"  placeholder="Valid Contact" class="col-xs-10 col-sm-5">
                                @if ($errors->has('contact'))
                                    <span class="help-block">
                                        <strong class="errorColor">{{ $errors->first('contact') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="space-4"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right {{ $errors->has('address') ? ' has-error' : '' }}" for="address">Address</label>
                            <div class="col-sm-9">
                                <textarea type="text" name="address" rows="10" cols="30" class="form-control">{{old('address',$data['user']->address)}}</textarea>
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong class="errorColor">{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="space-4"></div>


                        <hr>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right {{ $errors->has('password') ? ' has-error' : '' }}" for="password"> New Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="password"  class="col-xs-10 col-sm-5">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong class="errorColor">{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="password_confirmation"> Confirm New Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="password_confirmation"  class="col-xs-10 col-sm-5">
                            </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <button class="btn btn-info" type="submit">
                                    <i class="icon-ok bigger-110"></i>
                                    Update Account
                                </button>

                                &nbsp; &nbsp; &nbsp;
                                <button class="btn" type="reset">
                                    <i class="icon-undo bigger-110"></i>
                                    Reset
                                </button>
                            </div>
                        </div>

                    </form>


                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>




    @endsection