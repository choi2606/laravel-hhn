var pathName = window.location.pathname.split("/")[1];
$(function () {
	$(".modal").on("click", function () {
		hideFormUpdateProduct();
	});

	$(".js-container-modal").on("click", function (event) {
		event.stopPropagation();
	});

	$(document).on("click", ".pagination a", function (event) {
		event.preventDefault();
		var url = new URL(event.target.href);
		var page = url.searchParams.get("page");
		pathName = url.pathname.split("/")[1];
		var valueSearch = url.searchParams.get("valueSearch");
		var fieldName = url.searchParams.get("fieldName");
		switch (pathName) {
			case "remove-product":
				loadListProductOnURLDelete(page);
				break;
			case "search-products":
				sendDataSearchProduct(valueSearch, page);
				break;
			case "sort-ascending-products":
				sortAscendingProduct(fieldName, page);
				break;
			case "sort-descending-products":
				sortDescendingProduct(fieldName, page);
				break;
			default:
				loadProductsFirst(page);
				break;
		}
	});
	loadProductsFirst();

	var arrTh = [];
	var elementsTh = $(".table-header-product > span");
	elementsTh.each(function (index, element) {
		arrTh.push(element.innerText);
	});
	var isSort = false;
	$(".box-icon-arrange").on("click", function (e) {
		var page = $('input[name="storagePageNumber"]').val();
		var fieldName = $(this)
			.closest(".table-header-product")
			.find("span")
			.text();

		switch (fieldName) {
			case arrTh[0]:
				fieldName = "product_name";
				break;
			case arrTh[1]:
				fieldName = "price";
				break;
			default:
				break;
		}

		if (!isSort) {
			sortAscendingProduct(fieldName, page);
			isSort = true;
		} else {
			sortDescendingProduct(fieldName, page);
			isSort = false;
		}
	});
});

function loadProductsFirst(page = 1) {
	$.get(`list-products?page=${page}`)
		.done(function (data) {
			loadListProductPagination(data, page);
		})
		.fail(function () {});
}

function loadListProductPagination(data, page = 1) {
	$(".tbody-order")
		.empty()
		.append(`<input type="hidden" name="storagePageNumber" value="${page}">`);
	var products = data.data;
	paginate(pathName, searchParams, data, page);
	$.each(products, function (index, product) {
		$(".tbody-order").append(
			`<tr>
            <td class="serial">${
							index + 1
						}.<input type="hidden" name="storageId" value=""></td>
            <td><span class="">${product.category_name}</span></td>
            <td><span class="">
                    ${product.product_name}
                </span></td>
            <td><span class="">${product.description}</span></td>
            <td><span class="">${product.price
							.toString()
							.replace(/\B(?=(\d{3})+(?!\d))/g, ".")}đ</span></td>
            <td><span class="">${product.quantity}</span></td>
            <td>
                <img src="./client/images/product/${product.image_url}"
                    width="50" height="50" alt="">
            </td>
            <td align="center">
                <a href=""
                    onclick="showFormUpdateProduct(event,
                        '${product.product_id}',
                        '${product.category_name}',
                        '${product.product_name}',
                        '${product.description}', 
                        '${product.price}', 
                        '${product.quantity}', 
                        '${product.image_url}')"
                    class="fa fa-pencil-square-o">
                </a>
                <a href="remove-product" productID = "${
									product.product_id
								}" data-confirm-delete="true"
                    class="fa fa-times">
                </a>
            </td>
        </tr>`
		);
	});
}

function loadListProductOnURLDelete(page) {
	$.get(`remove-product?page=${page}`)
		.done(function (data) {
			loadListProductPagination(data, page);
		})
		.fail(function () {});
}

function showFormUpdateProduct(
	event,
	product_id,
	category_name,
	product_name,
	description,
	price,
	quantity,
	image_url
) {
	event.preventDefault();
	$(".modal").addClass("open");
	$("input[name=storageId]").val(product_id);
	$("input[name=productName]").val(product_name);
	$("textarea[name=productDesc]").val(description);
	$("input[name=productPrice]").val(price);
	$("input[name=productQuantity]").val(quantity);
	$(".image-product")
		.empty()
		.append(
			`<input type="file" id="image-input" name="productImage" class="form-control-file" accept="image/*">
<img src="./client/images/product/${image_url}" width="50" height="50" alt="">`
		);
	var selectCate = $("#select-cate");
	var findOption = selectCate.find(`option:contains("${category_name}")`);
	selectCate.val(findOption.val());
	selectCate.trigger("change");
}

function hideFormUpdateProduct(event) {
	event.preventDefault();
	$(".modal").removeClass("open");
}

function onSubmitFormUpdateProduct(event) {
	var productID = $("input[name=storageId]").val();
	var eleFormUpdate = $(".form-update-product");
	eleFormUpdate.attr("action", "update-product" + productID);
	$(".form-update-product").submit();
}

function onClearSearchProduct(event) {
	$("input[name=searchProduct]").val("");
	loadProductsFirst();
}

function onFocusSearchProduct(event) {
	$(".close-search").show();
}

function onBlurSearchProduct(event) {
	value = event.target.value;
	if (value == "") {
		$(".close-search").hide();
		loadProductsFirst();
	} else {
		sendDataSearchProduct(value);
	}
}

function sendDataSearchProduct(value, page = 1) {
	var data = {
		valueSearch: value,
	};
	$.get(`search-products?page=${page}`, data)
		.done(function (data) {
			loadListProductPagination(data, page);
			var lastPage = data.last_page;
			var previousPage = data.prev_page_url + `&valueSearch=${value}`;
			var nextPage = data.next_page_url + `&valueSearch=${value}`;
			var paginationHtml = "";
			//total pagination
			for (var i = 1; i <= lastPage; i++) {
				paginationHtml += `<li class="paginate_button page-item ${
					page == i ? "active" : ""
				}"><a href="search-products${searchParams(i)}&valueSearch=${value}"
                aria-controls="bootstrap-data-table" data-dt-idx="${i}" class="page-link">${i}</a>
            </li>`;
			}

			//display button pagination#
			buttonPaginate(page, previousPage, paginationHtml, lastPage, nextPage);
		})
		.fail(function () {});
}

function sortAscendingProduct(fieldName, page) {
	sort("sort-ascending-products", searchParams, page, fieldName);
}

function sortDescendingProduct(fieldName, page) {
	sort("sort-descending-products", searchParams, page, fieldName);
}
