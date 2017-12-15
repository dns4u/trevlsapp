@extends('admin.includes.layout')

@section('title')
    Show :: Product
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
                <li class="active">Show</li>
            </ul><!-- .breadcrumb -->


        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>
                    Product Manager
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
                                            <th>Product Name</th>
                                            <td>{{ $data['row']->product_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Vehicle Class</th>
                                            <td>{{ $data['row']->vehicle_class }}</td>
                                        </tr>
                                        <tr>
                                            <th>Passanger No</th>
                                            <td>{{$data['row']->passenger_seat}}</td>
                                        </tr>
                                        <tr>
                                            <th>Vehicle Mileage</th>
                                            <td>{{ $data['row']->vehicle_mileage }}</td>
                                        </tr>
                                        <tr>
                                            <th>Range</th>
                                            <td>{{ $data['row']->range }}</td>
                                        </tr>
                                        <tr>
                                            <th>Transmission</th>
                                            <td>{{ $data['row']->transmission }}</td>
                                        </tr>
                                        <tr>
                                            <th>Stock</th>
                                            <td>{{ $data['row']->stock }}</td>
                                        </tr>
                                        <tr>
                                            <th>Old Price Per Day</th>
                                            <td>{{ $data['row']->old_price_per_day }}</td>
                                        </tr>
                                        <tr>
                                            <th>New Price Per Day</th>
                                            <td>{{ $data['row']->new_price_per_day }}</td>
                                        </tr>
                                        <tr>
                                            <th>Reservation Delivery Price</th>
                                            <td>{{ $data['row']->reservation_delivery_price }}</td>
                                        </tr>
                                        <tr>
                                            <th>Discount Rate</th>
                                            <td>{{ $data['row']->discount_rate }}</td>
                                        </tr>
                                        <tr>
                                            <th>Taxes Fees</th>
                                            <td>{{ $data['row']->taxes_fees }}</td>
                                        </tr>
                                        <tr>
                                            <th>Insurence Personal</th>
                                            <td>{{ $data['row']->insurance_personal }}</td>
                                        </tr>
                                        <tr>
                                            <th>Insurance Roadside</th>
                                            <td>{{ $data['row']->insurance_roadside }}</td>
                                        </tr>
                                        <tr>
                                            <th>Review</th>
                                            <td>{{ $data['row']->review }}</td>
                                        </tr>
                                        <tr>
                                            <th>Description</th>
                                            <td>{{ $data['row']->description }}</td>
                                        </tr>
                                        <tr>
                                            <th>Product Image</th>
                                            <td>
                                                <img width="200" src="{{ asset('images/product/'.$data['row']->product_image) }}" alt="">
                                            </td>
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