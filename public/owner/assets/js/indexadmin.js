$(document).ready(function () {
	$(".modal").on("click", function () {
		hideProducts();
	});

	$(".js-container-modal").on("click", function (event) {
		event.stopPropagation();
	});
});

function showProduct(event) {
	event.preventDefault();
	$(".modal").addClass("open");
	url = event.target.href;

	$.get(url)
		.done(function (data) {
			$(".tbody-order-detail").empty();
			$.each(data, function (index = 1, orderDetail) {
				$(".tbody-order-detail").append(
					`<tr>
            <td class="serial">${index + 1}.</td>
            <td><span class="name">${orderDetail.username}</span></td>
            <td><span class="total_product">
                ${orderDetail.name}
                </span></td>
            <td><span class="count">${orderDetail.quantity}</span></td>
            <td><span class="count">${orderDetail.unit_price
							.toString()
							.replace(/\B(?=(\d{3})+(?!\d))/g, ".")}đ/1</span></td>
        </tr>`
				);
			});
		})
		.fail(function (err) {});
}

function hideProducts(event) {
	$(".modal").removeClass("open");
}
