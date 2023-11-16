$(document).ready(function () {
	$(".modal").on("click", function () {
		hideProducts();
	});

	$(".js-container-modal").on("click", function (event) {
		event.stopPropagation();
	});

    if ($("#traffic-chart").length) {
		var chart = new Chartist.Line(
			"#traffic-chart",
			{
				labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
				series: [
					[0, 18000, 35000, 25000, 22000, 0],
					[0, 33000, 15000, 20000, 15000, 300],
					[0, 15000, 28000, 15000, 30000, 5000],
				],
			},
			{
				low: 0,
				showArea: true,
				showLine: false,
				showPoint: false,
				fullWidth: true,
				axisX: {
					showGrid: true,
				},
			}
		);

		chart.on("draw", function (data) {
			if (data.type === "line" || data.type === "area") {
				data.element.animate({
					d: {
						begin: 2000 * data.index,
						dur: 2000,
						from: data.path
							.clone()
							.scale(1, 0)
							.translate(0, data.chartRect.height())
							.stringify(),
						to: data.path.clone().stringify(),
						easing: Chartist.Svg.Easing.easeOutQuint,
					},
				});
			}
		});
	}
    
	// Traffic Chart using chartist End
	//Traffic chart chart-js
	if ($("#TrafficChart").length) {
		var ctx = document.getElementById("TrafficChart");
		ctx.height = 150;
		var myChart = new Chart(ctx, {
			type: "line",
			data: {
				labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
				datasets: [
					{
						label: "Visit",
						borderColor: "rgba(4, 73, 203,.09)",
						borderWidth: "1",
						backgroundColor: "rgba(4, 73, 203,.5)",
						data: [0, 2900, 5000, 3300, 6000, 3250, 0],
					},
					{
						label: "Bounce",
						borderColor: "rgba(245, 23, 66, 0.9)",
						borderWidth: "1",
						backgroundColor: "rgba(245, 23, 66,.5)",
						pointHighlightStroke: "rgba(245, 23, 66,.5)",
						data: [0, 4200, 4500, 1600, 4200, 1500, 4000],
					},
					{
						label: "Targeted",
						borderColor: "rgba(40, 169, 46, 0.9)",
						borderWidth: "1",
						backgroundColor: "rgba(40, 169, 46, .5)",
						pointHighlightStroke: "rgba(40, 169, 46,.5)",
						data: [1000, 5200, 3600, 2600, 4200, 5300, 0],
					},
				],
			},
			options: {
				responsive: true,
				tooltips: {
					mode: "index",
					intersect: false,
				},
				hover: {
					mode: "nearest",
					intersect: true,
				},
			},
		});
	}

	//bar chart
	var ctx = document.getElementById("barChart");
	//    ctx.height = 200;
	var myChart = new Chart(ctx, {
		type: "bar",
		data: {
			labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"],
			datasets: [
				{
					label: "Đơn hàng đã giao",
					data: [65, 59, 80, 81, 56, 55, 45],
					borderColor: "rgba(0, 194, 146, 0.9)",
					borderWidth: "0",
					backgroundColor: "rgba(0, 194, 146, 0.5)",
				},
				{
					label: "Đơn hàng đã hủy",
					data: [28, 48, 40, 19, 86, 27, 76],
					borderColor: "rgba(0,0,0,0.09)",
					borderWidth: "0",
					backgroundColor: "rgba(0,0,0,0.07)",
				},
			],
		},
		options: {
			scales: {
				yAxes: [
					{
						ticks: {
							beginAtZero: true,
						},
					},
				],
			},
		},
	});

	// Line Chart  #flotLine5 End
	// Traffic Chart using chartist
	
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
