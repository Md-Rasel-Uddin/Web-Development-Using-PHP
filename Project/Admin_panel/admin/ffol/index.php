<?php 
session_start();
include("db.php");
if (isset($_REQUEST['post_post'])) {
	extract($_REQUEST);

	if ($db->Insert("post","userNamep='$userNamep',requirements='$requirements',shipmentTime='$shipmentTime',product='$product',amountProduct='$amountProduct',details='$details',status='$status'")) {

		echo "<p style=\"color: ; margin-left:598px\">post  Success!</p>";
	}
	else{		
		echo "<p style=\"color: ; margin-left:598px\">post Fail!</p>";
	}
}

if (isset($_REQUEST['msubmit_edit_post'])) {

	extract($_REQUEST);		

	if ($db->Update("members","status='$status'","user_id=$user_id")) {		
		echo "<h3>Success</h3>";
	}
	else{
		echo "<h1 style=\"color:red\">fail</h1>";		
	}
}

if (isset($_REQUEST['csubmit_edit_post'])) {

	extract($_REQUEST);

	if ($db->Update("comment","status='$status'","c_s_id=$c_s_id")) {	
		echo "<h3>Success</h3>";
	}
	else{
		echo "<h1 style=\"color:red\">fail</h1>";	
	}
}

if (isset($_REQUEST['submit_edit_post'])) {
	extract($_REQUEST);
	if ($db->Update("post","status='$status'","post_id=$post_id")) {
		echo "<h3>Success</h3>";
	}
	else{
		echo "<h1 style=\"color:red\">fail</h1>";		
	}
}

if (isset($_REQUEST['del_id'])) {
	$del_id=$_REQUEST['del_id'];
	?>
	<span class="text text-danger"><strong>Do you want to delete?</strong></span>&nbsp;&nbsp;<a class="btn btn-danger" href="index.php?cdel_id=<?=$del_id;?>">Yes</a>&nbsp;&nbsp;<a class="btn btn-success" href="index.php">No</a>
	<?php
}

if (isset($_REQUEST['cdel_id'])) {
	$cdel_id=$_REQUEST['cdel_id'];
	if ($db->Delete("post","post_id='$cdel_id'")) {	
	?>
		<span class="text text-success"><strong>Delete Success</strong></span>
	<?php
		}
	else{
	?>
	<span class="text text-warning"><strong>Delete Fail!</strong></span>
	<?php
	}
}

if (isset($_REQUEST['mdel_id'])) {
	$mdel_id=$_REQUEST['mdel_id'];
	?>
	<span class="text text-danger"><strong>Do you want to delete?</strong></span>&nbsp;&nbsp;<a class="btn btn-danger" href="index.php?mcdel_id=<?=$mdel_id;?>">Yes</a>&nbsp;&nbsp;<a class="btn btn-success" href="index.php">No</a>
	<?php
}

if (isset($_REQUEST['mcdel_id'])) {
	$mcdel_id=$_REQUEST['mcdel_id'];
	if ($db->Delete("members","user_id='$mcdel_id'")) {	
	?>
		<span class="text text-success"><h1><strong>Delete Success</strong></h1></span>
		<?php
	}
	else{
		?>
		<span class="text text-warning"><strong><h2>Delete Fail!</h2></strong></span>
		<?php
	}
}

if (isset($_REQUEST['ccdel_id'])) {
	$ccdel_id=$_REQUEST['ccdel_id'];
	?>
	<span class="text text-danger"><strong>Do you want to delete?</strong></span>&nbsp;&nbsp;<a class="btn btn-danger" href="index.php?ccfcdel_id=<?=$ccdel_id;?>">Yes</a>&nbsp;&nbsp;<a class="btn btn-success" href="index.php">No</a>
	<?php
}

