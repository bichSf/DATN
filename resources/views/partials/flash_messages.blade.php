@if( \Illuminate\Support\Facades\Session::has("success-flash") )
    <div class="alert alert-success success no-print" role="alert">
        <button class="close" data-dismiss="alert">×</button>
        {{ \Illuminate\Support\Facades\Session::get("success-flash") }}
    </div>
@endif
@if( \Illuminate\Support\Facades\Session::has("error-flash") )
    <div class="alert alert-danger error no-print" role="alert">
        <button class="close" data-dismiss="alert">×</button>
        {!! \Illuminate\Support\Facades\Session::get("error-flash") !!}
    </div>
@endif
