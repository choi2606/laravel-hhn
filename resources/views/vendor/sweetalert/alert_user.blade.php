@if (Session::has('alert.config') || Session::has('alert.delete'))
    @if (config('sweetalert.animation.enable'))
        <link rel="stylesheet" href="{{ config('sweetalert.animatecss') }}">
    @endif

    @if (config('sweetalert.theme') != 'default')
        <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-{{ config('sweetalert.theme') }}" rel="stylesheet">
    @endif

    @if (config('sweetalert.alwaysLoadJS') === false && config('sweetalert.neverLoadJS') === false)
        <script src="{{ $cdn ?? asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
    @endif
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        @if (Session::has('alert.delete'))
            document.addEventListener('click', function(event) {
                if (event.target.matches('[data-confirm-delete-user]')) {
                    event.preventDefault();
                    Swal.fire({!! Session::pull('alert.delete') !!}).then(function(result) {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: event.target.href,
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    _method: 'DELETE'
                                },
                                success: function(response) {
                                    $('.tbody-users').empty();
                                    $.each(response, function(index, user) {
                                        $('.tbody-users').append(
                                            `<tr class="d-flex justify-content-between">
                                                <td class="w-100" scope="row">
                                                    <input type="checkbox" class="input-checkbox-user" userID = "${user.user_id}">
                                                    <i class="check-box icheckbox"></i>
                                                </td>
                                                <td class="w-100">
                                                    ${ $user.username}
                                                </td>
                                                <td class="w-100">
                                                    ${ $user.email}
                                                </td>
                                                <td class="w-100">
                                                    ${ $user.address}
                                                </td>
                                                <td class="w-100">
                                                    ${ $user.phone_number}
                                                </td>
                                                <td class="w-100" align="end">
                                                    <a href="#" class="fa fa-pencil-square-o"></a>
                                                </td>
                                            </tr>`);
                                    })
                                    Swal.fire({
                                        text: "Xóa thành công!",
                                        position: "top-right",
                                        icon: "success",
                                        timer: 3000,
                                        showConfirmButton: false,
                                        backdrop: false,
                                        showCloseButton: true,
                                        customClass: {
                                            container: "swal2-container swal2-top-end",
                                            popup: "swal2-popup swal2-toast swal2-icon-success swal2-show",
                                            title: "swal2-title",
                                            closeButton: "swal2-close",
                                            icon: "swal2-icon swal2-success swal2-icon-show",
                                        },
                                    });
                                },
                                error: function(xhr, status, error) {
                                    Swal.fire({
                                        text: 'Xóa thất bại!',
                                        position: 'top-right',
                                        icon: "error",
                                        timer: 3000,
                                        showConfirmButton: false,
                                        showCloseButton: true,
                                        backdrop: false,
                                        customClass: {
                                            container: 'swal2-container swal2-top-end',
                                            popup: 'swal2-popup swal2-toast swal2-icon-error swal2-show',
                                            title: 'swal2-title',
                                            closeButton: 'swal2-close',
                                            icon: 'swal2-icon swal2-error swal2-icon-show',
                                        }
                                    })
                                }
                            });
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
