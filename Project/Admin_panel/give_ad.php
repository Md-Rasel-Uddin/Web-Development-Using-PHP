<?php 
include("header.php");
?>

<?=@$msg;?>
<main>
	<div class="container">   <!-- body -->
			<div class="row">
				<div class="col-md-12" style="background: #E1E1E1;padding: 7px;">
					<h1>POST ADVERTISE HERE</h1>
					<hr>
 					<form method="post" action="ad.php">
						<table class="table table-condenced table-hover table-bordered table-responsive">
							<tr>
								
								<td> <h3>USER NAME:</h3><input type="text" name="userNamep" style="width: 100%" height="50px" required></td>
							</tr>
							<tr>
							
								<td><h3>REQUIREMENTS:</h3><input type="text" name="requirements" style="width: 100%" height="50px" required></td>								
							</tr>
							<tr>
							
								<td><h3>SHIPMENT TIME:</h3><input type="text" name="shipmentTime" style="width: 100%" height="50px" required></td>
							</tr>
							<tr>
							
								<td><h3>PRODUCT:</h3><input type="text" name="product" style="width: 100%" height="50px" required></td>
							</tr>
							<tr>
							
								<td><h3>AMOUNT OF PRODUCT:</h3><input type="text" name="amountProduct" style="width: 100%" height="50px" required></td>
							</tr>							
							<tr>
								<td><h3>DETAILS:</h3>									
								<textarea id="content0001" name="details" rows="10" cols="80" style="width: 100%" height="50px" required>  </textarea>
								<script>					              
				                CKEDITOR.replace( 'content000404' );
				           		</script> 
				            </td>								
							</tr>
							<tr>
								<td hidden><input type="text" name="status" value="1"></td>
							</tr>			
							<tr>
								
								<td><button style="width: 250px;padding: 10px 20px;font-size: 24px;background-color: #42F4E8;border: 0;margin-left: 0px" class="text-center" name="post">POST</button></td>
							</tr>
						</table>
					</form>

					<?php	
						$host="localhost";
					$user="root";
					$pass="";
					$db="project_shipping";
					
					
					    $dbb=mysqli_connect($host,$user,$pass,$db);
						$query = mysqli_query($dbb,"SELECT *,UNIX_TIMESTAMP() - date_created AS TimeSpent from post LEFT JOIN members on members.user_id = post.user_id order by post_id DESC")or die(mysql_error());

						while($post_row=mysqli_fetch_array($query)){
						$id = $post_row['post_id'];	
						$upid = $post_row['user_id'];	
						$posted_by = $post_row['userNamep'];					
						$_SESSION['id']=$post_row['user_id'];
						}
					?>

				</div>
			</div>
		</div>
	</main>

<?php 
include("footer.php");



