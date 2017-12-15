<!--[if !IE]> -->

<script type="text/javascript">
    window.jQuery || document.write("<script src='{{asset('ace/assets/js/jquery-2.0.3.min.js')}}'>"+"<"+"/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
    window.jQuery || document.write("<script src='{{asset('ace/assets/js/jquery-1.10.2.min.js')}}'>"+"<"+"/script>");
</script>
<![endif]-->

<script type="text/javascript">
    if("ontouchend" in document) document.write("<script src='{{asset('ace/assets/js/jquery.mobile.custom.min.js')}}'>"+"<"+"/script>");
</script>
<script src="{{asset('ace/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('ace/assets/js/typeahead-bs2.min.js')}}"></script>

<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
<script src="{{asset('ace/assets/js/excanvas.min.js')}}"></script>
<![endif]-->

      @yield('js')
<!-- ace scripts -->

<script src="{{asset('ace/assets/js/ace-elements.min.js')}}"></script>
<script src="{{asset('ace/assets/js/ace.min.js')}}"></script>

<!-- inline scripts related to this page -->


</body>

<!-- Mirrored from 198.74.61.72/themes/preview/'ace/index.html by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 28 Feb 2014 17:45:31 GMT -->
</html>
