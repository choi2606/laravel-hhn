@if (config('sweetalert.animation.enable'))
    <link rel="stylesheet" href="{{ config('sweetalert.animatecss') }}">
@endif

@if (config('sweetalert.theme') != 'default')
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-{{ config('sweetalert.theme') }}" rel="stylesheet">
@endif

@if (config('sweetalert.alwaysLoadJS') === false && config('sweetalert.neverLoadJS') === false)
    <script src="{{ $cdn ?? asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
@endif
