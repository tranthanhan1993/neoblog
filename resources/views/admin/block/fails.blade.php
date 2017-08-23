@if (Session::has('fails'))
    <div class="alert alert-danger">
        {{ Session::get('fails') }}
    </div>
@endif
