$(function() {
    $(".modal1").on("click", function () {
		hideFormUpdateUser();
	});

	$(".js-container-modal1").on("click", function (event) {
		event.stopPropagation();
	});

    $('.icon-update').click(function(e) {
        e.preventDefault();
        $('.modal').addClass('open');
        var href = this.href;
        var description = e.target.getAttribute('data-description');
        var discountCode = e.target.getAttribute('data-code');
        var type = e.target.getAttribute('data-type');
        var discount = e.target.getAttribute('data-discount');
        var expire = e.target.getAttribute('data-expire');
        $('input[name="codeName"]').val(discountCode);
        $('select[name="selectType"]').val(type);
        checkType(type);
        $('input[name="discount"]').val(discount);
        $('input[name="expire"]').val(expire);
        $('textarea[name="description"]').val(description);
        $('.form-update-discount').attr('action' ,href);
        
    });


    
})

function hideFormUpdateDiscount(event) {
    $('.modal').removeClass('open');
}

function showFormUpdateDiscount(event) {
    event.preventDefault();
}