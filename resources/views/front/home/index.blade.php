<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Trevls Tesla Car Rental</title>
<style type="text/css">@import url(https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic);</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/bootstrap-datepicker3.css') }}" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/bootstrap-datepicker.min.js"></script>

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">

<body> 
<!-- -->
<div class="form-wrapper">
<div class="text-container">
	<h2>A range of electric vehicles <b>delivered right to your door</b></h2>
    <h3>1. Pick a day for your vehicle to be delivered</h3>
</div>
<div class="form-container-main">
<div class="enter-city">
  <div class="enter-city-inner">
    <form name="frmhomesearch" id="frmhomesearch" action="{{route('front.product.store')}}" method="post">
    {{csrf_field()}}
      <h1>Reserve Vehicle</h1>
      <input type="hidden" name="search" value="Home">
      <h2>
        <input name="dropoffAddress" id="dropoffAddress" type="text" value="{{old('dropoffAddress')}}" placeholder="Minneapolis, MN, United States" class="validate[required] span3 from autocompleted" tabindex="1" required="" autocomplete="off">
      </h2>
      <ul>
        <li>
          <h3>DROPOFF</h3>          <span>
          <div id="datechange">DAY<sub>MONTH</sub></div>
          <input name="datepickerFrom" id="searchdate" type="text" tabindex="3" class="validate[required] datepicker span2 hasDatepicker" value="{{old('datepickerFrom')}}" placeholder="Pickup Date" readonly="readonly">
          </span> </li>
        <li>
          <h3>RETURN</h3>
          <span>
          <div id="datechange2">DAY<sub>MONTH</sub> </div>
          <input name="datepickerTo" id="searchdate2" type="text" tabindex="3" class="validate[required] datepicker span2 hasDatepicker" value="{{old('datepickerTo')}}" placeholder="Return date" readonly="readonly">
          </span> </li>
      </ul>
      <div class="reserve-part">
        <div class="reserve-part-left"> <span>
          <div class="checkbox-n">
            <input id="c1" name="cc1" type="checkbox" class="validate[required] new-error-class">
            <label for="c1"></label>
          </div>
          I am 21 or older</span> <span>
          <div class="checkbox-n">
            <input id="c2" name="cc2" type="checkbox">
            <label for="c2"></label>
          </div>
          Different return location</span> <button  type="submit" id="chooseSubmit"  data-submit="...Sending">Choose Vehicle</button></div>

        <div class="reserve-part-right"> <img src="{{asset('images/reserve-part-right-img.jpg')}}" alt=""> </div>
      </div>
    </form>
  </div>
</div>
<div class="right-img">
	<img src="{{asset('images/banner.jpg')}}"></div>
<div class="clear"></div>
</div>
</div>
</body>
</html>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAPI9DH02wprL-VPOZZkwAHNzCdRLLKzqY&libraries=places"></script>
<script>
var placeSearch, autocomplete;
        function initAutocomplete(el) {
            autocomplete = new google.maps.places.Autocomplete(
                (document.getElementById(el)),
                {types: ['geocode']});
        }
          initAutocomplete('dropoffAddress');
  
	$(document).ready(function(){
		
	$("#datechange").on('click',function(event){
		event.preventDefault();
		$('#searchdate').focus();
	});

	$("#datechange2").on('click',function(event){
		event.preventDefault();
		$('#searchdate2').focus();
	});
		
	if (window.location.href.indexOf("checkout") > -1) { 
			$("#recent-offers").hide();
		}
	});

	$('#frmnewsletter').bind('keydown',function(e){
		if(e.which == 13){
			checknewsletter(); return false;
		}
	});
	
	$('#searchdate').datepicker({
		todayHighlight: true,
		startDate: new Date(),
		autoclose: true,
		format: 'yyyy-mm-dd'
	}).on('changeDate', function(ev){
		//$(this).datepicker('hide');
		var dates= new Date(ev.date);
		$months = new Array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
		var day = dates.getDate();
		var month = dates.getMonth();
		var year = dates.getFullYear();
		var newMonth = parseInt(month)+1;
		jQuery('#searchdate').val(year+'-'+newMonth+'-'+day);
		//alert($('#searchdate').val());
		jQuery("#datechange").html(day+"<sub>"+$months[month]+"</sub>");
		jQuery('#searchdate2').datepicker('setStartDate', dates);
	});

	$('#searchdate2').datepicker({
		todayHighlight: true,
		startDate: new Date(),
		autoclose: true,
		format: 'yyyy-mm-dd'
	}).on('changeDate', function(ev){
		//$(this).datepicker('hide');
		var dates= new Date(ev.date);
		$months = new Array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
		var day = dates.getDate();
		var month = dates.getMonth();
		var year = dates.getFullYear();
		var newMonth = parseInt(month)+1;
		jQuery('#searchdate2').val(year+'-'+newMonth+'-'+day);
		jQuery("#datechange2").html(day+"<sub>"+$months[month]+"</sub>");
		jQuery('#searchdate').datepicker('setEndDate', dates);
	});
	
	
</script>
