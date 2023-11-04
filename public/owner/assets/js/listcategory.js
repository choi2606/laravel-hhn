jQuery(document).ready(function ($) {
	jQuery(".standardSelect").chosen({
		disable_search_threshold: 10,
		no_results_text: "Oops, nothing found!",
		width: "100%",
	});
});
function setValue(event, categoryID, categoryName) {
	event.preventDefault();
	$('input[name="categoryNameUpdate"]').val(categoryName);
	$('input[name="categoryID"]').val(categoryID);
}

function onSubmitCateUpdate(event) {
	event.preventDefault();
	var newCategory = $('input[name="categoryNameUpdate"]').val();
	var categoryID = $('input[name="categoryID"]').val();
	var data = {
		name: newCategory,
	};
	$.put("/update_category" + categoryID, data)
		.done(function (response) {
			$(".body-category").empty(); // Xóa danh sách danh mục hiện tại
			$.each(response, function (index, category) {
				$(".body-category").append(
					`<tr class="d-flex justify-content-between">
                <td class="w-100" scope="row">${index + 1}</td>
                <td class="w-100">${category.name}</td>
                <td class="w-100" align="end">
                    <a href="#" onclick = "setValue(event,${
											category.category_id
										},'${
						category.name
					}')" class="fa fa-pencil-square-o icon-update"></a>
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
				toastSuccess("Cập nhật thành công!");

				$('input[name="categoryNameUpdate"]').val("");
			});
		})
		.fail(function () {
			toastError("Cập nhật thất bại!");
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
	var data =  {
		name: category,
	};
	
	$.post("/add-category", data)
		.done(function (response) {
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
			toastSuccess("Thêm thành công!");

			$('input[name="categoryName"]').val("");
		})
		.fail(function(){
			toastError("Thêm thất bại!");
		});
}
