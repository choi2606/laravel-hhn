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
                            var productID = $('a[data-confirm-delete]').attr('productID');
                            var page = $('input[name="storagePageNumber"]').val();
                            $.ajax({
                                url: event.target.href + `?page=${page}`,
                                type: 'DELETE',
                                dataType: 'json',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    productID: productID,
                                },
                                success: function(data) {
                                    loadListProductPagination(event.target.href, data, page);
                                    toastSuccess('Xoá thành công!')

                                },
                                error: function(xhr, status, error) {
                                    toastError('Xóa thất bại!')

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
