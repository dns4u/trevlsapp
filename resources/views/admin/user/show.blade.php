@extends('admin.includes.layout')

@section('title')
    Show :: User
    @endsection

@section('content')


    <div class="main-content">
        <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
                try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
            </script>

            <ul class="breadcrumb">
                @include('admin.includes.breadcrumb_dashboard_link')

                <li>
                    <a href="{{ route('admin.user') }}">Users</a>
                </li>
                <li class="active">Show</li>
            </ul><!-- .breadcrumb -->


        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>
                    User Manager
                    <small>
                        <i class="icon-double-angle-right"></i>
                        Details
                    </small>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th  style="width: 20%">Column </th>
                                            <th>Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Id</th>
                                            <td>{{ $data['row']->id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Username</th>
                                            <td>{{ $data['row']->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{ $data['row']->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Name</th>
                                            <td>{{ join(' ', [$data['row']->first_name, $data['row']->middle_name, $data['row']->last_name]) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Contact</th>
                                            <td>{{ $data['row']->contact }}</td>
                                        </tr>
                                        <tr>
                                            <th>Address</th>
                                            <td>{{ $data['row']->address }}</td>
                                        </tr>
                                        <tr>
                                            <th>Created At</th>
                                            <td>{{ $data['row']->created_at }}</td>
                                        </tr>
                                        <tr>
                                            <th>Last Updated At</th>
                                            <td>{{ $data['row']->updated_at }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div><!-- /.table-responsive -->
                        </div><!-- /span -->
                    </div><!-- /row -->

                    <div class="hr hr-18 dotted hr-double"></div>

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>

    @endsection