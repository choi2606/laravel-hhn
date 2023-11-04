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
                            $.ajax({
                                url: event.target.href,
                                type: 'DELETE',
                                dataType: 'json',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                },
                                success: function(response) {
                                    // Thực hiện các thao tác khác sau khi xóa thành công (nếu cần)
                                    $(".body-category")
                                        .empty(); // Xóa danh sách danh mục hiện tại
                                    $.each(response, function(index, category) {
                                        $(".body-category").append(
                                            `<tr class="d-flex justify-content-between">
					                            <td class="w-100" scope="row">${index+1}</td>
					                            <td class="w-100">${category.name}</td>
					                            <td class="w-100" align="end">
						                            <a href="#"
                                                        onclick="setValue(event, ${category.category_id}, '${category.name}')"
                                                        class="fa fa-pencil-square-o icon-update">
                                                    </a>
                                                    <input type="hidden" name="categoryID" value="">
						                            <a href="${window.location.origin}/remove-category${category.category_id}" 
                                                        data-confirm-delete="true"
                                                        class="fa fa-times">
                                                    </a>
					                            </td>
				                            </tr>`);
                                    });
                                    // load lại các thẻ trong phần tử select
                                    $("#categorySelectWrapper").empty();
                                    $("#categorySelectWrapper").append(
                                        `<select data-placeholder="Select the category to edit"
                                            class="standardSelect category-select" tabindex="-1" style="display: none;"
                                            onchange="(onSelectCate(event))">
                                        <option value="" label="default"></option>
                                        ${response.map((category) => `
                                                 <option value="${category.name}"
                                                 data-categoryid="${category.category_id}">${category.name}
                                                </option>`).join("")};
                                        </select>`);

                                    jQuery(".standardSelect").chosen({
                                        disable_search_threshold: 10,
                                        no_results_text: "Oops, nothing found!",
                                        width: "100%",
                                    });
                                    toastSuccess('Xoá thành công!')



                                },
                                error: function(xhr, status, error) {
                                    // Thực hiện các thao tác khác khi xóa thất bại (nếu cần)
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
