<!doctype html>
<html lang="en" dir="ltr">

<head>

	<!-- META DATA -->
	<meta charset="UTF-8">
	<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Genesis Trading">
	<meta name="author" content="Smarttrade">
	<meta name="Genesis Trading">

	<!-- FAVICON -->
	<link rel="shortcut icon" type="image/x-icon" href="images/fav-icon/icon.png" />

	<!-- TITLE -->
	<title>Login Smarttrade</title>

	<!-- BOOTSTRAP CSS -->
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

	<!-- STYLE CSS -->
	<link href="assets/css/style.css" rel="stylesheet" />
	<link href="assets/css/skin-modes.css" rel="stylesheet" />
	<link href="assets/css/dark-style.css" rel="stylesheet" />

	<!-- SIDE-MENU CSS -->
	<link href="assets/plugins/sidemenu/sidemenu.css" rel="stylesheet">

	<!-- SINGLE-PAGE CSS -->
	<link href="assets/plugins/single-page/css/main.css" rel="stylesheet" type="text/css">

	<!--C3 CHARTS CSS -->
	<link href="assets/plugins/charts-c3/c3-chart.css" rel="stylesheet" />

	<!-- CUSTOM SCROLL BAR CSS-->
	<link href="assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet" />

	<!--- FONT-ICONS CSS -->
	<link href="assets/css/icons.css" rel="stylesheet" />

	<!-- COLOR SKIN CSS -->
	<link id="theme" rel="stylesheet" type="text/css" media="all" href="assets/colors/color1.css" />

	<!-- google recaptcha -->
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>

<body>

	<!-- GLOABAL LOADER -->
	<div id="global-loader" style="margin-top:100px">
		<div class="d-flex justify-content-center">
			<div class="spinner-border" role="status">
				<span class="sr-only">Loading...</span>
			</div>
		</div>
	</div>
	<!-- /GLOABAL LOADER -->
	<!-- BACKGROUND-IMAGE -->
	<div class="login-img">

		<!-- PAGE -->
		<div class="page">
			<div class="">
				<!-- CONTAINER OPEN -->
				<div class="col col-login mx-auto">
					<div class="text-center">
						<img width="200px" src="" alt="">

					</div>
				</div>
				<div class="container-login100">
					<div class="wrap-login100 p-6">
						<form method="post" action="action.php" enctype="multipart/form-data" class="login100-form validate-form">
							<span class="login100-form-title">

							</span>
							<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
								<input class="input100" type="text" name="email" placeholder="Email">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="mdi mdi-email" aria-hidden="true"></i>
								</span>
							</div>
							<div class="wrap-input100 validate-input" data-validate="Password is required">
								<input class="input100" type="password" name="password" placeholder="Password">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="mdi mdi-key" aria-hidden="true"></i>
								</span>
							</div>
							<br>
							<!-- <div class="g-recaptcha" data-sitekey="6LdpX9kZAAAAAPXWAOURqE8tBUJLIlDLckkNvnwD"></div> -->
							<br />
							<div class="container-login100-form-btn">
								<button name="btn-login" type="submit" class="login100-form-btn btn-primary">

									Login

								</button>
							</div>

						</form>
					</div>
				</div>
				<!-- CONTAINER CLOSED -->
			</div>
		</div>
		<!-- End PAGE -->

	</div>
	<!-- BACKGROUND-IMAGE CLOSED -->

	<!-- JQUERY JS -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>

	<!-- BOOTSTRAP JS -->
	<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/plugins/bootstrap/js/popper.min.js"></script>

	<!-- SPARKLINE JS -->
	<script src="assets/js/jquery.sparkline.min.js"></script>

	<!-- CHART-CIRCLE JS -->
	<script src="assets/js/circle-progress.min.js"></script>

	<!-- RATING STAR JS -->
	<script src="assets/plugins/rating/jquery.rating-stars.js"></script>

	<!-- INPUT MASK JS -->
	<script src="assets/plugins/input-mask/jquery.mask.min.js"></script>

	<!-- CUSTOM SCROLL BAR JS-->
	<script src="assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

	<!-- CUSTOM JS-->
	<script src="assets/js/custom.js"></script>

	<script>
		// window.onload = function() {
		// 	var $recaptcha = document.querySelector('#g-recaptcha-response');

		// 	if ($recaptcha) {
		// 		$recaptcha.setAttribute("required", "required");
		// 	}
		// };
	</script>
	<!-- <script>
		$(document).ready(function() {
			grecaptcha.ready(function() {
				grecaptcha.execute('6LfpVMgUAAAAAJ-SzRaKcpDXo1ZDtVVp-Bb6s01h', {
					action: 'homepage'
				}).then(function(token) {

					//alert(token);

					document.getElementById("g-recaptcha-response").value = token;
				});
			});
		});
	</script> -->
	<script>
		$(document).ready(function() {
			sessionStorage.setItem("is_visited", "dark-mode-switch")
		})
	</script>
</body>

</html>