@if (Session::has('success'))

<div class="alert alert-success"  role="alert">
    <button type="button" class="close hide-close" aria-label="Close">
    <span aria-hidden="true">×</span>
    </button>
    <p class="m-0">
        {{ Session::get('success') }}
    </p>
</div>

@endif
@if (Session::has('errors'))

<div class="alert alert-danger"  role="alert">
    <button type="button" class="close hide-close" aria-label="Close">
    <span aria-hidden="true">×</span>
    </button>
    <p class="m-0">
        {{ Session::get('errors') }}
    </p>
</div>


@endif

