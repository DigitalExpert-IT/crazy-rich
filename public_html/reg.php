<?php
include('assets/dbconnect.php');
include('assets/PHPMailer/class.phpmailer.php');
include('assets/PHPMailer/class.smtp.php');
include('assets/PHPMailer/PHPMailerAutoload.php');


// Build POST request:
/*  $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_secret = '6LfpVMgUAAAAAGlJ38SzEnWxBFwYI_rmd0SojIdC';
    $recaptcha_response = $_POST['g-recaptcha-response'];

    // Make and decode POST request:
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $recaptcha = json_decode($recaptcha);

    // Take action based on the score returned:
    if ($recaptcha->success == 1) {
*/

// set default time asia/jakarta
date_default_timezone_set("Asia/Jakarta");
$time = time();
$time_now = date("Y-m-d H:i:s", $time);

$d = date("d");
$m = date("m");
$y = date("Y");
$t = time();
$dmt = $d + $m + $y + $t;
$ran = rand(0, 10000000);
$dmtran = $dmt + $ran;
$un =  uniqid();
$dmtun = $dmt . $un;
$mdun = md5($dmtran . $un);
$randomkey = substr($mdun, 25); // if you want sort length code.

$name = mysqli_real_escape_string($con, $_POST['fullname']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$refcode = $_POST['reffcode'];

// cek email exist
$qemailexist = "SELECT email_user FROM users where email_user='$email'";
$proemailexist = mysqli_query($con, $qemailexist);
$resemailexist = mysqli_fetch_array($proemailexist);
if ($resemailexist[0] != NULL) {
  echo '<script>
  alert("This Email is Exist");
  window.location = "http://smarttrade.top/register.php";
  </script>';
} else {
  if ($refcode != '') {
    $quref = "select * from users where reff_code='$_POST[reffcode]'";
    $rsfref = mysqli_query($con, $quref);
    $rwfef = mysqli_fetch_array($rsfref);
    $idref = $rwfef['user_id'];
  } else {
    $idref = 0;
  }

  $passwords = password_hash($_POST['password1'], PASSWORD_DEFAULT);

  $quadd = "insert into users set reff_id='$idref',nama='$name',phone='$_POST[phone]',email_user='$_POST[email]',password='$passwords',verify_code='$mdun',reff_code='$randomkey',status='1',date_join='$time_now'";

  $regist = mysqli_query($con, $quadd);
  if ($regist) {
    echo "<script>alert('Register Success'); window.location.href = 'index.php';</script>";
  } else {
    echo "<script>alert('Register Fail, Please Try Again'); window.location.href = 'index.php';</script>";
  }

  //   $html = '<head>
  //   <style type="text/css" rel="stylesheet" media="all">
  //     /* Base ------------------------------ */

  //     @import url("https://fonts.googleapis.com/css?family=Nunito+Sans:400,700&display=swap");

  //     body {
  //       width: 100% !important;
  //       height: 100%;
  //       margin: 0;
  //       -webkit-text-size-adjust: none;
  //     }

  //     a {
  //       color: #3869D4;
  //     }

  //     a img {
  //       border: none;
  //     }

  //     td {
  //       word-break: break-word;
  //     }

  //     .preheader {
  //       display: none !important;
  //       visibility: hidden;
  //       mso-hide: all;
  //       font-size: 1px;
  //       line-height: 1px;
  //       max-height: 0;
  //       max-width: 0;
  //       opacity: 0;
  //       overflow: hidden;
  //     }

  //     /* Type ------------------------------ */

  //     body,
  //     td,
  //     th {
  //       font-family: "Nunito Sans", Helvetica, Arial, sans-serif;
  //     }

  //     h1 {
  //       margin-top: 0;
  //       color: #333333;
  //       font-size: 22px;
  //       font-weight: bold;
  //       text-align: left;
  //     }

  //     h2 {
  //       margin-top: 0;
  //       color: #333333;
  //       font-size: 16px;
  //       font-weight: bold;
  //       text-align: left;
  //     }

  //     h3 {
  //       margin-top: 0;
  //       color: #333333;
  //       font-size: 14px;
  //       font-weight: bold;
  //       text-align: left;
  //     }

  //     td,
  //     th {
  //       font-size: 16px;
  //     }

  //     p,
  //     ul,
  //     ol,
  //     blockquote {
  //       margin: .4em 0 1.1875em;
  //       font-size: 16px;
  //       line-height: 1.625;
  //     }

  //     p.sub {
  //       font-size: 13px;
  //     }

  //     /* Utilities ------------------------------ */

  //     .align-right {
  //       text-align: right;
  //     }

  //     .align-left {
  //       text-align: left;
  //     }

  //     .align-center {
  //       text-align: center;
  //     }

  //     /* Buttons ------------------------------ */

  //     .button {
  //       background-color: #3869D4;
  //       border-top: 10px solid #3869D4;
  //       border-right: 18px solid #3869D4;
  //       border-bottom: 10px solid #3869D4;
  //       border-left: 18px solid #3869D4;
  //       display: inline-block;
  //       color: #FFF;
  //       text-decoration: none;
  //       border-radius: 3px;
  //       box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16);
  //       -webkit-text-size-adjust: none;
  //       box-sizing: border-box;
  //     }

  //     .button--green {
  //       background-color: #22BC66;
  //       border-top: 10px solid #22BC66;
  //       border-right: 18px solid #22BC66;
  //       border-bottom: 10px solid #22BC66;
  //       border-left: 18px solid #22BC66;
  //     }

  //     .button--red {
  //       background-color: #FF6136;
  //       border-top: 10px solid #FF6136;
  //       border-right: 18px solid #FF6136;
  //       border-bottom: 10px solid #FF6136;
  //       border-left: 18px solid #FF6136;
  //     }

  //     @media only screen and (max-width: 500px) {
  //       .button {
  //         width: 100% !important;
  //         text-align: center !important;
  //       }
  //     }

  //     /* Attribute list ------------------------------ */

  //     .attributes {
  //       margin: 0 0 21px;
  //     }

  //     .attributes_content {
  //       background-color: #F4F4F7;
  //       padding: 16px;
  //     }

  //     .attributes_item {
  //       padding: 0;
  //     }

  //     /* Related Items ------------------------------ */

  //     .related {
  //       width: 100%;
  //       margin: 0;
  //       padding: 25px 0 0 0;
  //       -premailer-width: 100%;
  //       -premailer-cellpadding: 0;
  //       -premailer-cellspacing: 0;
  //     }

  //     .related_item {
  //       padding: 10px 0;
  //       color: #CBCCCF;
  //       font-size: 15px;
  //       line-height: 18px;
  //     }

  //     .related_item-title {
  //       display: block;
  //       margin: .5em 0 0;
  //     }

  //     .related_item-thumb {
  //       display: block;
  //       padding-bottom: 10px;
  //     }

  //     .related_heading {
  //       border-top: 1px solid #CBCCCF;
  //       text-align: center;
  //       padding: 25px 0 10px;
  //     }

  //     /* Discount Code ------------------------------ */

  //     .discount {
  //       width: 100%;
  //       margin: 0;
  //       padding: 24px;
  //       -premailer-width: 100%;
  //       -premailer-cellpadding: 0;
  //       -premailer-cellspacing: 0;
  //       background-color: #F4F4F7;
  //       border: 2px dashed #CBCCCF;
  //     }

  //     .discount_heading {
  //       text-align: center;
  //     }

  //     .discount_body {
  //       text-align: center;
  //       font-size: 15px;
  //     }

  //     /* Social Icons ------------------------------ */

  //     .social {
  //       width: auto;
  //     }

  //     .social td {
  //       padding: 0;
  //       width: auto;
  //     }

  //     .social_icon {
  //       height: 20px;
  //       margin: 0 8px 10px 8px;
  //       padding: 0;
  //     }

  //     /* Data table ------------------------------ */

  //     .purchase {
  //       width: 100%;
  //       margin: 0;
  //       padding: 35px 0;
  //       -premailer-width: 100%;
  //       -premailer-cellpadding: 0;
  //       -premailer-cellspacing: 0;
  //     }

  //     .purchase_content {
  //       width: 100%;
  //       margin: 0;
  //       padding: 25px 0 0 0;
  //       -premailer-width: 100%;
  //       -premailer-cellpadding: 0;
  //       -premailer-cellspacing: 0;
  //     }

  //     .purchase_item {
  //       padding: 10px 0;
  //       color: #51545E;
  //       font-size: 15px;
  //       line-height: 18px;
  //     }

  //     .purchase_heading {
  //       padding-bottom: 8px;
  //       border-bottom: 1px solid #EAEAEC;
  //     }

  //     .purchase_heading p {
  //       margin: 0;
  //       color: #85878E;
  //       font-size: 12px;
  //     }

  //     .purchase_footer {
  //       padding-top: 15px;
  //       border-top: 1px solid #EAEAEC;
  //     }

  //     .purchase_total {
  //       margin: 0;
  //       text-align: right;
  //       font-weight: bold;
  //       color: #333333;
  //     }

  //     .purchase_total--label {
  //       padding: 0 15px 0 0;
  //     }

  //     body {
  //       background-color: #F4F4F7;
  //       color: #51545E;
  //     }

  //     p {
  //       color: #51545E;
  //     }

  //     p.sub {
  //       color: #6B6E76;
  //     }

  //     .email-wrapper {
  //       width: 100%;
  //       margin: 0;
  //       padding: 0;
  //       -premailer-width: 100%;
  //       -premailer-cellpadding: 0;
  //       -premailer-cellspacing: 0;
  //       background-color: #F4F4F7;
  //     }

  //     .email-content {
  //       width: 100%;
  //       margin: 0;
  //       padding: 0;
  //       -premailer-width: 100%;
  //       -premailer-cellpadding: 0;
  //       -premailer-cellspacing: 0;
  //     }

  //     /* Masthead ----------------------- */

  //     .email-masthead {
  //       padding: 25px 0;
  //       text-align: center;
  //     }

  //     .email-masthead_logo {
  //       width: 94px;
  //     }

  //     .email-masthead_name {
  //       font-size: 16px;
  //       font-weight: bold;
  //       color: #A8AAAF;
  //       text-decoration: none;
  //       text-shadow: 0 1px 0 white;
  //     }

  //     /* Body ------------------------------ */

  //     .email-body {
  //       width: 100%;
  //       margin: 0;
  //       padding: 0;
  //       -premailer-width: 100%;
  //       -premailer-cellpadding: 0;
  //       -premailer-cellspacing: 0;
  //       background-color: #FFFFFF;
  //     }

  //     .email-body_inner {
  //       width: 570px;
  //       margin: 0 auto;
  //       padding: 0;
  //       -premailer-width: 570px;
  //       -premailer-cellpadding: 0;
  //       -premailer-cellspacing: 0;
  //       background-color: #FFFFFF;
  //     }

  //     .email-footer {
  //       width: 570px;
  //       margin: 0 auto;
  //       padding: 0;
  //       -premailer-width: 570px;
  //       -premailer-cellpadding: 0;
  //       -premailer-cellspacing: 0;
  //       text-align: center;
  //     }

  //     .email-footer p {
  //       color: #6B6E76;
  //     }

  //     .body-action {
  //       width: 100%;
  //       margin: 30px auto;
  //       padding: 0;
  //       -premailer-width: 100%;
  //       -premailer-cellpadding: 0;
  //       -premailer-cellspacing: 0;
  //       text-align: center;
  //     }

  //     .body-sub {
  //       margin-top: 25px;
  //       padding-top: 25px;
  //       border-top: 1px solid #EAEAEC;
  //     }

  //     .content-cell {
  //       padding: 35px;
  //     }

  //     /*Media Queries ------------------------------ */

  //     @media only screen and (max-width: 600px) {

  //       .email-body_inner,
  //       .email-footer {
  //         width: 100% !important;
  //       }
  //     }

  //     @media (prefers-color-scheme: dark) {

  //       body,
  //       .email-body,
  //       .email-body_inner,
  //       .email-content,
  //       .email-wrapper,
  //       .email-masthead,
  //       .email-footer {
  //         background-color: #333333 !important;
  //         color: #FFF !important;
  //       }

  //       p,
  //       ul,
  //       ol,
  //       blockquote,
  //       h1,
  //       h2,
  //       h3 {
  //         color: #FFF !important;
  //       }

  //       .attributes_content,
  //       .discount {
  //         background-color: #222 !important;
  //       }

  //       .email-masthead_name {
  //         text-shadow: none !important;
  //       }
  //     }

  //     :root {
  //       color-scheme: light dark;
  //       supported-color-schemes: light dark;
  //     }
  //   </style>
  //   <!--[if mso]>
  //       <style type="text/css">
  //         .f-fallback  {
  //           font-family: Arial, sans-serif;
  //         }
  //       </style>
  //     <![endif]-->
  // </head>

  // <body>
  //   <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
  //     <tr>
  //       <td align="center">
  //         <table class="email-content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
  //           <tr>
  //             <td class="email-masthead">
  //               <a href="#" class="f-fallback email-masthead_name">
  //               <img src="https://i.imgur.com/Kff1puG.png" width="auto" height="auto" alt="crazyrich">
  //               </a>
  //             </td>
  //           </tr>
  //           <!-- Email Body -->
  //           <tr>
  //             <td class="email-body" width="100%" cellpadding="0" cellspacing="0">
  //               <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0"
  //                 role="presentation">
  //                 <!-- Body content -->
  //                 <tr>
  //                   <td class="content-cell">
  //                     <div class="f-fallback">
  //                       <h1>Hi, ' . $name . '!</h1>
  //                       <p>Woww! Thanks For Registering an Account With Crazyrich! You' . "'" . 're The Richest Person in All The Land. Before We Get Started, We' . "'" . 'll Need To Verify Your Email..</p>
  //                       <!-- Action -->
  //                       <table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0"
  //                         role="presentation">
  //                         <tr>
  //                           <td align="center">
  //                             <!-- Border based button
  //              https://litmus.com/blog/a-guide-to-bulletproof-buttons-in-email-design -->
  //                             <table width="100%" border="0" cellspacing="0" cellpadding="0" role="presentation">
  //                               <tr>
  //                                 <td align="center">
  //                                   <a href="' . $baseurl . '/verification.php?verification=' . $mdun . '&email=' . $email . '" class="f-fallback button" target="_blank" style="color:white;text-decoration: none;">Confirmation</a>
  //                                 </td>
  //                               </tr>
  //                             </table>
  //                           </td>
  //                         </tr>
  //                       </table>
  //                       <!-- Sub copy -->
  //                       <table class="body-sub" role="presentation" align="center">
  //                         <tr>
  //                           <td>
  //                             <p class="f-fallback sub align-center">If you don\'t see the Confirm button, <a
  //                                 href="' . $baseurl . '/verification.php?verification=' . $mdun . '&email=' . $email . '">Click
  //                                 Here</a>.</p>
  //                           </td>
  //                         </tr>
  //                       </table>
  //                     </div>
  //                   </td>
  //                 </tr>
  //               </table>
  //             </td>
  //           </tr>
  //           <tr>
  //             <td>
  //               <table class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0"
  //                 role="presentation">
  //                 <tr>
  //                   <td class="content-cell" align="center">
  //                     <p class="f-fallback sub align-center">&copy; 2020 Crazyrich. All rights reserved.</p>
  //                   </td>
  //                 </tr>
  //               </table>
  //             </td>
  //           </tr>
  //         </table>
  //       </td>
  //     </tr>
  //   </table>
  // </body>

  // </html>';
  //   $mail = new PHPMailer();
  //   $mail->IsHTML(true);
  //   $mail->IsSMTP();
  //   $mail->Mailer = "smtp";
  //   $mail->SMTPAuth   = true;
  //   $mail->Host = "smtp.mandrillapp.com";
  //   $mail->Port = "587"; // 8025, 587 and 25 can also be used. Use Port 465 for SSL.
  //   $mail->Username = "crazyrich";
  //   $mail->Password = 'iq7OJRyJtAMKQT735ZXuqQ';
  //   $mail->type = 'html';
  //   $mail->SMTPSecure = 'tls';
  //   $mail->SMTPAuth = true;
  //   $mail->SMTPOptions = array(
  //     'ssl' => array(
  //       'verify_peer' => false,
  //       'verify_peer_name' => false,
  //       'allow_self_signed' => true
  //     )
  //   );
  //   $mail->setFrom('automail@smarttrade.top', 'Crazyrich');
  //   $mail->AddAddress($email);
  //   $mail->Subject  = "Verification Email";

  //   $mail->Body     = $html;
  //   $mail->WordWrap = true;

  //   if (!$mail->Send()) {
  //     echo 'Message was not sent.';
  //     echo 'Mailer error: ' . $mail->ErrorInfo;
  //   } else {
  //     echo "<script>alert('Register Success Check Your Email'); window.location.href = 'index.php';</script>";
  //   }
}
