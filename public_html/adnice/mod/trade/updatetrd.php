<?php



 $updatetrd="update trading set invest_status='$_POST[statustrd]',update_by='$_SESSION[nama]',date_update=now() where autono='$_POST[idtrd]'";
 
mysqli_query($con,$updatetrd);
 
echo"<script>window.location.href = '?mod=trade&cmd=index'; alert('Update Success!!')</script>";




 ?>