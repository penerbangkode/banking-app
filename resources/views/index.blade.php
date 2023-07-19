<!DOCTYPE html>
<html lang="en">

	<!-- begin::Head -->
	<head>
		<base href="../../../">
		<meta charset="utf-8" />
		<title>Thrive | A banking app</title>
		<meta name="description" content="Login page example">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!--begin::Fonts -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

		<!--end::Fonts -->

		<!--begin::Page Custom Styles(used by this page) -->
		<link href="{{ asset('css/login.css') }}" rel="stylesheet" type="text/css" />

		<!--end::Page Custom Styles -->

		<!--begin::Global Theme Styles(used by all pages) -->
		<link href="{{ asset('css/bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />

		<!--end::Global Theme Styles -->

		<!--begin::Layout Skins(used by all pages) -->
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="kt-page--loading-enabled kt-page--loading kt-header--fixed kt-header--minimize-topbar kt-header-mobile--fixed kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-subheader--enabled kt-subheader--transparent kt-page--loading">

		<!-- begin::Page loader -->

		<!-- end::Page Loader -->

		<!-- begin:: Page -->
		<div class="kt-grid kt-grid--ver kt-grid--root kt-page">
			<div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v5 kt-login--signin" id="kt_login">
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile" style="background-image: url({{asset('images/bg-3.jpg')}});">
					<div class="kt-login__left">
						<div class="kt-login__wrapper">
							<div class="kt-login__content">
								<a class="kt-login__logo" href="#">
									<img src="{{ asset('images/logo.png') }}" class="w-75">
								</a>
								<h3 class="kt-login__title">Kebebasan Transfer Tanpa Batas, Kemanapun dan Kapanpun!</h3>
								<span class="kt-login__desc">
                                    Raih Kebebasan Penuh dalam Transfer Tanpa Batas, Kemanapun dan Kapanpun, Demi Kemudahan dan Kenyamanan Finansial Anda
								</span>
								<div class="kt-login__actions">
									<button type="button" class="btn btn-outline-brand btn-pill" onclick="window.location='{{ route('open-account') }}'">Buka Rekening Sekarang!</button>
								</div>
							</div>
						</div>
					</div>
					<div class="kt-login__divider">
						<div></div>
					</div>
					<div class="kt-login__right">
						<div class="kt-login__wrapper">
							<div class="kt-login__signin">
								<div class="kt-login__head">
									<h3 class="kt-login__title">Masuk Ke Akun Anda</h3>
								</div>
								<div class="kt-login__form">
									<form class="kt-form" action="{{ route('auth.customer-login') }}" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
										<div class="form-group">
											<input class="form-control" type="text" placeholder="Username" name="username" autocomplete="off">
										</div>
										<div class="form-group">
											<input class="form-control form-control-last" type="Password" placeholder="Password" name="password">
										</div>
										<div class="row kt-login__extra">
											<div class="col kt-align-left">
												<label class="kt-checkbox">
													<input type="checkbox" name="remember">Ingat Saya
													<span></span>
												</label>
											</div>
										</div>
										<div class="kt-login__actions">
											<button id="kt_login_signin_submit" class="btn btn-brand btn-pill btn-elevate">Sign In</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- end:: Page -->

		<!-- begin::Global Config(global config for global JS sciprts) -->
		<script>
			var KTAppOptions = {
				"colors": {
					"state": {
						"brand": "#3d94fb",
						"light": "#ffffff",
						"dark": "#282a3c",
						"primary": "#5867dd",
						"success": "#34bfa3",
						"info": "#3d94fb",
						"warning": "#ffb822",
						"danger": "#fd27eb"
					},
					"base": {
						"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
						"shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
					}
				}
			};
		</script>

		<!-- end::Global Config -->

		<!--begin::Global Theme Bundle(used by all pages) -->
		<script src="{{ asset('js/bundle.js') }}" type="text/javascript"></script>
		<script src="{{ asset('js/script.js') }}" type="text/javascript"></script>

		<!--end::Global Theme Bundle -->

		<!--begin::Page Scripts(used by this page) -->
		<script src="{{ asset('js/login-general.js') }}" type="text/javascript"></script>

		<!--end::Page Scripts -->
	</body>

	<!-- end::Body -->
</html>
