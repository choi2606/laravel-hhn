@if (Session::has('alert.config') || Session::has('alert.delete'))
    @include('vendor.sweetalert.alert')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        @if (Session::has('alert.delete'))
            document.addEventListener('click', function(event) {
                if (event.target.matches('[data-confirm-delete]')) {
                    event.preventDefault();
                    Swal.fire({!! Session::pull('alert.delete') !!}).then(function(result) {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: event.target.href,
                                type: 'GET',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                },
                                success: function(data) {
                                    console.log(data.cartComponents);
                                    if (data.code === 200) {
                                        $('.cart-wrapper').empty().html(data.cartComponents);

                                    }
                                },
                                error: function(jqXHR, textStatus, text) {}
                            })
                        }
                    });
                }
            });
        @endif

        @if (Session::has('alert.config'))
            Swal.fire({!! Session::pull('alert.config') !!});
        @endif
    </script>
@endif
