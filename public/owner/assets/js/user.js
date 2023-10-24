function onChangeEntries(event) {
    event.preventDefault();
    var numberEntries = event.target.value;
    loadPageFirst(numberEntries);
}

function loadPageFirst(numberEntries, page = 1) {
    $.ajax({
        url: `list-users/number_entries${numberEntries}?page=${page}`,
        type: "GET",
        dataType: "json",
        success: function (data) {
            (numberEntries != -1) ? loadListUserPagination(data, numberEntries, page) : loadListUserFull(data, numberEntries);
        },
        error: function (jqXHR, textStatus, errorThrown) {},
    });
}

function loadListUserFull(data, numberEntries) {
    $(".tbody-user")
        .empty()
        .append(
            `<input type="hidden" name="storageNumberEntries" value="${numberEntries}">`
        );
    var lengthData = data.length;
    $.each(data, function (index, user) {
        $(".tbody-user").append(
            `<tr>
                            <td>
                            <input type="checkbox" class="input-checkbox-user"
                                userID = "${user.user_id}">
                            <i class="check-box icheckbox"></i>
                            <input type="hidden" name="storageId" value="">
                            </td>
                            <td>${user.username}</td>
                            <td>${user.email}</td>
                            <td>${user.address}</td>
                            <td>${user.phone_number}</td>
                            <td align="center">
                                <a href="" onclick="showFormUpdateUser(event,'${user.user_id}','${user.username}','${user.email}','${user.address}','${user.phone_number}')"
                                    class="fa fa-pencil-square-o">
                                </a>
                            </td>
                        </tr>`
        );
    });
    $(".textEntries")
        .empty()
        .append(`Đang hiển thị ${lengthData} / ${lengthData} mục`);
    $(".pagination").empty();
}

function loadListUserPagination(data, numberEntries, page = 1) {
    $(".tbody-user")
        .empty()
        .append(
            `<input type="hidden" name="storagePageNumber" value="${page}"><input type="hidden" name="storageNumberEntries" value="${numberEntries}">`
        );
    var users = data.data;
    var lastPage = data.last_page;
    var previousPage = data.prev_page_url;
    var nextPage = data.next_page_url;
    var fromField = data.from;
    var toNextField = data.to;
    var totalField = data.total;
    var paginationHtml = "";

    $.each(users, function (index, user) {
        $(".tbody-user").append(
            `<tr>
                <td>
                <input type="checkbox" class="input-checkbox-user"
                    userID = "${user.user_id}">
                <i class="check-box icheckbox"></i>
                <input type="hidden" name="storageId" value="">
                </td>
                <td>${user.username}</td>
                <td>${user.email}</td>
                <td>${user.address}</td>
                <td>${user.phone_number}</td>
                <td align="center">
                    <a href="" onclick="showFormUpdateUser(event,'${user.user_id}','${user.username}','${user.email}','${user.address}','${user.phone_number}')"
                        class="fa fa-pencil-square-o">
                    </a>
                </td>
            </tr>`
        );
    });

    //show entries
    if (fromField != null && toNextField != null) {
        $(".textEntries")
            .empty()
            .append(
                `Đang hiển thị ${fromField} - ${toNextField} / ${totalField} mục`
            );
    } else {
        $(".textEntries").empty().append(`Không có mục nào để hiển thị`);
    }

    //total pagination
    for (var i = 1; i <= lastPage; i++) {
        paginationHtml += `<li class="paginate_button page-item ${
            page == i ? "active" : ""
        }"><a href="list-users/number_entries${numberEntries}?page=${i}"
                    aria-controls="bootstrap-data-table" data-dt-idx="${i}" class="page-link">${i}</a>
                </li>`;
    }

    //display button pagination
    $(".pagination")
        .empty()
        .append(
            `<li class="paginate_button page-item previous ${
                page == 1 ? "d-none" : ""
            }"
                    id="bootstrap-data-table_previous">
                        <a href="${previousPage}"
                            aria-controls="bootstrap-data-table"
                            class="page-link">Previous
                        </a></li>
                    ${paginationHtml}
                    <li class="paginate_button page-item next  ${
                        page == lastPage ? "d-none" : ""
                    }" id="bootstrap-data-table_next">
                            <a href="${nextPage}" aria-controls="bootstrap-data-table"
                            class="page-link">Next
                            </a>
                    </li>`
        );
}

