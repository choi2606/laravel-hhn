function onAddCart(e) {
    e.preventDefault();
    $.post(e.target.href)
        .done(function(data) {
            toastSuccess('Đã thêm vào giỏ hàng!')
        })
        .fail(function() {
            toastError('Thêm giỏ hàng thất bại!')
        });
}