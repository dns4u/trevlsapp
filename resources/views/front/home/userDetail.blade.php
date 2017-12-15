@extends('includes.layout')
@section('title')
    User Details
    @endsection
@section('css')
    <style>
        .errorColor{
            color: #FF0000;
        }
    </style>
    @endsection
@section('content')
    <section class="details-container">
        <div class="container">
            <h4>
                4. Enter your details
            </h4>
            <div class="row">
                <div class="col-md-8">
                    <form action="{{route('front.product.userdetail.send',$data['row']->id)}}" method="post">
                        {{csrf_field()}}
                        <div class="heading-driver">
                            <div class="row">
                                <div class="col-md-12"><h3>Passenger Information</h3></div>
                                <div class="col-md-3"><h4></h4>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="firstName">First Name</label>
                                    <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control" id="firstName">
                                    @if ($errors->has('first_name'))
                                        <span class="help-block errorColor">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="lasttName">Last Name</label>
                                    <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control" id="lastName">
                                    @if ($errors->has('last_name'))
                                        <span class="help-block errorColor">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="email">Email Address</label>
                                    <input type="text" name="email" value="{{ old('email') }}" class="form-control" id="email">
                                    @if ($errors->has('email'))
                                        <span class="help-block errorColor">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="PhoneNumber">Phone Number</label>
                                    <input name="phone" type="text" value="{{ old('phone') }}" class="form-control" id="phoneNumber">
                                    @if ($errors->has('phone'))
                                        <span class="help-block errorColor">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" value="{{ old('address') }}" class="form-control" id="address">
                                    @if ($errors->has('address'))
                                        <span class="help-block errorColor">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-default reserve-btn">REVIEW YOUR ORDER</button>
                    </form>
                </div>
                <div class="col-md-4">
                    <div class="rebel-member">
                        <img class="img-responsive" src="{{asset('images/rebel/rebel-member.jpg')}}">
                        <h3>Are you a Rebel Member?</h3>
                        <p>Join the exclusive loyalty membership card that offers 10% off all resevations for an entire year
                            and a 15%, discount on our retail merchandise. Add to purchase
                            for $100 or use Card number in Promo Code to redeem savings.</p>

                        <button type="button" class="btn btn-default reserve-btn">ADD TO CART</button>

                    </div>
                </div>
            </div>

        </div>
    </section>
    @endsection