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
                if (event.target.matches('[data-confirm-delete]')) {
                    event.preventDefault();
                    Swal.fire({!! Session::pull('alert.delete') !!}).then(function(result) {
                        if (result.isConfirmed) {
                            var listUserID = [];
                            var inputCheck = $('input[type="checkbox"]:checked');
                            inputCheck.each(function() {
                                var userID = $(this).attr("userID");
                                listUserID.push(userID);
                            });
                            var url = event.target.href;
                            var page = $('input[name="storagePageNumber"]').val();
                            var numberEntries = $('input[name="storageNumberEntries"]').val();

                            var userID = $(event.target).attr("userID");
                            if (listUserID.length > 0) {
                                sendRequestDeleteListUsers(url, listUserID, numberEntries, page);
                            } else {
                                sendRequestDeleteUser(url, userID, numberEntries, page);
                            }

                        }
                    });
                }
            });

            function sendRequestDeleteListUsers(url, listUserID, numberEntries, page) {
                $.ajax({
                    url: url + `/number_entries${numberEntries}?page=${page}`,
                    type: 'DELETE',
                    dataType: 'json',
                    data: {
                        _token: '{{ csrf_token() }}',
                        data: listUserID,
                    },
                    success: function(data) {
                        // Thực hiện các thao tác khác sau khi xóa thành công (nếu cần)
                        if (numberEntries != -1) {
                            loadListUserPagination(data, numberEntries, page);
                        } else {
                            loadListUserFull(data, numberEntries);
                        }
                        toastSuccess('Xoá thành công!')


                    },
                    error: function(xhr, status, error) {
                        // Thực hiện các thao tác khác khi xóa thất bại (nếu cần)
                        toastError('Xóa thất bại!')
                    }
                });
            }
            
            function sendRequestDeleteUser(url, userID, numberEntries, page) {
                $.ajax({
                    url: url + `/number_entries${numberEntries}?page=${page}`,
                    type: 'DELETE',
                    dataType: 'json',
                    data: {
                        _token: '{{ csrf_token() }}',
                        data: userID,
                    },
                    success: function(data) {
                        // Thực hiện các thao tác khác sau khi xóa thành công (nếu cần)
                        if (numberEntries != -1) {
                            loadListUserPagination(data, numberEntries, page);
                        } else {
                            loadListUserFull(data, numberEntries);
                        }
                        toastSuccess('Xoá thành công!')
                        


                    },
                    error: function(xhr, status, error) {
                        // Thực hiện các thao tác khác khi xóa thất bại (nếu cần)
                        toastError('Xóa thất bại!')

                    }
                });
            }
        @endif

        @if (Session::has('alert.config'))
            Swal.fire({!! Session::pull('alert.config') !!});
        @endif
    </script>
@endif
