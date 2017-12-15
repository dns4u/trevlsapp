@extends('admin.includes.layout')

@section('title')
    List :: Product
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
                    <a href="{{ route('admin.product') }}">Product</a>
                </li>
                <li class="active">List</li>
            </ul><!-- .breadcrumb -->


        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>
                    Product Manager
                    <small>
                        <i class="icon-double-angle-right"></i>
                        List
                    </small>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                   @include('admin.includes.flash_messages')
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>

                                        <th>Product Name</th>
                                        <th>Vehicle Class</th>
                                        <th>
                                            <i class="icon-time bigger-110 hidden-480"></i>
                                            Created At
                                        </th>
                                        <th></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        @if($data['rows']->count() > 0)
                                        @foreach($data['rows'] as $row)
                                            <tr>
                                                <td>
                                                    <a href="#">{{ $row->product_name }}</a>
                                                </td>
                                                <td>{{ $row->vehicle_class}}</td>
                                                <td class="hidden-480">{{ $row->created_at }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a class="btn btn-xs btn-success" href="{{ route('admin.product.show', $row->id) }}">
                                                            <i class="icon-eye-open bigger-120"></i>
                                                        </a>

                                                        <a class="btn btn-xs btn-info" href="{{route('admin.product.edit',$row->id)}}">
                                                            <i class="icon-edit bigger-120"></i>
                                                        </a>

                                                        <a class="btn btn-xs btn-danger" href="{{route('admin.product.delete', $row->id)}}">
                                                            <i class="icon-trash bigger-120"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @else
                                                <tr>
                                                    <td colspan="5">No Data Found</td>
                                                </tr>
                                        @endif
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