if (isset($_REQUEST['ccfcdel_id'])) {
	$ccfcdel_id=$_REQUEST['ccfcdel_id'];
	if ($db->Delete("comment","c_s_id='$ccfcdel_id'")) {	
	?>
		<span class="text text-success"><strong>Delete Success</strong></span>
		<?php
	}
	else{
		?>
		<span class="text text-warning"><strong>Delete Fail!</strong></span>
		<?php
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="login-register.css" rel="stylesheet" />
    <script src="jquery/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="bootstrap3/js/bootstrap.js" type="text/javascript"></script>
	<script src="login-register.js" type="text/javascript"></script>	
	<title>TSU || A Shipping Agent</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/styleSheet.css">	
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<script src="//cdn.ckeditor.com/4.8.0/full/ckeditor.js"></script> 
</head>
<body>
	<div class="header">
		<div class="container-fluid">   <!-- header -->
			<div class="row" style="background-color: gray;">
				<div class="col-md-6">
					<h1>Administrator Page</h1>
				</div>
				<div class="col-md-6 colorr">
					<div class="colorr">
						<ul class="list-inline" style="margin-top: 50px">
							<li><a href="index.php?id=dashboard" style="color: white">Manage Advertisement</a></li>
							<li><a href="index.php?id=user" style="color: white">Manage Memebers</a></li>
							<li><a href="index.php?id=dash" style="color: white" hidden>Manage dash</a></li>
							<li><a href="index.php?id=article" style="color: white">Manage Comments</a></li>
							<li><a href="index.php?id=category" style="color: white" >Manage Post </a></li>
							<li style="padding-left: 25px;"><a href="../../index.php" style="color: yellow;">log out</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="body" style=" min-height: 500px">
		<div class="container-fluid">   <!-- body -->
			<div class="row">
				<div class="col-md-12">
					<?php 
					if (isset($_REQUEST['id']) AND $_REQUEST['id']=='dashboard') {
						echo "<h3>Manage Advertisement</h3>";
						?>
						<table class="table table-condenced table-hover table-bordered table-responsive">
							<tr>
								<th>Requirements</th>
								<th>Details</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
							<?php 
								$categories=$db->getAll("post","*");
								foreach ($categories as $category) {
									extract($category);								
							 ?>
							<tr>
								<td><?=$requirements;?></td>
								<td><?=$details;?></td>
								<td><p hidden><?=$status;?></p>
									<?php
										if ($status==1){echo "Approved";} else{
											echo "Unapproved";
										}
									?>
								</td>
								<td>
									<a class="btn btn-info glyphicon glyphicon-pencil" href="index.php?action=pedit_category&post_id=<?=$post_id;?>"></a>&nbsp;
									<a class="btn btn-danger glyphicon glyphicon-remove" href="index.php?del_id=<?=$post_id;?>"></a>
								</td>
							</tr>
							<?php
								}
							?>						
						</table>
						<?php
					}
					elseif (isset($_REQUEST['id']) AND $_REQUEST['id']=='category') {
						echo "<h3>Insert Post</h3>";
						?>
						<br>
						<br>
						 <form method="post" >
							<table class="table table-condenced table-hover table-bordered table-responsive">
								<tr>
									<th>User Name:</th>
									<td><input type="text" name="userNamep" style="width: 100%" required></td>
								</tr>
								<tr>
									<th>Requirements:</th>
									<td><input type="text" name="requirements" style="width: 100%" required></td>	
								</tr>
								<tr>
									<th>Shipment Time:</th>
									<td><input type="text" name="shipmentTime" style="width: 100%" required></td>
								</tr>
								<tr>
									<th>Product:</th>
									<td><input type="text" name="product" style="width: 100%" required></td>
								</tr>
								<tr>
									<th>Amount of Product:</th>
									<td><input type="text" name="amountProduct" style="width: 100%" required></td>
								</tr>
								<tr>
									<td>Add file(optional)</td>
									<td><input type="file" name="post_file" enctype="multipart/form-data" ></td>
								</tr>
								<tr>
									<th>Details:</th>
									<td>
										<textarea id="content0001" name="details" rows="10" cols="80" style="width: 100%" required>  </textarea>
										<script>						             
						                CKEDITOR.replace( 'content000404' );
						           		</script> 
						            </td>
								</tr>
								<tr>
									<td><input type="text" name="status" value="1" hidden></td>
								</tr>
								<tr>
									<td></td>
									<td><button style="width: 100%" name="post_post">Submit</button></td>
								</tr>
							</table>
						</form>
						<?php
					}

					elseif (isset($_REQUEST['id']) AND $_REQUEST['id']=='article') {
						echo "<h3>Manage Comments</h3>";
						?>
						<table class="table table-condenced table-hover table-bordered table-responsive">
							<tr>
								<th>User_id</th>
								<th>Content</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
							<?php 
								$categories=$db->getAll("comment","*");
								foreach ($categories as $category) {
									extract($category);	
							?>
							<tr>
								<td><?=$user_id;?></td>
								<td><?=$content;?></td>
								<td><p hidden><?=$status;?></p>
									<?php
										if ($status==1){echo "Approved";} else{
											echo "Unapproved";
										}
									?>
								</td>
								<td>
									<a class="btn btn-info glyphicon glyphicon-pencil" href="index.php?action=cedit_category&c_s_id=<?=$c_s_id;?>"></a>&nbsp;
									<a class="btn btn-danger glyphicon glyphicon-remove" href="index.php?ccdel_id=<?=$c_s_id;?>"></a>
								</td>
							</tr>
							<?php
								}				
							?>						
						</table>
						<?php
					}

					elseif (isset($_REQUEST['id']) AND $_REQUEST['id']=='user') {
						echo "<h3>Manage Members</h3>";
						?>
						<table class="table table-condenced table-hover table-bordered table-responsive">
							<tr>
								<th>User Name</th>
								<th>Email Id</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
							<?php 
								$categories=$db->getAll("members","*");
								foreach ($categories as $category) {
									extract($category);	
							 ?>
							<tr>
								<td><?=$userName;?></td>
								<td><?=$email_id;?></td>
								<td><p hidden><?=$status;?></p>
									<?php
										if ($status==1)
											{echo "Approved";} 
										else{
											echo "Unapproved";
										}
									?>
								</td>
								<td>
									<a class="btn btn-info glyphicon glyphicon-pencil" href="index.php?action=edit_category&user_id=<?=$user_id;?>"></a>&nbsp;
									<a class="btn btn-danger glyphicon glyphicon-remove" href="index.php?mcdel_id=<?=$user_id;?>"></a>
								</td>
							</tr>
							<?php
								}	
							?>						
						</table>
						<?php
					} 

					elseif (isset($_REQUEST['action']) AND $_REQUEST['action']=='pedit_category') {
							$post_id=$_REQUEST['post_id'];
							extract($db->getById("post","*","post_id=$post_id"));
							echo "<h4>Edit Advertisement</h4>";
							?>
								<br>
								<br>
							<form action="index.php">
								<table class="table table-condenced table-hover table-bordered table-responsive">
									<tr>
										<th>title</th>
										<td><input type="text" name="title" value="<?=$requirements;?>" disabled> </td>
									</tr>
									<tr>
										<th>Content</th>
										<td>
										<textarea id="content" name="content" disabled><?=$details;?></textarea>
										<script>								             
							                CKEDITOR.replace( 'content' );
							           </script>  </td>
									</tr>
									<tr>
										<th></th>
										<td > 
											<select name="status" value="<?=$status;?>">
												<option value="<?=$status;?>">
													<?php
														if ($status==1){echo "Approved";} else{
															echo "Unapproved";
														}
													?>			
												</option>
												<option value="0">Unapproved</option>
												<option value="1">Approved</option>
											</select></td>
									</tr>
									<tr>
										<td><input hidden type="text" name="post_id" value="<?=$post_id;?>"  ></td>
									</tr>
									<tr>
										<td></td>
										<td><button name="submit_edit_post">Submit</button></td>
									</tr>
								</table>
							</form>
									<?php
								}

								elseif (isset($_REQUEST['action']) AND $_REQUEST['action']=='cedit_category') {
									$c_s_id=$_REQUEST['c_s_id'];
									extract($db->getById("comment","*","c_s_id=$c_s_id"));
									echo "<h4>Edit Comments</h4>";
									?>
										<br>
										<br>
									<form action="index.php">
										<table class="table table-condenced table-hover table-bordered table-responsive">
											<tr>
												<th>User_id</th>
												<td><input type="text" name="title" value="<?=$user_id;?>" disabled> </td>
											</tr>
											<tr>
												<th>Content</th>
												<td>
												<textarea id="content" name="content" disabled><?=$content;?></textarea>
												<script>            
									                CKEDITOR.replace( 'content' );
									           </script>  </td>
											</tr>
											<tr>
												<th></th>
												<td > 
													<select name="status" value="<?=$status;?>">
														<option value="<?=$status;?>">
															<?php
																if ($status==1){echo "Approved";} else{
																	echo "Unapproved";
																}
															?>
															
														</option>
														<option value="0">Unapproved</option>
														<option value="1">Approved</option>
													</select></td>
											</tr>
											<tr>
												<td><input hidden type="text" name="c_s_id" value="<?=$c_s_id;?>"  ></td>
											</tr>
											<tr>
												<td></td>
												<td><button name="csubmit_edit_post">Submit</button></td>
											</tr>
										</table>
									</form>
									<?php
								}

							elseif (isset($_REQUEST['action']) AND $_REQUEST['action']=='edit_category') {
									$user_id=$_REQUEST['user_id'];
									extract($db->getById("members","*","user_id=$user_id"));
									echo "<h4>Edit Members facility</h4>";
									?>
										<br>
										<br>
									<form action="index.php">
										<table class="table table-condenced table-hover table-bordered table-responsive">
											<tr>
												<th>title</th>
												<td><input type="text" name="title" value="<?=$userName;?>" disabled> </td>
											</tr>
											<tr>
												<th>Content</th>
												<td>
												<textarea id="content" name="content" disabled><?=$email_id;?></textarea>
												<script>             
									                CKEDITOR.replace( 'content' );
									           </script>  </td>
											</tr>
											<tr>
												<th></th>
												<td > 
													<select name="status" value="<?=$status;?>">
														<option value="<?=$status;?>">
															<?php
																if ($status==1){echo "Approved";} else{
																	echo "Unapproved";
																}
															?>
															
														</option>
														<option value="0">Unapproved</option>
														<option value="1">Approved</option>
													</select></td>
											</tr>
											<tr>
												<td><input hidden type="text" name="user_id" value="<?=$user_id;?>" hidden></td>
											</tr>
											<tr>
												<td></td>
												<td><button name="msubmit_edit_post">Submit</button></td>
											</tr>
										</table>
									</form>
									<?php
								}
					else{
						echo "<h3>Manage Page</h3>

							<p><b>Hello Admin</b> You can manage entire page from here.</p>
							<p>As the access permission , Only you can control the page</p> 
							<p>As a admin, you can <b>Edit</b> or <b>Update</b> and even you can <b>Delete</b> anything.</p> 
						";
					}
					 ?>
				</div>
			</div>
		</div>
	</div>
	<div class="footer" style="background-color: gray;color: white">
		<div class="container-fluid">   <!-- footer -->
			<div class="row">
				<div class="col-md-12">
					<p>Control page from here <i class="pull-right">copyright &copy; by tsu company</i></p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
