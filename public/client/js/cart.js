var listChange = {};
var total = $("#total-price").text().split("đ")[0] * 1000;
$(document).ready(function () {
	$(".btn-update-card").click(function (e) {
		var totalCurrent = $("#total").text().split("đ")[0];
		var totalPrice = $("#total-price").text().split("đ")[0];
		var totalSub = (totalCurrent - totalPrice) * 1000;
		e.preventDefault();
		$.ajax({
			url: e.target.href,
			type: "GET",
			datatype: "json",
			data: {
				dataUpdate: listChange,
			},
			success: function (data) {
				newTotal = 0;
				$.each(data, function (index, item) {
					newTotal += item.price * item.quantity;
				});
				console.log(totalSub);
				total = newTotal;
				var newTotalPrice = newTotal - totalSub;
				$("#total")
					.empty()
					.append(
						newTotal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + "đ"
					);

				$("#total-price")
					.empty()
					.append(
						(newTotalPrice < 0 ? 0 : newTotalPrice)
							.toString()
							.replace(/\B(?=(\d{3})+(?!\d))/g, ".") + "đ"
					);
			},
			error: function (jqXHR, textStatus, errorThrown) {},
		});
	});

	$('input[name="quantity"]').change(function (event) {
		var id = $(this).parents("tr").attr("rowId");
		var quantityNew = $(this).val();
		updateTotalPrice(id, quantityNew);
	});

	$(".form-apply-discount").on("submit", function (e) {
		e.preventDefault();
		if ($("input[name=discountName]").val() == "") {
			toastError("Vui lòng nhập mã giảm giá");
		} else {
			var formData = $(this).serialize();
			$.ajax({
				url: "apply-discount",
				method: "POST",
				dataType: "json",
				data: formData,
				success: function (data) {
					var feeTransport = $("#fee-ship").text().split("đ")[0];
					var totalPrice = data.total + parseInt(feeTransport) * 1000;
					console.log(totalPrice);
					total = data.total;
					$("#total-price")
						.empty()
						.append(
							(totalPrice < 0 ? 0 : totalPrice)
								.toString()
								.replace(/\B(?=(\d{3})+(?!\d))/g, ".") + "đ"
						);
					$("#discount")
						.empty()
						.append(
							`-${String(Number(data.discount).toFixed(0)).replace(
								/\B(?=(\d{3})+(?!\d))/g,
								"."
							)}${data.type == 1 ? "%" : "đ"}`
						);
				},
				error: function (jqXHR, textStatus, errorTh) {
					$("#discount-view").addClass("d-none");
					toastError("Áp dụng mã thất bại!");
				},
			});
		}
	});

	var Parameter = {
		url: "vietnam",
		method: "GET",
		responseType: "application/json",
	};
	//gọi ajax = axios => nó trả về cho chúng ta là một promise
	var promise = axios(Parameter);
	//Xử lý khi request thành công
	promise.then(function (result) {
		renderProvince(result.data);
	});

	var toProvince = "";
	var toDistrict = "";
	var toWard = "";

	$(".btn-feeTransport").click(function (e) {
		e.preventDefault();
		toProvince = $('select[id="province"] option:selected').text();
		toDistrict = $('select[id="district"] option:selected').text();
		toWard = $('select[id="ward"] option:selected').text();

		getProvinceID(toProvince)
			.then(function (toProvinceID) {
				return getDistricts(toProvinceID, toDistrict);
			})
			.then(function ({ districtID, ProvinceID }) {
				return getWards(districtID, toWard, ProvinceID);
			})
			.then(function ({ wardCode, provinceID, districtID }) {
				getFeeTransport(wardCode, provinceID, districtID);
			})
			.catch(function (Exception) {
				console.log(Exception);
			});
	});

	$(".btn-payment").click(function (e) {
		e.preventDefault();
		var total = $("#total").text().split("đ")[0];
		var feeShip = $("#fee-ship").text().split("đ")[0];
		var discount = $("#discount").text();
		var totalPrice = $("#total-price").text().split("đ")[0];
		if (feeShip == 0) {
			toastError("Vui lòng chọn điểm đến");
		} else {
			var data = {
				_token: $('meta[name="csrf-token"]').attr("content"),
				total: total,
				feeShip: feeShip,
				discount: discount,
				totalPrice: totalPrice,
				province: toProvince,
				district: toDistrict,
				ward: toWard,
			};
			$.post(e.target.href, data)
				.done(function (response) {
					window.location.href = e.target.href;
				})
				.fail(function (jqXHR, textStatus, error) {});
		}
	});
});

