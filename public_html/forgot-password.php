<!doctype html>
<html lang="en" dir="ltr">

<head>

	<!-- META DATA -->
	<meta charset="UTF-8">
	<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="SmartTrade Trading">
	<meta name="author" content="SmartTrade Trading">
	<meta name="keywords" content="SmartTrade Trading">

	<!-- FAVICON -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/logo/Crazy_richLOGO_COLOR.png" />

	<!-- TITLE -->
	<title>SmartTrade Trading - Forgot Password</title>

	<!-- BOOTSTRAP CSS -->
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

	<!-- STYLE CSS -->
	<link href="assets/css/style.css" rel="stylesheet" />
	<link href="assets/css/skin-modes.css" rel="stylesheet" />
	<link href="assets/css/dark-style.css" rel="stylesheet" />

	<!-- SIDE-MENU CSS -->
	<link href="assets/plugins/sidemenu/sidemenu.css" rel="stylesheet">

	<!--C3 CHARTS CSS -->
	<link href="assets/plugins/charts-c3/c3-chart.css" rel="stylesheet" />

	<!-- SINGLE-PAGE CSS -->
	<link href="assets/plugins/single-page/css/main.css" rel="stylesheet" type="text/css">

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

	<!-- BACKGROUND-IMAGE -->
	<div class="login-img">

		<!-- GLOABAL LOADER -->
		<div id="global-loader">
			<div class="lds-hourglass" style="margin-top: 275px;"></div>
		</div>
		<!-- End GLOABAL LOADER -->

		<!-- PAGE -->
		<div class="page">
			<div class="">
				<div class="col col-login mx-auto">

				</div>
				<!-- CONTAINER OPEN -->
				<div class="container-login100">
					<div class="row">
						<div class="col col-login mx-auto">
							<form action="mail.php" class="card shadow-none" method="post">
								<div class="card-body p-6">
									<div class="text-center">
										<img width="200px" class="mb-3" src="assets/images/logo/CrazyRich.png" alt="">
									</div>

									<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
										<input class="input100" type="text" name="email" placeholder="Email">
										<span class="focus-input100"></span>
										<span class="symbol-input100">
											<i class="mdi mdi-email" aria-hidden="true"></i>
										</span>
									</div>
									<br>
									<div class="g-recaptcha" data-sitekey="6LfVz6oaAAAAAFKQFpWR_M0YwwZ2Jx62H3MOHNh4"></div>
									<br />
									<div class="form-footer">
										<button type="submit" class="btn btn-primary btn-block">Send</button>
									</div>
									<div class="text-center text-muted mt-3 ">
										Forget it, <a href="login.php">send me back</a> to the sign in screen.
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- CONTAINER CLOSED -->
			</div>
		</div>
		<!--END PAGE -->
		<script src="https://www.google.com/recaptcha/api.js?render=6LfVz6oaAAAAAFKQFpWR_M0YwwZ2Jx62H3MOHNh4"></script>


	</div>
	<!-- BACKGROUND-IMAGE CLOSED -->
	<script>
		window.onload = function() {
			var $recaptcha = document.querySelector('#g-recaptcha-response');

			if ($recaptcha) {
				$recaptcha.setAttribute("required", "required");
			}
		};
	</script>
	<!-- JQUERY JS -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>

	<!-- BOOTSTRAP JS -->
	<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/plugins/bootstrap/js/popper.min.js"></script>

	<!-- SPARKLINE JS-->
	<script src="assets/js/jquery.sparkline.min.js"></script>

	<!-- CHART-CIRCLE JS-->
	<script src="assets/js/circle-progress.min.js"></script>

	<!-- RATING STAR -->
	<script src="assets/plugins/rating/jquery.rating-stars.js"></script>

	<!-- INPUT MASK JS-->
	<script src="assets/plugins/input-mask/jquery.mask.min.js"></script>

	<!-- CUSTOM SCROLL BAR JS-->
	<script src="assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

	<!-- CUSTOM JS-->
	<script src="assets/js/custom.js"></script>

	<script>
		$(document).ready(function() {
			grecaptcha.ready(function() {
				grecaptcha.execute('6LfVz6oaAAAAAFKQFpWR_M0YwwZ2Jx62H3MOHNh4', {
					action: 'homepage'
				}).then(function(token) {

					//alert(token);

					document.getElementById("g-recaptcha-response").value = token;
				});
			});
		});
	</script>

</body>

</html>