function onUpdateStatus(event) {
    event.preventDefault();
    url = event.target.href;
    sendRequestUpdateStatus(url);
}

function sendRequestUpdateStatus(url) {
    $.ajax({
        url: url,
        type: "PUT",
        datatype: "json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            $(".tbody-order").empty();
            
            $.each(response, function (index, order) {
                $(".tbody-order").append(`
                <tr>
                    <td class="serial">${ index++ }.</td>
                    <td class="order_id">#${ order.order_id }</td>
                    <td><span class="name">${ order.username }</span></td>
                    <td><span class="total_product">${ order.total_product }</span></td>
                    <td><span class="count">${ order.quantity }</span></td>
                    <td><span class="count">${ order.total_price }</span></td>
                    <td>
                        <span class="count">
                            ${ order.total_price - order.total_money }
                        </span>
                    </td>
                    <td><span class="count">${ order.total_money }</span></td>
                    <td><span class="order_date">${ order.order_date }</span></td>
                    <td>
                        ${order.status == 'đang chờ'
                        ? `<a href="${window.location.origin/'update-status-order' . order.order_id}" 
                            class="badge badge-pending" onclick="onUpdateStatus(event)">${ order.status }</a>`
                        :    `<span class="badge badge-complete">${ order.status }</span>`
                        }
                     </td>
                  </tr>
                `);
            });
        },
        error: function (jqXHR, textStatus, errorThrown) {},
    });
}

function showProduct(event) {
    event.preventDefault();
    $(".modal").addClass("open");
    url = event.target.href;
    $.ajax({
        url: url,
        type: "GET",
        datatype: "json",
        success: function(data) {
            $('.tbody-order-detail').empty();
            $.each(data, function(index=1, orderDetail) {
               $('.tbody-order-detail').append(
                `<tr>
                    <td class="serial">${ index+1 }.</td>
                    <td><span class="name">${ orderDetail.username }</span></td>
                    <td><span class="total_product">
                        ${ orderDetail.name }
                        </span></td>
                    <td><span class="count">${ orderDetail.quantity }</span></td>
                    <td><span class="count">${ orderDetail.unit_price }</span></td>
                </tr>`); 
            });
        },
        error: function(jqXHR, textStatus, errorThrown){

        }
    })

}

function hideProducts(event) {
    $(".modal").removeClass("open");
}

// function showProduct(event) {
    
// }