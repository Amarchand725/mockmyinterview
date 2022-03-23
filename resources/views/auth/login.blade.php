<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin Login</title>

	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<link rel="stylesheet" href="{{ asset('public/admin/assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('public/admin/assets/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('public/admin/assets/css/ionicons.min.css') }}">
	<link rel="stylesheet" href="{{ asset('public/admin/assets/css/datepicker3.css') }}">
	<link rel="stylesheet" href="{{ asset('public/admin/assets/css/all.css') }}">
	<link rel="stylesheet" href="{{ asset('public/admin/assets/css/select2.min.css') }}">
	<link rel="stylesheet" href="{{ asset('public/admin/assets/css/dataTables.bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('public/admin/assets/css/AdminLTE.min.css') }}">
	<link rel="stylesheet" href="{{ asset('public/admin/assets/css/_all-skins.min.css') }}">
	<link rel="stylesheet" href="{{ asset('public/admin/assets/css/style.css') }}">
	<style>
		.login-page {
			background: #333;
		}
		.login-logo {
			color: #fff;
		}
	</style>

</head>

<body class="hold-transition login-page sidebar-mini">

<div class="login-box">
	<div class="login-logo">
		<b>Admin Panel</b>
	</div>
    <div class="card-body login-box-body">
        <form method="POST" action="{{ route('admin.login') }}">
            @csrf

            <div class="form-group has-feedback">
                <label for="email" class="col-md-6 col-form-label">{{ __('Email Address') }}</label>
				<input class="form-control" placeholder="Email address" name="email" type="email" autocomplete="off" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
			</div>
			<div class="form-group has-feedback">
                <label for="password" class="col-md-6 col-form-label text-md-end">{{ __('Password') }}</label>
				<input class="form-control" placeholder="Password" name="password" type="password" autocomplete="off" value="">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
			</div>

            <div class="row mb-3">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>

<script src="{{ asset('public/admin/assets/js/jquery-2.2.3.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/select2.full.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/jquery.inputmask.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/jquery.inputmask.extensions.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/moment.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/icheck.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/fastclick.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/app.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/demo.js') }}"></script>

</body>
</html>