


<?php
 $qupdatenews="update information set title='$_POST[judul]',description='$_POST[news]' where autono='1'";
mysqli_query($con,$qupdatenews);


?>
<script>window.location = "index.php?mod=information&cmd=index";</script>