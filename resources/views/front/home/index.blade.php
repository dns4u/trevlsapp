@extends('includes.layout')
@section('title')
    Home
    @endsection
@section('css')
    <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic);
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-font-smoothing: antialiased;
            -moz-font-smoothing: antialiased;
            -o-font-smoothing: antialiased;
            font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
        }

        body {
            font-family: "Roboto", Helvetica, Arial, sans-serif;
            font-weight: 100;
            font-size: 12px;
            line-height: 30px;
            color: #777;
            /*background: #4CAF50;*/
            background: #00adb5 !important;
        }

        .container {
            max-width: 400px;
            width: 100%;
            margin: 0 auto;
            position: relative;
        }

        #contact input[type="text"],
        #contact input[type="email"],
        #contact input[type="tel"],
        #contact input[type="url"],
        #contact textarea,
        #contact button[type="submit"] {
            font: 400 12px/16px "Roboto", Helvetica, Arial, sans-serif;
        }

        #contact {
            background: #F9F9F9;
            padding: 25px;
            margin: 150px 0;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }

        #contact h3 {
            display: block;
            font-size: 30px;
            font-weight: 300;
            margin-bottom: 10px;
        }

        #contact h4 {
            margin: 5px 0 15px;
            display: block;
            font-size: 13px;
            font-weight: 400;
        }

        fieldset {
            border: medium none !important;
            margin: 0 0 10px;
            min-width: 100%;
            padding: 0;
            width: 100%;
        }

        #contact input[type="text"],
        #contact input[type="email"],
        #contact input[type="tel"],
        #contact input[type="url"],
        #container select
        #contact textarea {
            width: 100%;
            border: 1px solid #ccc;
            background: #FFF;
            margin: 0 0 5px;
            padding: 10px;
        }

        #contact input[type="text"]:hover,
        #contact input[type="email"]:hover,
        #contact input[type="tel"]:hover,
        #contact input[type="url"]:hover,
        #contact textarea:hover {
            -webkit-transition: border-color 0.3s ease-in-out;
            -moz-transition: border-color 0.3s ease-in-out;
            transition: border-color 0.3s ease-in-out;
            border: 1px solid #aaa;
        }

        #contact textarea {
            height: 100px;
            max-width: 100%;
            resize: none;
        }

        #contact button[type="submit"] {
            cursor: pointer;
            width: 100%;
            border: none;
            /*background: #4CAF50;*/
            background: #00adb5 !important;
            color: #FFF;
            margin: 0 0 5px;
            padding: 10px;
            font-size: 15px;
        }

        #contact button[type="submit"]:hover {
            background: #43A047;
            -webkit-transition: background 0.3s ease-in-out;
            -moz-transition: background 0.3s ease-in-out;
            transition: background-color 0.3s ease-in-out;
        }

        #contact button[type="submit"]:active {
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
        }

        .copyright {
            text-align: center;
        }

        #contact input:focus,
        #contact textarea:focus {
            outline: 0;
            border: 1px solid #aaa;
        }

        ::-webkit-input-placeholder {
            color: #888;
        }

        :-moz-placeholder {
            color: #888;
        }

        ::-moz-placeholder {
            color: #888;
        }

        :-ms-input-placeholder {
            color: #888;
        }
        .errorColor{
            color: #FF0000;
        }
    </style>
    @endsection
@section('content')
    <div class="container">
        @include('includes.flash_messages_front')
        <form id="contact" action="{{route('front.product.store')}}" method="post">
            <h3>Reserve Vehicle</h3>
            {{csrf_field()}}
            <fieldset>
                <input id="pickUpAddress" name="dropoffAddress" value="{{old('dropoffAddress')}}" placeholder="Enter Dropoff Locatin" type="text" tabindex="1"  autofocus>
                @if ($errors->has('dropoffAddress'))
                    <span class="help-block errorColor">
                        <strong>{{ $errors->first('dropoffAddress') }}</strong>
                    </span>
                @endif
            </fieldset>
            <fieldset>
                <input id="dropoffAddress" value="{{old('returnAddress')}}" name="returnAddress" placeholder="Enter Return Locatin" type="text" tabindex="1"  autofocus>
                @if ($errors->has('returnAddress'))
                    <span class="help-block errorColor">
                        <strong>{{ $errors->first('returnAddress') }}</strong>
                    </span>
                @endif
            </fieldset>
            <fieldset>
                <input id="datepickerFrom" value="{{old('datepickerFrom')}}" data-date-format="YYYY-MM-DD HH:mm:ss" class="datepickerFrom" name="datepickerFrom" type="text" tabindex="1"  placeholder="Choose From Date&Time">
                @if ($errors->has('datepickerFrom'))
                    <span class="help-block errorColor">
                        <strong>{{ $errors->first('datepickerFrom') }}</strong>
                    </span>
                @endif

            </fieldset>
            <fieldset>
                <input id="datepickerTo" value="{{old('datepickerTo')}}" data-date-format="YYYY-MM-DD HH:mm:ss" name="datepickerTo" type="text" tabindex="1"  placeholder="Choose To Date&Time">
                @if ($errors->has('datepickerTo'))
                    <span class="help-block errorColor">
                        <strong>{{ $errors->first('datepickerTo') }}</strong>
                    </span>
                @endif
            </fieldset>

            <fieldset>
            <button  type="submit" id="chooseSubmit"  data-submit="...Sending">Choose Vehicle</button>
            </fieldset>
        </form>
    </div>






@endsection
@section('js')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAPI9DH02wprL-VPOZZkwAHNzCdRLLKzqY&libraries=places"></script>

    <script>
        var placeSearch, autocomplete;
        function initAutocomplete(el) {
            autocomplete = new google.maps.places.Autocomplete(
                (document.getElementById(el)),
                {types: ['geocode']});
        }
          initAutocomplete('pickUpAddress');
          initAutocomplete('dropoffAddress');
          $(document).ready(function () {

          $('#datepickerFrom').datetimepicker();
          $('#datepickerTo').datetimepicker();

//            chooseDateAndTime('#datepickerFrom');
//            chooseDateAndTime('#datepickerTo');
//            function chooseDateAndTime(el) {
//                $(el).datetimepicker(
//                    {
//                        formate:'DD-MM-YYYY HH:mm:ss'
//                    }
//                );
//
//            }


        });






    </script>

    @endsection