function onCheckAll() {
    var isChecked = false;
    $('input[type="checkbox"]').each(function () {
        if ($(this).prop("checked")) {
            isChecked = true;
            return false;
        }
    });
    $('input[type="checkbox"]').prop("checked", !isChecked);
}

function onDeleteUsers(event) {
    event.preventDefault();
    var listUserID = [];
    var inputCheck = $('input[type="checkbox"]:checked');
    inputCheck.each(function () {
        var userID = $(this).attr("userID");
        listUserID.push(userID);
    });
    var url = event.target.href;
    var page = $('input[name="storagePageNumber"]').val();
    var numberEntries = $('input[name="storageNumberEntries"]').val();
    sendRequestDeleteUser(url, listUserID, numberEntries, page);
}

function sendRequestDeleteUser(url, listUserID, numberEntries, page) {
    $.ajax({
        url: url + `/number_entries${numberEntries}?page=${page}`,
        type: "DELETE",
        datatype: "json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            data: listUserID,
        },
        success: function (response) {
            loadListUserPagination(response, numberEntries, page);
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
        error: function (xhr, status, error) {
            Swal.fire({
                text: "Xóa thất bại!",
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

function showFormUpdateUser(
    event,
    userID,
    username,
    email,
    address,
    phone_number
) {
    event.preventDefault();
    $(".modal").addClass("open");
    $('input[name="storageId"]').val(userID);
    $('input[name="username"]').val(username);
    $('input[name="email"]').val(email);
    $('input[name="address"]').val(address);
    $('input[name="phone_number"]').val(phone_number);
}

function hideFormUpdateUser(event) {
    $(".modal").removeClass("open");
}

function onSubmitFormUpdateUser(event) {
    event.preventDefault();
    var userID = $('input[name="storageId"]').val();
    var username = $('input[name="username"]').val();
    var email = $('input[name="email"]').val();
    var address = $('input[name="address"]').val();
    var phone_number = $('input[name="phone_number"]').val();
    var page = $('input[name="storagePageNumber"]').val();
    var numberEntries = $('input[name="storageNumberEntries"]').val();
    sendUpdateData(
        userID,
        username,
        email,
        address,
        phone_number,
        numberEntries,
        page
    );
}

function sendUpdateData(
    userID,
    username,
    email,
    address,
    phone_number,
    numberEntries,
    page
) {
    $.ajax({
        url: `update-user${userID}/number_entries${numberEntries}?page=${page}`,
        type: "PUT",
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            username: username,
            email: email,
            address: address,
            phone_number: phone_number,
        },
        success: function (response) {
            loadListUserPagination(response, numberEntries, page);
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
            $(".modal").removeClass("open");
        },
        error: function (xhr, status, error) {
            Swal.fire({
                text: "Cập nhập thất bại!: " + status + ":" + error,
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

function onClearSearchAll() {
    $(".input-search-user").val("");
    var numberEntries = $('input[name="storageNumberEntries"]').val();
    loadPageFirst(numberEntries);
    $(".btn-reset-search").css("display", "none");
}

function onSearch(event) {
    var value = event.target.value;
    // var page = $('input[name="storagePageNumber"]').val();
    var numberEntries = $('input[name="storageNumberEntries"]').val();
    if (value === "") {
        loadPageFirst(numberEntries);
    } else {
        sendDataSearch(value, numberEntries);
    }
}

function sendDataSearch(value, numberEntries, page = 1) {
    $.ajax({
        url: `search-users/number_entries${numberEntries}?page=${page}`,
        type: "GET",
        dataType: "json",
        data: {
            valueSearch: value,
        },
        success: function (data) {
            $(".btn-reset-search").css("display", "inline");
            if (numberEntries != -1) {
                loadListUserPagination(data, numberEntries, page);
                var lastPage = data.last_page;
                var previousPage = data.prev_page_url + `&valueSearch=${value}`;
                var nextPage = data.next_page_url + `&valueSearch=${value}`;
                var paginationHtml = "";

                //total pagination
                for (var i = 1; i <= lastPage; i++) {
                    paginationHtml += `<li class="paginate_button page-item ${
                        page == i ? "active" : ""
                    }"><a href="search-users/number_entries${numberEntries}?page=${i}&valueSearch=${value}"
                        aria-controls="bootstrap-data-table" data-dt-idx="${i}" class="page-link">${i}</a>
                    </li>`;
                }

                //display button pagination
                $(".pagination")
                    .empty()
                    .append(
                        `<li class="paginate_button page-item previous ${
                            page == 1 ? "d-none" : ""
                        }"
                        id="bootstrap-data-table_previous">
                            <a href="${previousPage}"
                                aria-controls="bootstrap-data-table"
                                class="page-link">Previous
                            </a></li>
                        ${paginationHtml}
                        <li class="paginate_button page-item next  ${
                            page == lastPage ? "d-none" : ""
                        }" id="bootstrap-data-table_next">
                                <a href="${nextPage}" aria-controls="bootstrap-data-table"
                                class="page-link">Next
                                </a>
                        </li>`
                    );
            } else {
                loadListUserFull(data, numberEntries);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {},
    });
}

function sortAscending(fieldName, numberEntries, page) {
    $.ajax({
        url: `sort-ascending/number_entries${numberEntries}?page=${page}`,
        type: "GET",
        dataType: "json",
        data: {
            fieldName: fieldName,
        },
        success: function (data) {
            if (numberEntries != -1) {
                loadListUserPagination(data, numberEntries, page);
                var lastPage = data.last_page;
                var previousPage = data.prev_page_url + `&fieldName=${fieldName}`;
                var nextPage = data.next_page_url + `&fieldName=${fieldName}`;
                var paginationHtml = "";

                //total pagination
                for (var i = 1; i <= lastPage; i++) {
                    paginationHtml += `<li class="paginate_button page-item ${
                        page == i ? "active" : ""
                    }"><a href="sort-ascending/number_entries${numberEntries}?page=${i}&fieldName=${fieldName}"
                        aria-controls="bootstrap-data-table" data-dt-idx="${i}" class="page-link">${i}</a>
                    </li>`;
                }

                //display button pagination
                $(".pagination")
                    .empty()
                    .append(
                        `<li class="paginate_button page-item previous ${
                            page == 1 ? "d-none" : ""
                        }"
                        id="bootstrap-data-table_previous">
                            <a href="${previousPage}"
                                aria-controls="bootstrap-data-table"
                                class="page-link">Previous
                            </a></li>
                        ${paginationHtml}
                        <li class="paginate_button page-item next  ${
                            page == lastPage ? "d-none" : ""
                        }" id="bootstrap-data-table_next">
                                <a href="${nextPage}" aria-controls="bootstrap-data-table"
                                class="page-link">Next
                                </a>
                        </li>`
                    );
            } else {
                loadListUserFull(data, numberEntries);
            }
        },
        error: function () {},
    });
}

function sortDescending(fieldName, numberEntries, page) {
    $.ajax({
        url: `sort-descending/number_entries${numberEntries}?page=${page}`,
        type: "GET",
        dataType: "json",
        data: {
            fieldName: fieldName,
        },
        success: function (data) {
            if (numberEntries != -1) {
                loadListUserPagination(data, numberEntries, page);
                var lastPage = data.last_page;
                var previousPage = data.prev_page_url + `&fieldName=${fieldName}`;
                var nextPage = data.next_page_url + `&fieldName=${fieldName}`;
                var paginationHtml = "";

                //total pagination
                for (var i = 1; i <= lastPage; i++) {
                    paginationHtml += `<li class="paginate_button page-item ${
                        page == i ? "active" : ""
                    }"><a href="search-users/number_entries${numberEntries}?page=${i}&fieldName=${fieldName}"
                        aria-controls="bootstrap-data-table" data-dt-idx="${i}" class="page-link">${i}</a>
                    </li>`;
                }

                //display button pagination
                $(".pagination")
                    .empty()
                    .append(
                        `<li class="paginate_button page-item previous ${
                            page == 1 ? "d-none" : ""
                        }"
                        id="bootstrap-data-table_previous">
                            <a href="${previousPage}"
                                aria-controls="bootstrap-data-table"
                                class="page-link">Previous
                            </a></li>
                        ${paginationHtml}
                        <li class="paginate_button page-item next  ${
                            page == lastPage ? "d-none" : ""
                        }" id="bootstrap-data-table_next">
                                <a href="${nextPage}" aria-controls="bootstrap-data-table"
                                class="page-link">Next
                                </a>
                        </li>`
                    );
            } else {
                loadListUserFull(data, numberEntries);
            }
        },
        error: function () {},
    });
}
