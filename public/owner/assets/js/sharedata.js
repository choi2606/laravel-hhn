function searchParam(numberEntries, page) {
	return `/number_entries${numberEntries}?page=${page}`;
}

function searchParams(page) {
	return `?page=${page}`;
}

function paginate(pathName, searchParamsCallBack, data, page) {
	var lastPage = data.last_page;
	var previousPage = data.prev_page_url;
	var nextPage = data.next_page_url;
	var fromField = data.from;
	var toNextField = data.to;
	var totalField = data.total;
	var paginationHtml = "";
	if (fromField != null && toNextField != null) {
		$(".textEntries")
			.empty()
			.append(
				`Đang hiển thị ${fromField} - ${toNextField} / ${totalField} mục`
			);
	} else {
		$(".textEntries").empty().append(`Không có mục nào để hiển thị`);
	}

	function buildSearchParams(callback, page) {
		if (callback === searchParam) {
			return searchParam(numberEntries, page);
		} else if (callback == searchParams) {
			return searchParams(page);
		}
		return "";
	}

	var searchParamsS = function (page) {
		return pathName + buildSearchParams(searchParamsCallBack, page);
	};
	//total pagination
	for (var i = 1; i <= lastPage; i++) {
		paginationHtml += `<li class="paginate_button page-item ${
			page == i ? "active" : ""
		}"><a href="${searchParamsS(i)}"
            aria-controls="bootstrap-data-table" data-dt-idx="${i}" class="page-link">${i}</a>
        </li>`;
	}
	buttonPaginate(page, previousPage, paginationHtml, lastPage, nextPage);
}

function buttonPaginate(
	page,
	previousPage,
	paginationHtml,
	lastPage,
	nextPage
) {
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

function sort(pathName, searchParamsCallBack, page, fieldName) {
	var numberEntries = $('input[name="storageNumberEntries"]').val();
	function buildSearchParams(callback, page) {
		if (callback === searchParam) {
			return searchParam(numberEntries, page);
		} else if (callback == searchParams) {
			return searchParams(page);
		}
		return "";
	}

	var data = {
		fieldName: fieldName,
	};

	$.get(`${pathName}${buildSearchParams(searchParamsCallBack, page)}`, data)
		.done(function (data) {
			if (
				buildSearchParams(searchParamsCallBack, page) ===
				searchParam(numberEntries, page)
			) {
				loadListUserPagination(pathName, data, numberEntries, page);
			} else if (
				buildSearchParams(searchParamsCallBack, page) === searchParams(page)
			) {
				loadListProductPagination(pathName, data, page);
			}

			var lastPage = data.last_page;
			var previousPage = data.prev_page_url + `&fieldName=${fieldName}`;
			var nextPage = data.next_page_url + `&fieldName=${fieldName}`;
			var paginationHtml = "";

			//total pagination
			for (var i = 1; i <= lastPage; i++) {
				paginationHtml += `<li class="paginate_button page-item ${
					page == i ? "active" : ""
				}"><a href="${pathName}${buildSearchParams(
					searchParamsCallBack,
					i
				)}&fieldName=${fieldName}"
                aria-controls="bootstrap-data-table" data-dt-idx="${i}" class="page-link">${i}</a>
            </li>`;
			}

			//display button pagination
			buttonPaginate(page, previousPage, paginationHtml, lastPage, nextPage);
		})
		.fail();
}

function modal() {
	$(".modal").on("click", function () {
		hideFormUpdateUser();
	});

	$(".js-container-modal").on("click", function (event) {
		event.stopPropagation();
	});
}

function clickPaginate(event) {
	event.preventDefault();
	var url = new URL(event.target.href);
	var page = url.searchParams.get("page");
	pathName = url.pathname.split("/")[1];
	var valueSearch = url.searchParams.get("valueSearch");
	var fieldName = url.searchParams.get("fieldName");
	var numberEntries = url.pathname.split("number_entries")[1];

	var values = {
		page: page,
		pathName: pathName,
		valueSearch: valueSearch,
		fieldName: fieldName,
		numberEntries: numberEntries,
	};
	return values;
}

function pushSort(fieldName) {
	
	var arrTh = [];
	var elementsTh = $(".table-header-user > span");
	elementsTh.each(function (index, element) {
		arrTh.push(element.innerText);
	});
	var isSort = false;
	$(".box-icon-arrange").on("click", function (e) {
		var page = $('input[name="storagePageNumber"]').val();

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
			case arrTh[3]:
				fieldName = "phone_number";
				break;
			case arrTh[4]:
				fieldName = "role";
				break;
			
			default:
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
}