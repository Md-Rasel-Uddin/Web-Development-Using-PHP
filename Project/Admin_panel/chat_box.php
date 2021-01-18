<?php 
@include@("header.php");

if (isset($_REQUEST['send'])) {	
	$send=$_REQUEST['send'];
	?>
	<h3 class="text text-danger" style="position: static;margin-left: -431px;margin-top: 5px;clear: both;display: block;color: green"><strong>Do you really want to send?</strong></h3>&nbsp;&nbsp;<a style="margin-left: 366px;margin-bottom: 8px;" class="btn btn-danger" href="chat_box.php?csend=<?=$send;?>">Yes</a>&nbsp;&nbsp;<a style="margin-bottom: 8px;" class="btn btn-success" href="chat_box.php">No</a>
	<?php
}

if (isset($_REQUEST['csend'])) {
	$csend=$_REQUEST['csend'];
	extract($_REQUEST);		
	if ( @$db->Insert(" deal_messages","username='$username',product='$product',dealing_c_name='$dealing_c_name',aggrement='$aggrement',message='$message'")) {
		@header("location:chat_box.php");
		?>
		<span style="position: static;margin-left: -455px;margin-top: 5px;clear: both;display: block;" class="text text-success"><strong>Send Success</strong></span>
		<?php
	}
	else{
		?>
		<span style="position: static;margin-left: -455px;margin-top: 5px;clear: both;display: block" class="text text-warning"><strong>Send Fail!</strong></span>
		<?php
	}
}
?>

<div class="container" id="here">
	<div class="row">
		<div class="col-md-12">
			<h2>Admin Chat Box:</h2>
			<p>Send message to admin</p>
			<br>
		</div>

	</div>
	<div class="row" style="background: #E1E1E1;padding: 7px;margin: 0px 20px">
		<!-- <div class="col-md-2">			
		</div> -->
		<div class="col-md-10">
			<form action="" method="post">
				<table class="table table-bordered table-hover table-stripped table-condensed table-responsive">
					<tr>
						<th style="width: 25%">User-Name: </th>
						<td><input type="text" class="form-control" name="username" placeholder="username" required></td>
					</tr>
					<tr>
						<th>Product: </th>
						<td><input type="text" class="form-control" name="product" placeholder="jhon@doe.com" required></td>
					</tr>
					<tr>
						<th>Dealing Comany Username: </th>
						<td><input type="text" class="form-control" name="dealing_c_name" placeholder="jhon@doe.com" required></td>
					</tr>
					<tr>
						<th>Aggrement: </th>
						<td required><input type="checkbox" name="aggrement" value="yes" id="same"> Yes <input type="checkbox" name="aggrement" value="no" id="same"> No </td>
					</tr>
					<tr>
						<th>Message: </th>
						<td><textarea name="message" class="form-control" required></textarea></td>
					</tr>
					<br>
					<!-- <tr>	
						<td colspan="2" class="text-center"><input class="btn btn-primary" type="submit" name="send" value="Send"></td>
					</tr> -->
				</table>
				<input class="btn btn-primary" type="submit" name="send" value="Send" style="padding: 15px;">
			</form>
			<br>
		</div>
	</div>
</div>

<?php 
include("footer.php");
  