<?php
$cancel="update deposit set status='canceled',balance_status='2' where order_id='$_GET[orderid]'";
mysqli_query($con,$cancel);


?>

<script>
window.close()
</script>