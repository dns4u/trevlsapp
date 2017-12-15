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
@if (session()->has('error_message'))
    <div class="alert alert-block alert-danger">
        <button type="button" class="close" data-dismiss="alert">
            <i class="icon-remove"></i>
        </button>

        <p>
            <strong>
                <i class="icon-ok"></i>
                Error!
            </strong>
            {{ session()->get('error_message') }}
        </p>
    </div>
@endif