function getFeeTransport(WardCode, provinceID, DistrictID) {
	$.ajax({
		url: "https://online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/fee",
		type: "GET",
		headers: {
			token: "5b04fe73-779b-11ee-af43-6ead57e9219a",
			shop_id: 4665856,
		},
		data: {
			service_id: provinceID == 203 ? 53320 : 53321, // 203: Da Nang City, 53320: method normal, 53321: method Economical
			service_type_id: null,
			from_ward_code: "40401",
			from_district_id: 1529,
			to_district_id: DistrictID,
			to_ward_code: WardCode,
			weight: 500,
			height: 15,
			length: 15,
			width: 15,
			insurance_value: 50000,
			cod_failed_amount: 2000,
			coupon: null,
		},
		success: function (data) {
			var fee = data.data;
			var totalPrice = total + fee.total;
			$("#total-price")
				.empty()
				.append(
					(totalPrice < 0 ? 0 : totalPrice)
						.toString()
						.replace(/\B(?=(\d{3})+(?!\d))/g, ".") + "đ"
				);
			$("#fee-ship")
				.empty()
				.append(
					`${String(Number(fee.total).toFixed(0)).replace(
						/\B(?=(\d{3})+(?!\d))/g,
						"."
					)}đ`
				);
			toastSuccess(
				"Ước tính thành công! Phí: " +
					fee.total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") +
					"đ"
			);
		},
		error: function (err) {
			toastError(
				"Ước tính thất bại... Vùng hoặc địa phương đó không hỗ trợ vận chuyển!"
			);
		},
	});
}

function getWards(districtID, ward, province) {
	return new Promise(function (resolve, reject) {
		var foundWardCode = null;
		$.ajax({
			url: "https://online-gateway.ghn.vn/shiip/public-api/master-data/ward",
			type: "GET",
			headers: {
				token: "5b04fe73-779b-11ee-af43-6ead57e9219a",
			},
			data: {
				district_id: districtID,
			},
			success: function (response) {
				var data = response.data;
				$.each(data, function (index, item) {
					if (ward.includes(item.WardName)) {
						foundWardCode = item.WardCode;
						return false;
					}
				});
				resolve({ wardCode: foundWardCode, provinceID: province, districtID });
			},
			error: function (error) {
				reject("Error occurred during AJAX request.");
			},
		});
	});
}

function getProvinceID(province) {
	return new Promise(function (resolve, reject) {
		var foundProvinceID = null;
		$.ajax({
			url: "https://online-gateway.ghn.vn/shiip/public-api/master-data/province",
			type: "GET",
			headers: {
				token: "5b04fe73-779b-11ee-af43-6ead57e9219a",
			},
			success: function (data) {
				data = data.data;
				$.each(data, function (i, item) {
					if (province.includes(item.ProvinceName)) {
						foundProvinceID = item.ProvinceID;
						return false;
					}
				});
				resolve(foundProvinceID);
			},
			error: function () {
				reject("Error occurred during AJAX request.");
			},
		});
	});
}

function getDistricts(ProvinceID, district) {
	return new Promise(function (resolve, reject) {
		var foundDistrictID = null;
		$.ajax({
			url: "https://online-gateway.ghn.vn/shiip/public-api/master-data/district",
			type: "GET",
			headers: {
				token: "5b04fe73-779b-11ee-af43-6ead57e9219a",
			},
			data: {
				province_id: ProvinceID,
			},
			success: function (data) {
				var data = data.data;
				$.each(data, function (i, item) {
					if (district.includes(item.DistrictName)) {
						foundDistrictID = item.DistrictID;
						return false;
					}
				});
				resolve({ districtID: foundDistrictID, ProvinceID });
			},
			error: function (err) {
				reject("Error occurred during AJAX request.");
			},
		});
	});
}

function onPlusQuantity(event) {
	var id = $(event.target).parents("tr").attr("rowId");
	// Stop acting like a button
	event.preventDefault();
	// Get the field name
	var quantity = parseInt($("#quantity" + id).val());

	// If is not undefined

	$("#quantity" + id).val(quantity + 1);
	var quantityNew = $("#quantity" + id).val();
	updateTotalPrice(id, quantityNew);

	// Increment
}

function onMinusQuantity(event) {
	event.preventDefault();
	// Get the field name
	var id = $(event.target).parents("tr").attr("rowId");

	var quantity = parseInt($("#quantity" + id).val());

	// If is not undefined

	// Increment
	if (quantity > 1) {
		$("#quantity" + id).val(quantity - 1);
	}
	var quantityNew = $("#quantity" + id).val();
	updateTotalPrice(id, quantityNew);
}

function updateTotalPrice(id, quantityNew) {
	listChange[id] = quantityNew;
	var getPriceString = $("#price_product" + id)
		.text()
		.split("đ")[0];
	getPriceString = getPriceString.replace(".", "");
	var price = parseInt(getPriceString);
	var total_price = price * quantityNew;
	$("#total_price" + id).text(
		total_price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + "đ"
	);
}

function renderProvince(data) {
	for (const x of data) {
		province.options[province.options.length] = new Option(x.Name, x.Id);
	}

	// xứ lý khi thay đổi tỉnh thành thì sẽ hiển thị ra quận huyện thuộc tỉnh thành đó
	province.onchange = function () {
		district.length = 1;
		ward.length = 1;
		if (this.value != "") {
			const result = data.filter((n) => n.Id === this.value);

			for (const k of result[0].Districts) {
				district.options[district.options.length] = new Option(k.Name, k.Id);
			}
		}
	};

	// xứ lý khi thay đổi quận huyện thì sẽ hiển thị ra phường xã thuộc quận huyện đó
	district.onchange = function () {
		ward.length = 1;
		const dataCity = data.filter((n) => n.Id === province.value);
		if (this.value != "") {
			const dataWards = dataCity[0].Districts.filter(
				(n) => n.Id === this.value
			)[0].Wards;

			for (const w of dataWards) {
				ward.options[ward.options.length] = new Option(w.Name, w.Id);
			}
		}
	};
}