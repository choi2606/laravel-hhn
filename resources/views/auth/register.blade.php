<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Đăng ký tài khoản</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ asset('owner/assets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('owner/assets/css/style.css') }}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>

<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo" style="margin-top: 30px">
                    <a class="navbar-brand" href="./"><img src="{{ asset('owner/images/logoapp.png') }}"
                        height="100" width="100" style="border-radius: 50%" alt="Logo"></a>
                    <a href="{{ url('/register') }}"
                        style = "color: #00c292; font-weight: 800; font-size: 28px; text-transform: uppercase;">
                        <!-- <img class="align-content" src="{{ asset('owner/images/logo.png') }}" alt=""> -->
                        ĐĂNG KÝ tài khoản
                    </a>
                </div>
                <div class="login-form">
                    <form method="post" action="{{ url('register') }}">
                        @csrf
                        <div class="form-group">
                            <label>Tên người dùng</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                 name = "username">
                        </div>
                        @error('username')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="" name = "email">
                        </div>
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Mật Khẩu</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        placeholder="" name="password">
                                </div>
                                <div class="col-sm-6">
                                    <label>Nhập lại mật khẩu</label>
                                    <input type="password" class="form-control" placeholder=""
                                        name="confirm-password">
                                </div>
                            </div>
                        </div>
                        @error('password')
                            <div class="alert alert-warning alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            </div>
                        @enderror
                        @error('confirm-password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" class="form-control" name="address">
                        </div>
                        @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="text" class="form-control"
                                name="phone_number">
                        </div>
                        @error('phone_number')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Đăng ký</button>
                        <div class="register-link m-t-15 text-center">
                            <p>Đã có tài khoản ? <a href="{{ url('login') }}"> Đăng nhập ngay</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="{{ asset('owner/assets/js/main.js') }}"></script>

</body>

</html>
