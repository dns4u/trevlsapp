@extends('includes.layout')
@section('title')
    Review and Reserve
    @endsection
@section('css')
    <style>
     .modal-title{
         text-align: center;
         color:#00adb5;
     }
        .modal-body>div>h2{
            color:#00adb5;
            font-family: 'Open Sans', sans-serif !important;
        }
     .modal-body>div>p{
         font-family: 'Open Sans', sans-serif !important;
         font-size: 20px;
         color:#444;
     }
     .termsAndCondition {



     }
    </style>

    @endsection
@section('content')
    <section class="review-reseve">
        <div class="container">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <h4>3. Review and Reserve</h4>
            <div class="row">
                <div class="col-md-8 review-container">
                    <div class="review-heading">
                        <h3>Price Details</h3>
                    </div>
                    <div class="begin-detail">
                        <div class="review-list">
                            <div class="row detail-container">
                                <div class="col-md-6 detail-title"><strong>Vehicle Class</strong> </div>
                                <div class="col-md-6 detail-list">
                                    <a style="text-decoration: none;color: #00adb5;"
                                       href="{{route('front.product.select')}}">
                                        change vehicle
                                    </a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="review-list">
                                    <div class="col-md-6 detail-title"><p>{{$newArray['row']['vehicle_class']}}<br>For {{$newArray['days']}} day(s) ${{$newArray['row']['new_price_per_day']}} / day</p> </div>
                                    <div class="col-md-6 detail-list"><p>{{$newArray['priceOfProductPerDay']}}</p></div>
                                </div>
                            </div>
                        </div>

                        <div class="review-list">
                            <div class="row detail-container">
                                <div class="col-md-6 detail-title"><strong>Vehicle Mileage</strong> </div>
                            </div>

                            <div class="row">
                                <div class="review-list">
                                    <div class="col-md-6 detail-title"><p>{{$newArray['row']['range']}}</p> </div>
                                    <div class="col-md-6 detail-list"><p>Included</p></div>
                                </div>
                            </div>
                        </div>

                        <div class="review-list">
                            <div class="row detail-container">
                                <div class="col-md-6 detail-title"><strong>Reservation Delivery</strong> </div>
                            </div>

                            <div class="row">
                                <div class="review-list">
                                    <div class="col-md-6 detail-title"><p>Drop-Off &amp; Return</p> </div>
                                    <div class="col-md-6 detail-list"><p>{{$newArray['row']['reservation_delivery_price']}}</p></div>
                                </div>
                            </div>
                        </div>


                        <div class="review-list">
                            <div class="row detail-container">
                                <div class="col-md-6 detail-title"><strong>Insurance (Optional)</strong> </div>
                            </div>

                            <div class="row">
                                <div class="review-list">
                                    <div class="col-md-6 detail-title"><p>Personal Accident Insurance ${{$newArray['row']['insurance_personal']}}/day</p> </div>
                                    <div class="col-md-6 detail-list">
                                        <label><input type="checkbox"  id="insurencePerAccient" name="insurencePerAccient" value="{{$newArray['row']['insurance_personal']}}"></label>
                                    </div>
                                </div>

                                <div class="review-list">
                                    <div class="col-md-6 detail-title"><p>Roadside Assistance Protection ${{$newArray['row']['insurance_roadside']}}/day</p> </div>
                                    <div class="col-md-6 detail-list">
                                        <label><input type="checkbox" id="insurenceRoadside" name="insurenceRoadside" value="{{$newArray['row']['insurance_roadside']}}"></label>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="review-list">
                            <div class="row detail-container">
                                <div class="col-md-6 detail-title"><strong>Taxes &amp; Fees</strong> </div>
                                <div class="col-md-6 detail-list"></div>
                            </div>

                            <div class="row">
                                <div class="review-list">
                                    <div class="col-md-6 detail-title"><p>Total Tax </p> </div>
                                    <div class="col-md-6 detail-list"><p>{{$newArray['tax']}}</p></div>
                                </div>
                            </div>
                        </div>

                        <div class="review-list">
                            <div class="row detail-container">
                                <div class="col-md-6 detail-title"><strong>Estimated Total</strong> </div>
                            </div>

                            <div class="row">
                                <div class="review-list">
                                  
                                    <div class="col-md-6 detail-list"><p class="total">${{$newArray['totalPriceOfProduct']}}</p></div>


                                     <div class="container">
            
            <div class="row">
            <div class="col-md-12">
            <h4>
                4. Enter your details
            </h4>
            </div>
                <div class="col-md-8">
                    <form action="{{route('front.product.userdetail.send',$newArray['row']['id'])}}" method="post">
                        {{csrf_field()}}
                        <div class="heading-driver">
                            <div class="row">
                                <div class="col-md-12"><h3>Driver Information</h3></div>
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
                                <div class="col-md-6">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" value="{{ old('address') }}" class="form-control" id="address">
                                    @if ($errors->has('address'))
                                        <span class="help-block errorColor">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                           
                             <div class="col-md-6">
                                    <label for="address">Picked Up Time</label>
                                    <input type="text" name="picked_up_time" value="{{ old('picked_up_time') }}" class="form-control" id="picked_up_time">
                                    @if ($errors->has('address'))
                                        <span class="help-block errorColor">
                                        <strong>{{ $errors->first('picked_up_time') }}</strong>
                                    </span>
                                    @endif
                            </div>
                        </div>
                        </div>

                        <button type="submit" id="reserve-btn" class="btn btn-default reserve-btn">RESERVE NOW</button><div style="color:blue;margin-left:30px;">Reserve Now,Pay Later</div>
                    </form>
                </div>
           
            </div>

        </div>

                                    
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-md-4">
                    <div class="rental-service">
                        <h3>Rental Summary</h3>
                    </div>
                    <div class="rental-service-container">
                        <img class="img-contain" widt="315" height="167" src="{{ asset('images/product/'.$newArray['row']['product_image'])}}">

                        <div class="row">
                            <div class="col-md-6"><h2>{{$newArray['row']['vehicle_class']}}</h2></div>
                            <div class="col-md-6"><h4>
                                    <a style="text-decoration: none;color: #00adb5;" href="{{route('front.product.select')}}">
                                        Modify Vehicle
                                    </a>
                                </h4></div>
                        </div>
                        <h3>{{$newArray['row']['product_name']}}</h3>

                        <form>
                            <div class="form-group">
                                <span class="print-error-msg">
                                    <ul>

                                    </ul>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="licenceNumber">Vehicle Dropoff Address</label>
                                <input type="text"  value="{{$newArray['newdropoffAddress']}}" name="newdropoffAddress" class="form-control" id="newdropoffAddress" disabled>
                            </div>
                            <div class="form-group">
                                <label for="licenceNumber">Vehicle Return Address</label>
                                <input type="text" value="{{$newArray['returnAddress']}}" name="newreturnAddress" class="form-control" id="newreturnAddress" disabled>

                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="to">From</label>
                                        <input type="text"  value="{{date('d/M/Y',strtotime($newArray['datepickerFrom']))}}" name="newdatepickerFrom" class="form-control" id="newdatepickerFrom" placeholder="Enter From Date" disabled>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="from">To</label>
                                        <input type="text"   value="{{date('d/M/Y',strtotime($newArray['datepickerTo']))}}" name="newdatepickerTo" class="form-control" id="newdatepickerTo" placeholder="Enter To Date" disabled>
                                    </div>

                                    <div class="col-md-12 modify-date-time">
                                        <span id="modify" style="text-decoration: none;color: #00adb5;" href="">MODIFY LOCATION/DATES</span>
                                    </div>


                                </div>
                            </div>

                        </form>
                    </div>

                    <div class="row view-terms">
                        <div class="col-md-7"><h3>Rental Terms</h3> </div>
                        <div class="col-md-5">
                            <h4>
                                <a data-toggle="modal" data-target="#myModal" style="text-decoration: none;color: #00adb5;" href="#">
                                    VIEW ALL TERMS
                                </a>
                            </h4>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style="color:#00adb5;">Trevls Terms and Conditions</h4>
                    </div>
                    <div class="modal-body">
                        <div>
                            <h2>1.Additional Drivers</h2>
                            <p>Additional drivers must meet same rental qualifications as the renter. Additional drivers must appear with the primary renter at the time of drop off. There will be no additional charge for each additional authorized driver including a spouse or domestic partner. There is a limit of two additional drivers per rental contract. A spouse or domestic partner is the only permitted additional driver on non-credit card deposits. Additional drivers must be 21 or older.</p>
                            <h2>2.Renter Requirements</h2>
                            <p>All renters and additional drivers must be 21 years of age or older, have a valid driver's license and a major credit card in their name. Driver's licenses are accepted from any USA state or territory. Licenses from outside the USA also may require an international driver's permit. International driver's permits are valid only if presented with the original local license. Individuals with learner's permits are not eligible to rent vehicles. All renters must have a valid driver's license in good standing for the previous 30 days. All drivers must provide proof of Insurance. Such policy must be active for a minimum of 30 days. TREVLS reserves the right to refuse rental to anyone, for any reason.</p>
                            <h2>3.Damage Waiver</h2>
                            <p>DAMAGE WAIVER (DW) IS OFFERED AT THE TIME OF RENTAL FOR AN ADDITIONAL DAILY CHARGE. IF THE RENTER ACCEPTS DW, TREVLS WAIVES OR REDUCES THE RENTER'S RESPONSIBILITY FOR LOSS OF, OR DAMAGE TO, THE RENTAL VEHICLE (INCLUDING BUT NOT LIMITED TO TOWING, STORAGE, LOSS OF USE, ADMINISTRATIVE FEES AND/OR DIMINISHMENT OF VALUE) SUBJECT TO THE TERMS AND CONDITIONS OF THE RENTAL AGREEMENT AND APPLICABLE LAWS. DW IS NOT INSURANCE. THE PURCHASE OF DW IS OPTIONAL AND NOT REQUIRED TO RENT A CAR. THE PROTECTION PROVIDED BY DW MAY DUPLICATE THE RENTER'S EXISTING COVERAGE. TREVLS IS NOT QUALIFIED TO EVALUATE THE ADEQUACY OF THE RENTER'S EXISTING COVERAGE; THEREFORE THE RENTER SHOULD EXAMINE HIS OR HER CREDIT CARD PROTECTIONS, AUTOMOBILE INSURANCE POLICIES OR OTHER SOURCES OF COVERAGE THAT MAY DUPLICATE THE PROTECTION PROVIDED BY DW.</p>
                            <h2>4.Mileage Policy</h2>
                            <p>Mileage is unlimited in the continental USA.</p>
                            <h2>5.Personal Accident Insurance</h2>
                            <p>PERSONAL ACCIDENT INSURANCE (PAI) - IS OFFERED AT THE TIME OF RENTAL FOR AN ADDITIONAL DAILY CHARGE. IF ACCEPTED, PAI PROVIDES THE RENTER AND PASSENGERS WITH ACCIDENT MEDICAL EXPENSE, ACCIDENTAL DEATH AND AMBULANCE EXPENSE BENEFITS. BENEFITS ARE PAYABLE IN ADDITION TO ANY OTHER INSURANCE COVERAGE THE RENTER OR PASSENGERS MAY HAVE. THIS IS A SUMMARY ONLY. PAI IS SUBJECT TO THE PROVISIONS, LIMITATIONS AND EXCLUSIONS OF THE PAI POLICY UNDERWRITTEN BY NATIONAL INTERSTATE INSURANCE COMPANY. THE PURCHASE OF PAI IS OPTIONAL AND NOT REQUIRED TO RENT A CAR. THE COVERAGE PROVIDED BY PAI MAY DUPLICATE THE RENTER'S EXISTING COVERAGE. TREVLS IS NOT QUALIFIED TO EVALUATE THE ADEQUACY OF THE RENTER'S EXISTING COVERAGE; THEREFORE THE RENTER SHOULD EXAMINE HIS OR HER PERSONAL INSURANCE OR OTHER SOURCES OF COVERAGE THAT MAY DUPLICATE THE COVERAGE PROVIDED BY PAI.</p>
                            <h2>6.Roadside Assistance Protection</h2>
                            <p>
                                TREVLS offers Roadside Assistance Protection (RAP) that allows TREVLS customers to waive financial responsibility for chargeable roadside incidents such as lost keys, lockouts, and electrical outages. RAP offers these services--flat tire, jump start, lockout service, electrical jump start delivery, and key replacement. Roadside assistance protection is void and of no effect if, at the time of the incident necessitating roadside assistance, you or any authorized driver were in violation of the rental agreement, including, without limitation, the prohibited uses and violations set forth therein. In such cases, roadside assistance will be available, but standard charges may apply.<br><br>

                                TREVLS' Roadside Assistance is an optional service that provides coverage at a reasonable additional charge. In the event of operational difficulty or unexpected emergency, we'll bring you fast, reliable assistance - especially helpful when you're in an unfamiliar city.<br><br>

                                Key Replacement - Get replacement keys or locksmith assistance.
                                Lockout Service - Gain entry when keys are locked inside the vehicle.
                                Jump Start - If your vehicle experiences battery failure, we'll provide a jump start.
                                Flat Tire Assistance - We'll replace a flat or damaged tire with the spare, or get the car towed to the nearest service facility. The actual cost of the tire is not included and the customer may be billed separately.<br><br>
                                Tire Replacement - We'll replace a flat or damaged tire with the spare, or get the car towed to the nearest service facility. The actual cost of the tire is not included and the customer may be billed separately. Taxes not included in the Total and will be added at the time of rental. The daily/weekly fee is subject to change.
                            </p>
                            <h2>7.Non-Smoking Fleet</h2>
                            <p>Non-Smoking Fleet. Smoking is not permitted within the car at anytime. Violation of this agreement will incur a $500 fee.</p>
                            <h2>8.Reservations and Rental Adjustments</h2>
                            <p>Any changes to a reservation or rental may result in a change of rate or additional fees.</p>
                            <h2>9.Disclaimer</h2>
                            <p>TREVLS offers this web site (the "Site") for your information and communication. Please feel free to browse the Site. Your access to and use of the Site is subject to the following terms and conditions (the "Terms") as well as all applicable U.S. laws. By accessing and browsing the Site, you accept, without limitation or qualification, the following Terms of this Agreement and our Online Privacy Policy.<br><br>

                                This Site is owned and operated by TREVLS, Inc d.b.a. TREVLS, 60 South 6th Street, Suite 2800, Minneapolis, Minnesota 55402. All references to “TREVLS”, “we”, or “our” include its parent, affiliates and subsidiaries. You must be at least 13 years of age to use this Site.<br><br>

                                We claim copyright protection on everything you see on the Site. You may not download, reproduce, distribute, republish or retransmit any material on this Site without our prior written consent. You may download material displayed on the Site for non-commercial personal use only, provided the downloaded materials include all copyright and trademark notices. You may not, however, distribute, modify, transmit, reuse, re-post, or use the content of the Site for public or commercial purposes without our prior written consent, including “framing” of any part of the Site, or tampering with our software or the functionality of this Site, to reverse engineer or to circumvent the navigation of the Site. You also may not use any robot, spider, or other automatic device or manual process to monitor the Site without our prior written consent. We neither warrant nor represent that your use of materials displayed on the Site will not infringe the rights of third parties not owned or affiliated with TREVLS.<br><br>

                                While we use reasonable efforts to include accurate and up to date information on the Site, we make no warranties or representations as to its accuracy. We assume no liability or responsibility for any errors or omissions in the content of the Site. The trademarks, service marks, logos, tag lines and images (the “Marks”) displayed on the Site are the unregistered and registered service marks of TREVLS or are the property of or used by TREVLS or its affiliates with the permission of the owner. Nothing contained on the Site should be construed as granting, by implication, estoppel or otherwise, any license or right to use any Marks displayed on the Site without our prior written consent. Your unauthorized use of the Marks or any other content on the Site is strictly prohibited. We will aggressively enforce intellectual property rights to the fullest extent of the law.<br><br>

                                Your use of the Site is at your own risk. Neither TREVLS nor any other party involved in creating, producing, or delivering the Site is liable for any direct, special, incidental, consequential, indirect, punitive damages, or any damages whatsoever arising out of your access to, or use of, the Site. Without limiting the foregoing, everything on the Site is provided to you "AS IS" WITHOUT WARRANTY OF ANY KIND, EITHER EXPRESSED OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, OR NON-INFRINGEMENT. We also assume no responsibility, and shall not be liable for, any damages to, or viruses that may infect your computer equipment or other property on account of your access to use of, or browsing in the Site or your downloading any materials, data, text, images, video, or audio from the Site.<br><br>

                                We do not review nor are we responsible for any linked sites not under our control. These links are included as a convenience, and except for contractual relationships with our apparent marketing partners, the inclusion of any link does not imply endorsement by TREVLS of the linked site.<br><br>

                                Although we may from time to time monitor or review discussions, charts, postings, transmissions, bulletin boards, and the like on the Site, we are under no obligation to do so and assume no responsibility or liability arising from the content of any such locations nor for any error, defamation, libel, slander, omission, falsehood, obscenity, pornography, profanity, danger, or inaccuracy contained in any information within such locations on the Site. You are prohibited from posting or transmitting any unlawful, threatening, libelous, defamatory, obscene, scandalous, inflammatory, pornographic, or profane material or any material that could constitute or encourage conduct that would be considered a criminal offense, give rise to civil liability, or otherwise violate any law. We have the right to remove any posting that we believe, in our sole discretion, violates these Terms. We will fully cooperate with any law enforcement authorities or court order requesting or directing TREVLS to disclose the identity of anyone posting such information or materials.<br><br>

                                You will indemnify TREVLS for any cost, expenses, attorney fees and other losses as a result of your unauthorized use or misuse of the Site and the content of the Site.<br><br>

                                We are not responsible for breaches or lapses in online security and do not assume liability for improper use of any of your personal information obtained by a third party as a result of this breach or lapse.<br><br>

                                We may at any time revise these Terms by updating this posting and may also make changes to the content or any links at anytime. You are bound by any such revisions and should therefore periodically visit this page to review the then current Terms.<br><br>

                                This Agreement constitutes the entire agreement of the parties with respect to the subject matter hereof and supersedes all prior written agreements with respect to the subject matter hereof.<br><br>

                                The laws of the State of Minnesota shall govern this Agreement, without regard to the conflict of law principles thereof.

                                All disputes shall be conducted in a federal or state court sitting in Minneapolis, Minnesota. The parties acknowledge and agree that jurisdiction and venue is proper in such court(s) and convenient and waive any objection to such jurisdiction and venue, including, without limitation, that such forum is inconvenient.</p>
                            <h2>10.Battery Maintenance</h2>
                            <p>If the customer is left at the side of the road with an empty battery due to poor planning, then the customer is liable for any fees including and related to the towing and recharging of the vehicle. In addition, in any case, the fees for transporting the car to the nearest charging station are the sole responsibility of the customer. All customers must leave the battery charged at a minimum of 50 miles. Failure to do so may result in a $50 recharging fee for the customer. TREVLS will arrange a tow truck to pick up and deliver to the closest charging station. Customers will incur additional towing fees.</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default reserve-btn"
                                style="
                                border:1px solid #00adb5 ;
                                background-color:#00adb5 !important;
                                color:white"
                                data-dismiss="modal">Close
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
@section('js')
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAPI9DH02wprL-VPOZZkwAHNzCdRLLKzqY&libraries=places"></script>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    function relocate_home()
    {
     location.href = "https://www.trevls.com/log-in";
    } 
        var placeSearch, autocomplete;
        function initAutocomplete(el) {
            autocomplete = new google.maps.places.Autocomplete(
                (document.getElementById(el)),
                {types: ['geocode']});
        }
          initAutocomplete('newreturnAddress');
          initAutocomplete('newdropoffAddress');
                  $( function() {
            $( "#newdatepickerTo" ).datepicker({
                dateFormat: 'yy-mm-dd',
                dayNamesMin: ['S', 'M', 'T', 'W', 'T', 'F', 'S'],
                minDate: "0d"
            });
             $( "#newdatepickerFrom" ).datepicker({
                dateFormat: 'yy-mm-dd',
                dayNamesMin: ['S', 'M', 'T', 'W', 'T', 'F', 'S'],
                minDate: "0d"
            });
            });

            $(document).ready(function () {
                $('#modify').on('click',function(e){
                $('#newdropoffAddress').attr('disabled',false);
                $('#newreturnAddress').attr('disabled',false);
                $('#newdatepickerFrom').attr('disabled',false);
                $('#newdatepickerTo').attr('disabled',false);
           }); 
          

                var host = "{{request()->getSchemeAndHttpHost()}}";
                $('#reserve-btn').click(function (e) {
                    var newdropoffAddress = $('#newdropoffAddress').val();
                    var newreturnAddress = $('#newreturnAddress').val();
                    var newdatepickerFrom = $('#newdatepickerFrom').val();
                    var newdatepickerTo = $('#newdatepickerTo').val();
                    var result = $('input[type="checkbox"]:checked');
                    var promoCode= $('#promoCode').val();
                    var checkboxValue = 0;
                    if (result.length > 0) {
                        result.each(function () {
                            checkboxValue = checkboxValue + Number($(this).val());
                        })

                    } else {
                        checkboxValue = 0;
                    }
                    $.ajax({
                        type: "POST",
                        url: host + '/product/review/' + '{{$newArray['row']['id']}}',
                        data: {
                            newdropoffAddress: newdropoffAddress,
                            newreturnAddress: newreturnAddress,
                            newdatepickerFrom: newdatepickerFrom,
                            newdatepickerTo: newdatepickerTo,
                            checkboxValue: checkboxValue,
                            promoCode:promoCode,
                            _token: $('meta[name="csrf-token"]').attr('content')

                        },
                        dataType: 'json',
                    });

                });

            });

    </script>

    @endsection
