<!doctype html>
<html lang="en" dir="ltr">

<head>

	<!-- META DATA -->
	<meta charset="UTF-8">
	<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="SmartTrade Trading">
	<meta name="author" content="SmartTrade Trading">
	<meta name="SmartTrade Trading">

	<!-- FAVICON -->
	<link rel="shortcut icon" type="image/x-icon" href="images/fav-icon/icon.png" />

	<!-- TITLE -->
	<title>Register Smarttrade</title>

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
						<img width="200px" src="images/logo/logo.png" alt="">

					</div>
				</div>
				<div class="container-login100">
					<div class="wrap-login100 p-6">
						<form action="reg.php" method="post" class="login100-form validate-form">
							<div class="container col-md-4 col-xs-4">
								<div class="form-group">
									<label for="up">Referral Code:</label>
									<input type="text" value="<?= $_GET['referral'] ?>" name="reffcode" class="form-control" id="reffcode">
								</div>
								<div class="form-group">
									<label for="nama">Full Name:</label>
									<input required type="text" name="fullname" class="form-control" id="fullname">
								</div>
								<div class="form-group">
									<label for="email">Email:</label>
									<span id="availability"></span>
									<input type="text" name="email" class="form-control" id="email">
								</div>
								<div class="form-group">
									<label for="email">Phone:</label>
									<span id="phone-alv"></span>
									<input required="" type="number" name="phone" class="form-control" id="phone">
								</div>
								<div class="form-group">
									<label for="email">Password:</label>
									<span id="passsame"></span>
									<input required="" type="password" name="password1" class="form-control" id="password1">
								</div>
								<div class="form-group">

									<label for="email">Re-Password:</label>

									<input required="" type="password" name="password2" class="form-control" id="password2">

									<input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
								</div>
								<br>
								<div class="g-recaptcha" data-sitekey="6LfVz6oaAAAAAFKQFpWR_M0YwwZ2Jx62H3MOHNh4"></div>
								<br />
							</div>

							<label class="custom-control custom-checkbox mt-4">
								<input type="checkbox" class="custom-control-input" required>
								<span class="custom-control-label">Agree the <a href="#" data-toggle="modal" data-target="#agreeModal">terms and policy</a></span>
							</label>
							<div class="container-login100-form-btn">
								<button class="login100-form-btn btn-primary" id="register">
									Register
								</button>

							</div>
							<div class="text-center pt-3">
								<p class="text-dark mb-0">Already have account?<a href="login.php" class="text-primary ml-1">Sign In</a></p>
							</div>

						</form>
					</div>
				</div>
				<!-- CONTAINER CLOSED -->
			</div>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="agreeModal" tabindex="-1" aria-labelledby="agreeModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="agreeModalLabel">License Agreement</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<p>
							Trading foreign exchange on margin carries a high level of risk, and may not be suitable for all investors. The high degree of leverage can work against you as well as for you. Before deciding to invest in foreign exchange you should carefully consider your investment objectives, level of experience, and risk appetite.
						</p>

						<p>
							Decisions to buy, sell, hold or trade in securities and other investments involve risk and are best made based on the advice of qualified financial professionals. Any trading in securities or other investments involves a risk of substantial losses. The practice of “Day Trading” involves particularly high risks and can cause you to lose substantial sums of money. Before undertaking any trading program, you should consult a qualified financial professional. Please consider carefully whether such trading is suitable for you in light of your financial condition and ability to bear financial risks.
						</p>

						<p>
							No information or opinion contained on this site should be taken as a solicitation or offer to buy or sell any currency, equity or other financial instruments or services. Opinions expressed at smarttrade.top are those of the individual authors and do not necessarily represent the opinion of smarttrade.top or its management. smarttrade.top has not verified the accuracy or basis-in-fact of any claim or statement made by any independent author. smarttrade.top will not accept liability for any loss or damage, including without limitation to, any loss of profit, which may arise directly or indirectly from use of or reliance on information contained on this site. Past performance is no indication or guarantee of future performance.
						</p>

						<p>
							smarttrade.top involves a significant risk of loss. Always do your own due diligence prior to making an investment decision.
						</p>

						<p>
							The information contained on smarttrade.top and software provided on the site and all chart pages is compiled for the convenience of site visitors. smarttrade.top provides this information without responsibility for accuracy and it is accepted by the site visitor on the condition that errors in transmission or omissions shall not be the basis for any claim, demand or cause for action. The information and data were obtained from sources believed to be reliable, but we do not guarantee its accuracy.
						</p>

						<p>
							This Web site contains links to Web sites, which are not maintained by smarttrade.top. Links to third-party Web sites are provided for your convenience and information only. Third-party Web sites are not under smarttrade.top’s control and we are not responsible for the content or accuracy of those sites or the products or services offered on or through those sites. The inclusion of a link in this Web site does not imply smarttrade.top’s endorsement of the third-party Web site.
						</p>

						<p>

						</p>

						<p>
							YOU EXPRESSLY AGREE THAT USE OF smarttrade.top’S SERVICES IS AT YOUR SOLE RISK. THE SITE, THE SOFTWARE AND THE SERVICES ARE PROVIDED ON AN “AS IS” BASIS. THERE IS NO WARRANTY FOR SOFTWARE DOWNLOADED FROM THE WEBSITE, TO THE EXTENT PERMITTED BY APPLICABLE LAW. THE ENTIRE RISK AS TO THE QUALITY AND PERFORMANCE OF THE SOFTWARE IS WITH YOU. SHOULD THE PROGRAM PROVE DEFECTIVE, YOU ASSUME THE COST OF ALL NECESSARY SERVICING, REPAIR OR CORRECTION.
						</p>

						<p>
							REGARDLESS OF THE TYPE OF CLAIM OR THE NATURE OF THE CAUSE OF ACTION, YOU AGREE THAT IN NO EVENT SHALL smarttrade.top, ITS AFFILIATES, CONTRACTORS, SERVICE PROVIDERS, EMPLOYEES, AGENTS OR LICENSORS, OR ANY OTHER PARTY INVOLVED IN CREATING, PRODUCING OR DELIVERING THE SERVICES, TECHNOLOGY OR CONTENT AVAILABLE ON THE SERVICES, BE LIABLE TO YOU IN ANY MANNER WHATSOEVER.
						</p>

						<p>
							YOUR SOLE AND EXCLUSIVE REMEDY WITH RESPECT TO THE USE OF ANY SERVICES PROVIDED BY smarttrade.top SHALL BE CANCELLATION OF YOUR MEMBERSHIP TO THE SERVICES. SOME JURISDICTIONS DO NOT ALLOW THE LIMITATION OR EXCLUSION OF LIABILITY FOR INCIDENTAL OR CONSEQUENTIAL DAMAGES; IN THOSE JURISDICTIONS OUR LIABILITY SHALL BE LIMITED TO THE EXTENT PERMITTED BY LAW.
						</p>

						<p>
							Some of our services are works in progress and we reserve the right to change, modify and even discontinue these at our sole discretion. By posting content to our websites or in any other way contribute to our service, you agree that we have a perpetual and unlimited license to republish anything you post or transmit, or derivatives thereof, through the service. We have the right to, without prior notice and at our sole discretion, remove any post, terminate any membership, or take any action for violating the rules and conditions set forth on this page.
						</p>

						<p>
							We ask you to use our services in a lawful, civil and fair manner. You may not, for example:
						</p>

						<p>
						<ul>
							<li>
								- Post, transmit or link to any content that is disruptive, uncivil, abusive, vulgar, profane, obscene, hateful, sexually explicit, spam, marketing, promotion of product or service, fraudulent, threatening, harassing, defamatory, or which discloses private or personal matters concerning any person;
							</li>
							<li>
								- Violate any applicable law or regulation while accessing and using our sites, including, without limitation, the rules and regulations of the U.S. Securities and Exchange Commission, National Futures Association, CFTC, and the national or other securities exchanges (especially and including the rule against making false or misleading statements to manipulate the price of any security)
							</li>
							<li>
								- Offer, sell, or buy any security, product or financial instrument;
								<ul>
									<li>
										- Take any action that imposes an unreasonably or disproportionately large load on our infrastructure or, disrupts or damages the functioning of our systems or Service
									</li>
									<li>
										- Use any content from smarttrade.top without our prior written approval.
									</li>
								</ul>
							</li>
						</ul>
						</p>

						<p>
							Please maintain the confidentiality of your password. Contact us if you encounter or hear about any suspicious activity related to the use of our services. We will not be responsible for any loss to you arising from unauthorized use of your data. You may only create one (1) account to use with our services, i.e. one account per person.
						</p>


						<p>
							Trading foreign exchange on margin carries a high level of risk, and may not be suitable for all investors. Before deciding to trade on smarttrade.top you should carefully consider your investment objectives, level of experience, and risk appetite. The possibility exists that you could sustain a loss of some or all of your initial investment and therefore you should not invest money that you cannot afford to lose. You should be aware of all the risks associated with foreign exchange trading, and seek advice from an independent financial advisor if you have any doubts.
						</p>

						<p>
							This site is not intended for distribution, or use by, any person in any country where such distribution or use would be contrary to local law or regulation. None of the services or investments referred to in this website are available to persons residing in any country where the provision of such services or investments would be contrary to local law or regulation. It is the responsibility of visitors to this website to ascertain the terms of and comply with any local law or regulation to which they are subject.
						</p>
					</div>
					<div class=" modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
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
		window.onload = function() {
			var $recaptcha = document.querySelector('#g-recaptcha-response');

			if ($recaptcha) {
				$recaptcha.setAttribute("required", "required");
			}
		};
	</script>


	<script src="https://www.google.com/recaptcha/api.js?render=6LfVz6oaAAAAAFKQFpWR_M0YwwZ2Jx62H3MOHNh4"></script>


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
	<script>
		$('#email').keyup(function() {

			var emailcek = $(this).val();
			if (emailcek == "") {
				$('#availability').html('');
			} else {
				$.ajax({
					url: 'apps/check_user.php',
					method: "POST",
					data: {
						email_cek: emailcek
					},
					success: function(data) {
						if (data != '0') {
							$('#availability').html('<span class="badge badge-danger">Email not available</span>');
							$('#register').attr("disabled", true);
						} else {
							$('#availability').html('<span class="badge badge-success">Email Available</span>');
							$('#register').attr("disabled", false);
						}
					}
				})
			}
		});

		$("#phone").keyup(function() {
			var phoneCheck = $(this).val();
			if (phoneCheck == '') {
				$("#phone-alv").html('');
			} else {
				$.ajax({
					url: 'apps/check-phone.php',
					method: "POST",
					data: {
						phone: phoneCheck
					},
					success: function(data) {
						if (data != '0') {
							$('#phone-alv').html('<span class="badge badge-danger">Number Phone not available</span>');
							$('#register').attr("disabled", true);
						} else {
							$('#phone-alv').html('<span class="badge badge-success">Phone Available</span>');
							$('#register').attr("disabled", false);
						}
					}
				})
			}
		})

		$('#password1').keyup(function() {
			var pascek = $(this).val();
			var pass2 = document.getElementById("password2").value;


			if (pascek.length <= 5) {
				$('#passsame').html('<span class="badge badge-danger">Password must 6 or more character</span>');
				$('#register').attr("disabled", true);
			} else {
				$('#passsame').html('');
				if (pascek != pass2) {
					$('#passsame').html('<span class="badge badge-danger">Password not match</span>');
					$('#register').attr("disabled", true);
				} else {
					$('#passsame').html('<span class="badge badge-success">Password match</span>');
					$('#register').attr("disabled", false);
				}
			}
		})

		$('#password2').keyup(function() {

			var pascek = $(this).val();
			var pass2 = document.getElementById("password1").value;
			if (pascek == "") {
				// $('#availability').html('');
			} else if (pass2.length <= 5 && pascek.length <= 5) {
				$('#passsame').html('<span class="badge badge-danger">Password must 6 or more character</span>');
				$('#register').attr("disabled", true);
			} else {

				if (pascek != pass2) {
					$('#passsame').html('<span class="badge badge-danger">Password not match</span>');
					$('#register').attr("disabled", true);
				} else {
					$('#passsame').html('<span class="badge badge-success">Password match</span>');
					$('#register').attr("disabled", false);
				}
			}

		});
	</script>

</body>

</html>