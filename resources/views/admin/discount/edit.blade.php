<div class="modal">
    <div class="container-modal js-container-modal">
        <div class="content-form">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12 rs-pd">
                        <div class="card">
                            <a class="close-modal js-close-container">
                                <i class="close-icon ti-close" onclick="hideFormUpdateDiscount(event)"></i>
                            </a>
                            <div class="w-100 card-header text-center font-2xl "><span class="font-weight-bold ">CẬP
                                    NHẬT</span><span class="font-weight-light"> MÃ GIẢM GIÁ</span>
                            </div>

                            <div class="card-body card-block">
                                <form action="update-discount" method="post" enctype="multipart/form-data"
                                    class="form-horizontal form-update-discount">
                                    @csrf
                                    @method('put')
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class="form-control-label">
                                                Tên mã</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input"
                                                name="codeName" placeholder="Nhập tên mã giảm giá..."
                                                class="form-control">
                                        </div>
                                    </div>
                                    @error('codeName')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror


                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class="form-control-label">
                                                Loại mã</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="selectType" id="select-type" class="form-control">
                                                <option value="">Hãy chọn loại mã</option>
                                                <option value="1">
                                                    Theo phần trăm (%)
                                                </option>
                                                <option value="2">
                                                    Theo giá trị thực
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    @error('selectType')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="row form-group d-none" id="percent">

                                    </div>
                                    @error('discount')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="row form-group  d-none" id="value">

                                    </div>
                                    @error('discount')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="row form-group" id="dateExpire">
                                        <div class="col col-md-3"><label for="textarea-input"
                                                class=" form-control-label">
                                                Ngày hết hạn
                                            </label></div>
                                        <div class="col-12 col-md-9"><input type="date" id="date-input"
                                                name="expire" placeholder="Nhập giá trị ..." class="form-control">
                                        </div>
                                    </div>
                                    @error('expire')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Mô
                                                tả
                                            </label></div>
                                        <div class="col-12 col-md-9">
                                            <textarea name="description" id="textarea-input" rows="9" placeholder="Nội dung..." class="form-control"></textarea>
                                        </div>
                                    </div>
                                    @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror


                                    <div class="col-lg-12 d-flex gap-10 footer-button">
                                        <button type="submit" class="btn btn-success btn-form-update"
                                            onclick="onSubmitFormUpdateProduct(event)">
                                            <i class="fa fa-magic"></i>
                                            Cập nhật
                                        </button>
                                        <button type="button" class="btn btn-secondary btn-form-update"
                                            onclick="hideFormUpdateDiscount(event)">
                                            ĐÓNG
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
