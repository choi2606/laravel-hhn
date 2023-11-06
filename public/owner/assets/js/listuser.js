var pathName = window.location.pathname.split("/")[1];

$(document).ready(function () {
	$(".modal").on("click", function () {
		hideFormUpdateUser();
	});

	$(".js-container-modal").on("click", function (event) {
		event.stopPropagation();
	});

	var arrTh = [];
	var elementsTh = $(".table-header-user > span");
	elementsTh.each(function (index, element) {
		arrTh.push(element.innerText);
	});

	$(document).on("click", ".pagination a", function (event) {
		event.preventDefault();
		var url = new URL(event.target.href);
		var numberEntries = url.pathname.split("number_entries")[1];
		var page = url.searchParams.get("page");
		var pathName = url.pathname.split("/")[1];
		var valueSearch = url.searchParams.get("valueSearch");
		var fieldName = url.searchParams.get("fieldName");
		switch (pathName) {
			case "update-user":
			case "delete-users":
				getDataOnURL(pathName, numberEntries, page);
				break;
			case "search-users":
				sendDataSearch(valueSearch, numberEntries, page);
				break;
			case "sort-ascending":
				sortAscending(fieldName, page);
				break;
			case "sort-descending":
				sortDescending(fieldName, page);
				break;
			default:
				loadPageFirst(pathName, numberEntries, page);
				break;
		}
	});
	loadPageFirst(pathName, 10);

	var isSort = false;
	$(".box-icon-arrange").on("click", function (e) {
		var page = $('input[name="storagePageNumber"]').val();
		var numberEntries = $('input[name="storageNumberEntries"]').val();
		var fieldName = $(this).closest(".table-header-user").find("span").text();

		switch (fieldName) {
			case arrTh[0]:
				fieldName = "username";
				break;
			case arrTh[1]:
				fieldName = "email";
				break;
			case arrTh[2]:
				fieldName = "address";
				break;
			default:
				fieldName = "phone_number";
				break;
		}

		if (!isSort) {
			sortAscending(fieldName, page);
			isSort = true;
		} else {
			sortDescending(fieldName, page);
			isSort = false;
		}
	});
});

function onChangeEntries(event) {
	var numberEntries = event.target.value;
	loadPageFirst(pathName, numberEntries);
}

function loadPageFirst(pathName, numberEntries, page = 1) {
	$.get(`${pathName}${searchParam(numberEntries, page)}`)
		.done(function (data) {
			numberEntries != -1
				? loadListUserPagination(pathName, data, numberEntries, page)
				: loadListUserFull(data, numberEntries);
		})
		.fail(function () {});
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
                    <a href="delete-users" userID = "${user.user_id}" data-confirm-delete="true"
                        class="fa fa-times icon-delete-user">
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

function loadListUserPagination(pathName, data, numberEntries, page = 1) {
	$(".tbody-user")
		.empty()
		.append(
			`<input type="hidden" name="storagePageNumber" value="${page}"><input type="hidden" name="storageNumberEntries" value="${numberEntries}">`
		);
	var users = data.data;
	paginate(pathName, searchParam, data, page);
	$.each(users, function (index, user) {
		$(".tbody-user").append(
			`<tr>
                <td>
                <input type="checkbox" class="input-checkbox-user" userID = "${user.user_id}">
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
                    <a href="delete-users" userID = "${user.user_id}" data-confirm-delete="true"
                        class="fa fa-times icon-delete-user">
                    </a>
                </td>
            </tr>`
		);
	});
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
	var data = {
		username: username,
		email: email,
		address: address,
		phone_number: phone_number,
		userID: userID,
	};

	$.put(`update-user${searchParam(numberEntries, page)}`, data)
		.done(function (data) {
			loadListUserPagination("update-user", data, numberEntries, page);
			if (numberEntries == -1) {
				loadListUserFull(data, numberEntries);
			}
			toastSuccess("Cập nhật thành công!");
			$(".modal").removeClass("open");
		})
		.fail(function (xhr, status, error) {
			toastError("Cập nhật thất bại!: " + status + ":" + error);
		});
}

function getDataOnURL(pathName, numberEntries, page) {
	$.get(`${pathName}${searchParam(numberEntries, page)}`)
		.done(function (data) {
			loadListUserPagination(pathName, data, numberEntries, page);
		})
		.fail(function () {});
}

function onClearSearchAll() {
	$(".input-search-user").val("");
	var numberEntries = $('input[name="storageNumberEntries"]').val();
	loadPageFirst(pathName, numberEntries);
	$(".btn-reset-search").css("display", "none");
}

function onSearch(event) {
	var value = event.target.value;
	var numberEntries = $('input[name="storageNumberEntries"]').val();
	if (value === "") {
		loadPageFirst(pathName, numberEntries);
	} else {
		sendDataSearch(value, numberEntries);
	}
}

function sendDataSearch(value, numberEntries, page = 1) {
	var data = {
		valueSearch: value,
	};
	$.get(`search-users${searchParam(numberEntries, page)}`, data)
		.done(function (data) {
			$(".btn-reset-search").css("display", "inline");
			if (numberEntries != -1) {
				loadListUserPagination("search-users", data, numberEntries, page);
				var lastPage = data.last_page;
				var previousPage = data.prev_page_url + `&valueSearch=${value}`;
				var nextPage = data.next_page_url + `&valueSearch=${value}`;
				var paginationHtml = "";

				for (var i = 1; i <= lastPage; i++) {
					paginationHtml += `<li class="paginate_button page-item ${
						page == i ? "active" : ""
					}"><a href="search-users${searchParam(
						numberEntries,
						i
					)}&valueSearch=${value}"
						aria-controls="bootstrap-data-table" data-dt-idx="${i}" class="page-link">${i}</a>
					</li>`;
				}

				buttonPaginate(page, previousPage, paginationHtml, lastPage, nextPage);
			} else {
				loadListUserFull(data, numberEntries);
			}
		})
		.fail(function () {});
}

function sortAscending(fieldName, page) {
	sort("sort-ascending", searchParam, page, fieldName);
}

function sortDescending(fieldName, page) {
	sort("sort-descending", searchParam, page, fieldName);
}
