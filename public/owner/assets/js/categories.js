function setValue(event, categoryID, categoryName) {
    event.preventDefault();
    $('input[name="categoryNameUpdate"]').val(categoryName);
    $('input[name="categoryID"]').val(categoryID);
}

function onSubmitCateUpdate(event) {
    event.preventDefault();
    var newCategory = $('input[name="categoryNameUpdate"]').val();
    var categoryID = $('input[name="categoryID"]').val();
    $.ajax({
        url: "/update_category" + categoryID,
        type: "PUT",
        datatype: "json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            name: newCategory,
        },
        success: function (response) {
            //Xử lý dữ liệu nhận về từ máy chủ
            $(".body-category").empty(); // Xóa danh sách danh mục hiện tại
            $.each(response, function (index, category) {
                $(".body-category").append(
                    `<tr class="d-flex justify-content-between">
                        <td class="w-100" scope="row">${index + 1}</td>
                        <td class="w-100">${category.name}</td>
                        <td class="w-100" align="end">
                            <a href="#" onclick = "setValue(event,${
                                category.category_id},'${category.name}')" class="fa fa-pencil-square-o icon-update"></a>
                        <input type="hidden" name="categoryID" value="">
                            <a href="${
                                window.location.origin
                                }/remove-category${category.category_id}"
                                data-confirm-delete="true"
                                class="fa fa-times icon-remove-category">
                            </a>
                        </td>
                    </tr>`
                );
            });

            // load lại các thẻ trong phần tử select
            $("#categorySelectWrapper").empty();
            $("#categorySelectWrapper").append(
                `<select data-placeholder="Select the category to edit"
                        class="standardSelect category-select" tabindex="-1" style="display: none;"
                        onchange="(onSelectCate(event))">
                        <option value="" label="default"></option>
                        ${response
                            .map(
                                (category) => `
                        <option value="${category.name}"
                            data-categoryid="${category.category_id}">${category.name}
                        </option>`
                            )
                            .join("")};
                </select>`
            );

            jQuery(".standardSelect").chosen({
                disable_search_threshold: 10,
                no_results_text: "Oops, nothing found!",
                width: "100%",
            });
            Swal.fire({
                text: "Cập nhập thành công!",
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
            $('input[name="categoryNameUpdate"]').val("");
        },
        error: function (xhr, status, error) {
            // Thực hiện các thao tác khác khi xóa thất bại (nếu cần)
            Swal.fire({
                text: "Cập nhập thất bại!",
                position: "top-right",
                icon: "error",
                timer: 3000,
                showConfirmButton: false,
                showCloseButton: true,
                backdrop: false,
                customClass: {
                    container: "swal2-container swal2-top-end",
                    popup: "swal2-popup swal2-toast swal2-icon-error swal2-show",
                    title: "swal2-title",
                    closeButton: "swal2-close",
                    icon: "swal2-icon swal2-error swal2-icon-show",
                },
            });
        },
    });
}

function onSelectCate(event) {
    var selectedOption = $(event.target).find("option:selected");
    var categoryID = selectedOption.data("categoryid");
    var categoryName = selectedOption.val();
    $('input[name="categoryNameUpdate"]').val(categoryName);
    $('input[name="categoryID"]').val(categoryID);
}

function onAddCategory(event) {
    event.preventDefault();
    var category = $('input[name="categoryName"]').val();
    $.ajax({
        url: "/add-category",
        type: "POST",
        datatype: "json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            name: category,
        },
        success: function (response) {
            //Xử lý dữ liệu nhận về từ máy chủ
            $(".body-category").empty(); // Xóa danh sách danh mục hiện tại
            $.each(response, function (index, category) {
                $(".body-category").append(
                    `<tr class="d-flex justify-content-between">
					        <td class="w-100" scope="row">${index + 1}</td>
					        <td class="w-100">${category.name}</td>
					        <td class="w-100" align="end">
						        <a href="#" 
                                    onclick="setValue(event, ${
                                        category.category_id
                                    }, '${category.name}')"
                                    class="fa fa-pencil-square-o icon-update">
                                </a>
                                <input type="hidden" name="categoryID" value="">
						        <a href="${window.location.origin}/remove-category${
                        category.category_id
                    }"
                                    data-confirm-delete="true"
                                    class="fa fa-times icon-remove-category">
                                </a>
					        </td>
				        </tr>`
                );
            });

            // load lại các thẻ trong phần tử select
            $("#categorySelectWrapper").empty();
            $("#categorySelectWrapper").append(
                `<select data-placeholder="Select the category to edit"
                        class="standardSelect category-select" tabindex="-1" style="display: none;"
                        onchange="(onSelectCate(event))">
                        <option value="" label="default"></option>
                        ${response
                            .map(
                                (category) => `
                        <option value="${category.name}"
                            data-categoryid="${category.category_id}">${category.name}
                        </option>`
                            )
                            .join("")};
                </select>`
            );

            jQuery(".standardSelect").chosen({
                disable_search_threshold: 10,
                no_results_text: "Oops, nothing found!",
                width: "100%",
            });
            Swal.fire({
                text: "Thêm thành công!",
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
            $('input[name="categoryName"]').val("");
        },
        error: function (xhr, status, error) {
            // Thực hiện các thao tác khác khi xóa thất bại (nếu cần)
            Swal.fire({
                text: "Thêm thất bại!",
                position: "top-right",
                icon: "error",
                timer: 3000,
                showConfirmButton: false,
                showCloseButton: true,
                backdrop: false,
                customClass: {
                    container: "swal2-container swal2-top-end",
                    popup: "swal2-popup swal2-toast swal2-icon-error swal2-show",
                    title: "swal2-title",
                    closeButton: "swal2-close",
                    icon: "swal2-icon swal2-error swal2-icon-show",
                },
            });
        },
    });
}
