@extends('admin.includes.layout')

@section('title')
    List :: Users
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
                <li class="active">List</li>
            </ul><!-- .breadcrumb -->


        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>
                    User Manager
                    <small>
                        <i class="icon-double-angle-right"></i>
                        List
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
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        {{--<th class="center">--}}
                                            {{--<label>--}}
                                                {{--<input type="checkbox" class="ace">--}}
                                                {{--<span class="lbl"></span>--}}
                                            {{--</label>--}}
                                        {{--</th>--}}
                                        <th>Email</th>
                                        <th>Name</th>
                                        <th>
                                            <i class="icon-time bigger-110 hidden-480"></i>
                                            Created At
                                        </th>
                                        <th></th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                        @foreach($data['rows'] as $row)
                                            <tr>
                                                {{--<td class="center">--}}
                                                    {{--<label>--}}
                                                        {{--<input type="checkbox" class="ace">--}}
                                                        {{--<span class="lbl"></span>--}}
                                                    {{--</label>--}}
                                                {{--</td>--}}

                                                <td>
                                                    <a href="#">{{ $row->email }}</a>
                                                </td>
                                                <td>{{ $row->first_name. ' ' . $row->middle_name . ' ' . $row->last_name }}</td>
                                                <td class="hidden-480">{{ $row->created_at }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a class="btn btn-xs btn-success" href="{{ route('admin.user.show', $row->id) }}">
                                                            <i class="icon-eye-open bigger-120"></i>
                                                        </a>

                                                        <a class="btn btn-xs btn-info" href="{{route('admin.user.edit',$row->id)}}">
                                                            <i class="icon-edit bigger-120"></i>
                                                        </a>

                                                        <a class="btn btn-xs btn-danger" href="{{route('admin.user.delete', $row->id)}}">
                                                            <i class="icon-trash bigger-120"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="5">{!! $data['rows']->links() !!}</td>
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