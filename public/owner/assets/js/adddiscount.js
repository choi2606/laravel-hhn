$(document).ready(function() {
    $('#select-type').on('change', function(event) {
        if (event.target.value == 1) {
            $('#percent').removeClass('d-none');
            $('#value').addClass('d-none');
            $('#percent').append(`<div class="col col-md-3"><label for="textarea-input" class="form-control-label">
                                        Phần trăm % giảm
                                    </label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="discount"
                                        placeholder="Nhập giá trị ..." class="form-control">
                                </div>`);
            $('#value').empty();
            // $('input[name="discount%"]').attr('name', 'discount');
        } else if (event.target.value == 2) {
            $('#value').removeClass('d-none');
            $('#percent').addClass('d-none');
            // $('input[name="discountValue"]').attr('name', 'discount');
            $('#value').append(`<div class="col col-md-3"><label for="textarea-input" class=" form-control-label">
                                        Giá trị giảm
                                    </label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="discount"
                                        placeholder="Nhập giá trị ..." class="form-control">
                                </div>`);
            $('#percent').empty();

        } else {
            $('#percent').empty();
            $('#value').empty();

        }
    })
})