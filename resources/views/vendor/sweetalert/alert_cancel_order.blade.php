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
                            var form = document.createElement('form');
                            form.action = event.target.href;
                            form.method = 'DELETEs';
                            form.innerHTML = `
                    @csrf
                `;
                            document.body.appendChild(form);
                            form.submit();
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
