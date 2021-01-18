<?php
include('session.php');
if (isset($_POST['post'])){
	$userNamep  = $_POST['userNamep'];
	$requirements= $_POST['requirements'];
	$shipmentTime= $_POST['shipmentTime'];
	$product= $_POST['product'];
	$amountProduct= $_POST['amountProduct'];
	$details= $_POST['details'];
	$status=$_POST['status'];
	$post_file= $_POST['post_file'];

mysql_query("insert into post (content,post_tittle,userNamep,requirements,shipmentTime,product,amountProduct,details,status,post_file,date_created,serial_id) values ('$post_content','$post_tittle','$userNamep','$requirements','$shipmentTime','$product','$amountProduct','$details','$status','$post_file','".strtotime(date("Y-m-d h:i:sa"))."','$serial_id') ")or die(mysql_error());								
?>
<script>
window.location = 'home.php';
</script>
<?php
	}
?>
