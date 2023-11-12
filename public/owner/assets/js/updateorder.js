$(document).ready(function () {
	$(".modal1").on("click", function () {
		hideFormUpdateUser();
	});

	$(".js-container-modal1").on("click", function (event) {
		event.stopPropagation();
	});
});

function showProduct(event) {
	event.preventDefault();
	$(".modal1").addClass("open");
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
		.fail(function (error) {});
}

function hideProducts(event) {
	$(".modal1").removeClass("open");
}


function showFormUpdateOrder(event) {
	event.preventDefault();
	var status = event.target.getAttribute("data-status");
    console.log(status);
	if (status == "success") {
	} else if (status == 'pending') {
        $("#checked").html(
			'<div class="radio">' +
				"<label>" +
				'<input type="radio" name="status" id="private" class="input-radio" value="delivering">' +
				"Đang giao" +
				"</label>" +
			"</div>" +
            '<div class="radio">' +
				"<label>" +
				'<input type="radio" name="status" id="private" class="input-radio" value="pending" checked>' +
				"Đang chờ" +
				"</label>" +
			"</div>" +
            '<div class="radio">' +
				"<label>" +
				'<input type="radio" name="status" id="private" class="input-radio" value="cancel">' +
				"Hủy" +
				"</label>" +
			"</div>"
		);
    } else if (status == 'delivering') {
        $("#checked").html(
			'<div class="radio">' +
				"<label>" +
				'<input type="radio" name="status" id="private" class="input-radio" value="delivering" checked>' +
				"Đang giao" +
				"</label>" +
			"</div>" +
            '<div class="radio">' +
				"<label>" +
				'<input type="radio" name="status" id="private" class="input-radio" value="pending">' +
				"Đang chờ" +
				"</label>" +
			"</div>" +
            '<div class="radio">' +
				"<label>" +
				'<input type="radio" name="status" id="private" class="input-radio" value="cancel">' +
				"Hủy" +
				"</label>" +
			"</div>"
		);
    }
    else {
        $("#checked").html(
			'<div class="radio">' +
				"<label>" +
				'<input type="radio" name="status" id="private" class="input-radio" value="delivering">' +
				"Đang giao" +
				"</label>" +
			"</div>" +
            '<div class="radio">' +
				"<label>" +
				'<input type="radio" name="status" id="private" class="input-radio" value="pending">' +
				"Đang chờ" +
				"</label>" +
			"</div>" +
            '<div class="radio">' +
				"<label>" +
				'<input type="radio" name="status" id="private" class="input-radio" value="cancel" checked>' +
				"Hủy" +
				"</label>" +
			"</div>"
		);
    }
	var href = event.target.href;
	$(".modal-edit").fadeIn(500);
	$(".btn-done-edit").click(function (ev) {
		$("form#form-edit").attr("action", href);
		$(".modal-edit").fadeOut(500);
		$("form#form-edit").submit();
	});
}

function hideFormUpdateOrder(e) {
    e.preventDefault();
    $(".modal").css('display', 'none');
}