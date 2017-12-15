@extends('admin.includes.layout')

@section('title')
    Add :: Product
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
                @include('admin.includes.breadcrumb_dashboard_link')
                <li>
                    <a href="{{ route('admin.product') }}">Product</a>
                </li>
                <li class="active">Add</li>
            </ul><!-- .breadcrumb -->
        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>
                    Product Manager
                    <small>
                        <i class="icon-double-angle-right"></i>
                        Add Form
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


                    <form class="form-horizontal"  method="post" action="{{route('admin.product.store') }}" enctype="multipart/form-data">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right {{ $errors->has('product_name') ? ' has-error' : '' }}" for="product_name"> Product Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="product_name" value="{{ old('product_name') }}" placeholder="Product Name" class="col-xs-10 col-sm-5">
                                @if ($errors->has('product_name'))
                                    <span class="help-block">
                                        <strong class="errorColor">{{ $errors->first('product_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right {{ $errors->has('vehicle_class') ? ' has-error' : '' }}" for="vehicle_class">Vehicle Class</label>
                            <div class="col-sm-9">
                                <input type="text" name="vehicle_class" value="{{ old('vehicle_class') }}" placeholder="Vehicle Class" class="col-xs-10 col-sm-5">
                                @if ($errors->has('vehicle_class'))
                                    <span class="help-block">
                                        <strong class="errorColor">{{ $errors->first('vehicle_class') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right {{ $errors->has('passenger_seat') ? ' has-error' : '' }}" for="passenger_seat">Passenger</label>
                            <div class="col-sm-9">
                                <input type="text" name="passenger_seat" value="{{ old('passenger_seat') }}"   placeholder="Passanger No" class="col-xs-10 col-sm-5">
                                @if ($errors->has('passenger_seat'))
                                    <span class="help-block">
                                        <strong class="errorColor">{{ $errors->first('passenger_seat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right {{ $errors->has('vehicle_mileage') ? ' has-error' : '' }}" for="vehicle_mileage">Vehicle Mileage</label>
                            <div class="col-sm-9">
                                <input type="text" name="vehicle_mileage" value="{{ old('vehicle_mileage') }}" placeholder="Vehicle Mileage	" class="col-xs-10 col-sm-5">
                                @if ($errors->has('vehicle_mileage'))
                                    <span class="help-block">
                                        <strong class="errorColor">{{ $errors->first('vehicle_mileage') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right {{ $errors->has('range') ? ' has-error' : '' }}" for="range">Range</label>
                            <div class="col-sm-9">
                                <input type="text" name="range" value="{{ old('range') }}"  placeholder="Range" class="col-xs-10 col-sm-5">
                                @if ($errors->has('range'))
                                    <span class="help-block">
                                        <strong class="errorColor">{{ $errors->first('range') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="space-4"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right {{ $errors->has('stock') ? ' has-error' : '' }}" for="stock">Stock</label>
                            <div class="col-sm-9">
                                <input type="text" name="stock" value="{{ old('stock') }}"   placeholder="Stock" class="col-xs-10 col-sm-5">
                                @if ($errors->has('stock'))
                                    <span class="help-block">
                                        <strong class="errorColor">{{ $errors->first('stock') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right {{ $errors->has('transmission') ? ' has-error' : '' }}" for="transmission">Transmission</label>
                            <div class="col-sm-9">
                                <input type="text" name="transmission"  value="{{ old('transmission') }}" placeholder="transmission" class="col-xs-10 col-sm-5">
                                @if ($errors->has('transmission'))
                                    <span class="help-block">
                                        <strong class="errorColor">{{ $errors->first('transmission') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="space-4"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right {{ $errors->has('old_price_per_day') ? ' has-error' : '' }}" for="contact">Price Per Day</label>
                            <div class="col-sm-9">
                                <input type="text" name="old_price_per_day"  value="{{ old('old_price_per_day') }}" placeholder="Old Price Per Day" class="col-xs-10 col-sm-5">
                                @if ($errors->has('old_price_per_day'))
                                    <span class="help-block">
                                        <strong class="errorColor">{{ $errors->first('old_price_per_day') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="space-4"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right {{ $errors->has('new_price_per_day') ? ' has-error' : '' }}" for="new_price_per_day">New Price Per Day</label>
                            <div class="col-sm-9">
                                <input type="text" name="new_price_per_day" value="{{ old('new_price_per_day') }}" placeholder="New Price Per Day" class="col-xs-10 col-sm-5">
                                @if ($errors->has('new_price_per_day'))
                                    <span class="help-block">
                                        <strong class="errorColor">{{ $errors->first('new_price_per_day') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="space-4"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right {{ $errors->has('reservation_delivery_price') ? ' has-error' : '' }}" for="reservation_delivery_price">Reservation Delivery Price</label>
                            <div class="col-sm-9">
                                <input type="text" name="reservation_delivery_price" value="{{ old('reservation_delivery_price') }}" placeholder="Deservation Delivery Price" class="col-xs-10 col-sm-5">
                                @if ($errors->has('reservation_delivery_price'))
                                    <span class="help-block">
                                        <strong class="errorColor">{{ $errors->first('reservation_delivery_price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="space-4"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right {{ $errors->has('discount_rate') ? ' has-error' : '' }}" for="discount_rate">Discount Rate</label>
                            <div class="col-sm-9">
                                <input type="text" name="discount_rate" value="{{ old('discount_rate') }}" placeholder="Discount Rate" class="col-xs-10 col-sm-5">
                                @if ($errors->has('discount_rate'))
                                    <span class="help-block">
                                        <strong class="errorColor">{{ $errors->first('discount_rate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="space-4"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right {{ $errors->has('taxes_fees') ? ' has-error' : '' }}" for="taxes_fees">Taxes Fees</label>
                            <div class="col-sm-9">
                                <input type="text" name="taxes_fees" value="{{ old('taxes_fees') }}" placeholder="Taxes Fees" class="col-xs-10 col-sm-5">
                                @if ($errors->has('taxes_fees'))
                                    <span class="help-block">
                                        <strong class="errorColor">{{ $errors->first('taxes_fees') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="space-4"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right {{ $errors->has('insurance_personal') ? ' has-error' : '' }}" for="insurance_personal">Insurence Personal</label>
                            <div class="col-sm-9">
                                <input type="text" name="insurance_personal" value="{{ old('insurance_personal') }}" placeholder="Insurance Personal" class="col-xs-10 col-sm-5">
                                @if ($errors->has('insurance_personal'))
                                    <span class="help-block">
                                        <strong class="errorColor">{{ $errors->first('insurance_personal') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="space-4"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right {{ $errors->has('insurance_roadside') ? ' has-error' : '' }}" for="insurance_roadside">Insurance Roadside</label>
                            <div class="col-sm-9">
                                <input type="text" name="insurance_roadside" value="{{ old('insurance_roadside') }}" placeholder="Insurance Roadside" class="col-xs-10 col-sm-5">
                                @if ($errors->has('insurance_roadside'))
                                    <span class="help-block">
                                        <strong class="errorColor">{{ $errors->first('insurance_roadside') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="space-4"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right {{ $errors->has('review') ? ' has-error' : '' }}" for="review">Review</label>
                            <div class="col-sm-9">
                                <input type="text" name="review" value="{{ old('review') }}" placeholder="Insurance Roadside" class="col-xs-10 col-sm-5">
                                @if ($errors->has('review'))
                                    <span class="help-block">
                                        <strong class="errorColor">{{ $errors->first('review') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="space-4"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right {{ $errors->has('image') ? ' has-error' : '' }}" for="image">Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" value="{{ old('image') }}" placeholder="Image" class="col-xs-10 col-sm-5 form-control">
                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong class="errorColor">{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right {{ $errors->has('description') ? ' has-error' : '' }}" for="description">Description</label>
                            <div class="col-sm-9">
                                <textarea name="description"  cols="30" rows="10" class="form-control" placeholder="Description">{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong class="errorColor">{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="space-4"></div>


                        <hr>



                        <div class="space-4"></div>
                        <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <button class="btn btn-info" type="submit">
                                    <i class="icon-ok bigger-110"></i>
                                    Create
                                </button>

                                &nbsp; &nbsp; &nbsp;
                                <button class="btn" id="resetButton" type="reset">
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
@section('js')
    <script>
        $(document).ready(function(){
            document.getElementsByTagName('input').value='';

            $("#resetButton").click(function(){
                document.getElementsByTagName('input').value='';
            });
        });
    </script>

    @endsection