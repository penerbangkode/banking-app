<!DOCTYPE html>

<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4 & Angular 8
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">

	<!-- begin::Head -->
	<head>
		<base href="">
		<meta charset="utf-8" />
		<title>@yield('title')</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!--begin::Fonts -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

		<!--end::Fonts -->

		<!--end::Page Vendors Styles -->
        @stack('css')

		<!--begin::Global Theme Styles(used by all pages) -->
		<link href="{{ asset('css/main-bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" />

		<!--end::Global Theme Styles -->

		<!--begin::Layout Skins(used by all pages) -->

	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="kt-page--loading-enabled kt-page--loading kt-header--fixed kt-header--minimize-topbar kt-header-mobile--fixed kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-subheader--enabled kt-subheader--transparent kt-page--loading">

		<!-- begin::Page loader -->

		<!-- end::Page Loader -->

		<!-- begin:: Page -->

		<!-- end:: Header Mobile -->
		<div class="kt-grid kt-grid--hor kt-grid--root">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper " id="kt_wrapper">

					<!-- begin:: Header -->
					<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed " data-ktheader-minimize="on">
						<div class="kt-header__top">
							<div class="kt-container ">

								<!-- begin:: Brand -->
								<div class="kt-header__brand   kt-grid__item" id="kt_header_brand">
									<div class="kt-header__brand-logo">
										<a href="index.html">
											<img alt="Logo" src="{{ asset('images/logo.png') }}"  class="w-25"/>
										</a>
									</div>
								</div>

								<!-- end:: Brand -->
							</div>
						</div>
						<div class="kt-header__bottom">
							<div class="kt-container ">

								<!-- begin: Header Menu -->
								<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
								<div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
									<div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile ">
										<ul class="kt-menu__nav ">
											<li class="kt-menu__item  kt-menu__item--open kt-menu__item--here kt-menu__item--submenu kt-menu__item--rel kt-menu__item--open kt-menu__item--here" aria-haspopup="true"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-text">Open Account</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
											</li>
										</ul>
									</div>
								</div>

								<!-- end: Header Menu -->
							</div>
						</div>
					</div>

					<!-- end:: Header -->
					<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
						<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">


							<!-- begin:: Content -->
							<div class="kt-container  kt-grid__item kt-grid__item--fluid mt-3">
                                @yield('content')
                            </div>
						</div>
					</div>

				</div>
			</div>
		</div>
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

        @stack('script')
		<!--end::Page Scripts -->
	</body>

	<!-- end::Body -->
</html>
