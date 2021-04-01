<form action="index.php?mod=referral&cmd=qadduser" method="post" enctype="multipart/form-data">
  <div class="card card-outline card-success">
    <div class="card-header with-border">
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <h6 class="card-title"><i class="fa fa-user"></i> Add Member</h6>
        </div>
      </div>
    </div>
    <div class="container col-md-4 col-xs-4">
      <div class="form-group">
        <!-- <label for="up">Upline ID:</label> -->
        <input hidden type="text" readonly value="<?= $_SESSION['user_id'] ?>" name="upline" class="form-control" id="up">
      </div>
      <div class="form-group">
        <label for="up">Referral ID:</label>
        <input type="text" readonly value="<?= $_SESSION['reffcode'] ?>" name="upline" class="form-control" id="referral">
      </div>
      <div class="form-group">
        <label for="nama">Full Name:</label>
        <input type="text" name="nama" class="form-control" id="nama">
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <span id="availability"></span>
        <input required="" type="text" name="email" class="form-control" id="email">
      </div>
      <div class="form-group">
        <label for="email">Password:</label>

        <input required="" type="password" name="password1" class="form-control" id="password1">
      </div>
      <div class="form-group">
        <label for="email">Re-Password:</label>

        <input required="" type="password" name="password2" class="form-control" id="password2">
      </div>
    </div>
    <div class="container col-md-12 col-xs-12">
      <div class="form-group">
        <label>Terms and Conditions:</label>
        <div style="height:199px; margin:10px 0; padding:10px; border:1px solid #CCCCCC; overflow: auto;">
          <h4 style="text-align: center;"><strong><u>TERMS AND CONDITIONS</u></strong></h4>

        </div>
      </div>
      <label>
        <input type="checkbox" required="">
        I agree terms and conditions </label>
    </div>
    <div class="card-footer float-left">
      <button id="register" type="submit" class="float-right btn btn-warning ">Register </button>
    </div>
  </div>
</form>
<script>
  $(document).ready(function() {
    $('#email').keyup(function() {

      var emailcek = $(this).val();
      if (emailcek == "") {
        $('#availability').html('');
      } else {
        $.ajax({
          url: 'check_user.php',
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

  });
</script>