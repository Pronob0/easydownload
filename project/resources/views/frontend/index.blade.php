@extends('layouts.front')

@section('content')
    @if ($gs->theme == 'theme1')
        @includeIf('includes.theme1')
    @endif

    @if ($gs->theme == 'theme2')
        @includeIf('includes.theme2')
    @endif

    @if ($gs->theme == 'theme3')
        @includeIf('includes.theme3')
    @endif
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
    $("._uy98p").click(function () {
        $("._uy98p").removeClass("active");
        // $(".tab").addClass("active"); // instead of this do the below
        $(this).addClass("active");
    });
    });

</script>

@endsection
