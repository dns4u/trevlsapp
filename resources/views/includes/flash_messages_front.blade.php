@if (session()->has('success_message'))
    <div class="alert alert-success alert-dismissable" style="margin-top: 20px">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <strong>Success!</strong> {{ session()->get('success_message') }}
    </div>
@endif
@if (session()->has('error_message'))
    <div class="alert alert-success alert-dismissable" style="margin-top: 20px">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <strong>Error!</strong> {{ session()->get('error_message') }}
    </div>
@endif