@extends('includes.layout')
@section('title')
    Select vehicle
@endsection
@section('content')
    <section class="rent-body">
        <div class="container">
            <div class="top-bar">
                <h4>
                    2.Select your electric vehicle
                </h4>
                <div class="offer">
                    <div class="row">
                        <div class="col-md-8 offer-text"><h2>Save 25% off your first rental</h2></div>
                        <div class="col-md-4 button-right">
                            <button type="button" class="btn btn-danger in-demand">offer ending soon</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
               @if($data['rows']->count() > 0)
                  @foreach($data['rows'] as $row)
                        <div class="col-md-4">
                            <div class="e-begin-section">
                            <div class="e-begin"> <img class="img-contain" width="315" height="167" src="{{ asset('images/product/'.$row->product_image) }}" alt=""></div>
                            <h2>{{$row->vehicle_class}}</h2>
                            <h3>{{$row->product_name}}</h3>
                            <div class="begin-detail">
                                <div class="row detail-container">
                                    <div class="col-md-5 detail-title"><strong>Reviews</strong> </div>
                                    <div class="col-md-7 detail-list">{{$row->review}} trips <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></div>
                                </div>
                                <div class="row detail-container">
                                    <div class="col-md-6 detail-title"><strong>Passengers</strong> </div>
                                    <div class="col-md-6 detail-list">{{$row->passenger_seat}}</div>
                                </div>
                                <div class="row detail-container">
                                    <div class="col-md-6 detail-title"><strong>Range</strong> </div>
                                    <div class="col-md-6 detail-list">{{$row->range}}</div>
                                </div>
                                <div class="row detail-container">
                                    <div class="col-md-6 detail-title"><strong>Mileage</strong> </div>
                                    <div class="col-md-6 detail-list">{{$row->vehicle_mileage}}</div>
                                </div>
                                <div class="row detail-container">
                                    <div class="col-md-6 detail-title"><strong>Transmission</strong> </div>
                                    <div class="col-md-6 detail-list">{{$row->transmission}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 detail-title">
                                        <button type="button" class="btn btn-danger in-demand">in high demand - {{$row->stock}} in stock</button>
                                    </div>
                                    <div class="col-md-6 detail-list price-cross"> ${{$row->old_price_per_day}}/day</div>
                                    <div class="col-md-12 detail-list price-fine"><sup>$</sup>{{$row->new_price_per_day}}<sup>/day</sup></div>
                                </div>

                                <div class="row reserve-btn">


                                        <a class="btn btn-danger reserve" href="{{route('front.product.review',$row->id)}}">RESERVE {{strtoupper($row->vehicle_class)}}</a>

                                    <p><em>Free cancellations</em></p>
                                </div>
                            </div>
                        </div>
                        </div>
                    @endforeach
                @else
                         <div class="col-md-4">
                        <div class="e-begin-section">
                            <div class="begin-detail">
                                <div class="row detail-container">
                                    <div class="col-md-6 detail-title"><strong>No Result Found</strong> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>



        </div>
    </section>
@endsection
@section('js')

    @endsection