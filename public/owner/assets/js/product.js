function loadProductsFirst(page = 1) {
    $.ajax({
        url: `list-products?page=${page}`,
        typeof: "GET",
        dataType: "json",
        success: function (data) {
            loadListProductPagination(data, page);
        },
        error: function (jqXHR, textStatus, errorThrown) {},
    });
}

function loadListProductPagination(data, page = 1) {
    $(".tbody-order")
        .empty()
        .append(
            `<input type="hidden" name="storagePageNumber" value="${page}">`
        );
    var products = data.data;
    var lastPage = data.last_page;
    var previousPage = data.prev_page_url;
    var nextPage = data.next_page_url;
    var fromField = data.from;
    var toNextField = data.to;
    var totalField = data.total;
    var paginationHtml = "";
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
                    <td><span class="">$${product.price}</span></td>
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
        }"><a href="list-products?page=${i}"
                    aria-controls="bootstrap-data-table" data-dt-idx="${i}" class="page-link">${i}</a>
                </li>`;
    }

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

function loadListProductOnURLDelete(page) {
    $.ajax({
        url: `remove-product?page=${page}`,
        type: "GET",
        dataType: "json",
        success: function (data) {
            loadListProductPagination(data, page);
        },
        error: function (jqXHR, textStatus, errorThrown) {},
    });
}

function showFormUpdateProduct(
    event,
    product_id,
    category_name,
    product_name,
    description,
    price,
    image_url
) {
    event.preventDefault();
    $(".modal").addClass("open");
    $("input[name=storageId]").val(product_id);
    $("input[name=productName]").val(product_name);
    $("textarea[name=productDesc]").val(description);
    $("input[name=productPrice]").val(price);
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
    $.ajax({
        url: `search-products?page=${page}&value=${value}`,
        type: "GET",
        dataType: "json",
        data: {
            valueSearch: value,
        },
        success: function (data) {
            loadListProductPagination(data, page);
            var lastPage = data.last_page;
            var previousPage = data.prev_page_url + `&valueSearch=${value}`;
            var nextPage = data.next_page_url + `&valueSearch=${value}`;
            var paginationHtml = "";

            //total pagination
            for (var i = 1; i <= lastPage; i++) {
                paginationHtml += `<li class="paginate_button page-item ${
                    page == i ? "active" : ""
                }"><a href="search-products?page=${i}&valueSearch=${value}"
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
        },
        error: function (jqXHR, textStatus, errorThrown) {},
    });
}

function sortAscendingProduct(fieldName, page) {
    $.ajax({
        url: `sort-ascending-products?page=${page}&fieldName=${fieldName}`,
        type: "GET",
        dataType: "json",
        data: {
            fieldName: fieldName,
        },
        success: function (data) {
            loadListProductPagination(data, page);
            var lastPage = data.last_page;
            var previousPage = data.prev_page_url + `&fieldName=${fieldName}`;
            var nextPage = data.next_page_url + `&fieldName=${fieldName}`;
            var paginationHtml = "";

            //total pagination
            for (var i = 1; i <= lastPage; i++) {
                paginationHtml += `<li class="paginate_button page-item ${
                    page == i ? "active" : ""
                }"><a href="sort-ascending-products?page=${i}&fieldName=${fieldName}"
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
        },
        error: function () {},
    });
}

function sortDescendingProduct(fieldName, page) {
    $.ajax({
        url: `sort-descending-products?page=${page}&fieldName=${fieldName}`,
        type: "GET",
        dataType: "json",
        data: {
            fieldName: fieldName,
        },
        success: function (data) {
            loadListProductPagination(data, page);
            var lastPage = data.last_page;
            var previousPage = data.prev_page_url + `&fieldName=${fieldName}`;
            var nextPage = data.next_page_url + `&fieldName=${fieldName}`;
            var paginationHtml = "";

            //total pagination
            for (var i = 1; i <= lastPage; i++) {
                paginationHtml += `<li class="paginate_button page-item ${
                    page == i ? "active" : ""
                }"><a href="search-users?page=${i}&fieldName=${fieldName}"
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
        },
        error: function () {},
    });
}

function onResetValue(event) {
    $('.selectCate').val("");
    $('input[name="productName"]').val("");
    $('textarea[name="productDesc"]').val("");
    $('input[name="productPrice"]').val("");
    $('input[name="productImage"]').val("");
}
