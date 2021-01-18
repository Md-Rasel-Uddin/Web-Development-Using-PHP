<?php 
include("header.php");
?>

<main>

<div class="container" style="background-color: #fcfcfc;">
	<div class="row">		
		<div class="col-lg-12" >
			<form method="post" hidden>				
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
						<td>Add file</td>
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
						<td><input type="text" name="status" value="1"></td>
					</tr>											
					<tr>
						<td></td>
						<td><button style="width: 100%" name="post">Submit</button></td>
					</tr>
				</table>
			</form>
			

					<div style="background: #E1E1E1;padding: 7px;">
						<h2 style="background-color: #85CFFE;padding: 7px; font-family: Abadi MT Condensed Light">LATEST ADVERTISE</h2>
				<br>
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
						?>
				
					<h5>Posted by: <a href="#"> <?php echo $posted_by; ?></a>
					
						<?php				
							$days = floor($post_row['TimeSpent'] / (60 * 60 * 24));
							$remainder = $post_row['TimeSpent'] % (60 * 60 * 24);
							$hours = floor($remainder / (60 * 60));
							$remainder = $remainder % (60 * 60);
							$minutes = floor($remainder / 60);
							$seconds = $remainder % 60;
							if($days > 0){
							echo @date('F d, Y - H:i:sa', $post_row['date_created']);
								}
							elseif($days == 0 && $hours == 0 && $minutes == 0){
							echo "A few seconds ago";	
								}	
							elseif($days == 0 && $hours == 0){
							echo $minutes.' minutes ago';
							}
						?>
					</h5>

					<h3 style="background-color: #85CFFE;padding: 8px;border: 0px solid gray">
						<?php echo $post_row['requirements']; ?>
					</h3>
					<h5><b>shipmentTime:</b></h5> <p><?php echo $post_row['shipmentTime']; ?></p>
					<h5><b>product:</b></h5> <p><?php echo $post_row['product']; ?></p>
					<h5><b>amountProduct:</b></h5><p> <?php echo $post_row['amountProduct']; ?></p>
					<h5><b>Details:</b></h5><p><?php echo $post_row['details']; ?></p>

					<a href="chat_box.php#here"  data-toggle="tooltip" data-placement="bottom" title="Contact to deal this product!" style="background-color: #42F4E8;padding: 8px;margin-top: 30px;text-decoration: none;">Deal this product</a>

					<form method="post" style="margin-top: 20px;">

						Comment:<br>
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
						<textarea name="comment_content" rows="2" cols="44" style="text-align:center;" placeholder=".........Type your comment here........" required></textarea><br>
						<input type="submit" name="comment">
					</form>

						<?php 
							$comment_query = mysqli_query ($dbb,"SELECT * ,UNIX_TIMESTAMP() - date_posted AS TimeSpent FROM comment LEFT JOIN members on members.user_id = comment.user_id where post_id = '$id'") or die (mysql_error());
							while ($comment_row=mysqli_fetch_array($comment_query)){
							$comment_id = $comment_row['comment_id'];
							$comment_by = $comment_row['userName'];											
						?>

						<br>
						Comment by:<a href="#"><?php echo $comment_by;?> <?=$_SESSION['userName'];?></a> :
							<p style="padding-left: 10px"><?php echo $comment_row['content'];?></p>
					
							<?php				
								$days = floor($comment_row['TimeSpent'] / (60 * 60 * 24));
								$remainder = $comment_row['TimeSpent'] % (60 * 60 * 24);
								$hours = floor($remainder / (60 * 60));
								$remainder = $remainder % (60 * 60);
								$minutes = floor($remainder / 60);
								$seconds = $remainder % 60;
								if($days > 0)
								echo date('F d, Y - H:i:sa', $comment_row['date_posted']);
								elseif($days == 0 && $hours == 0 && $minutes == 0)
								echo "A few seconds ago";		
								elseif($days == 0 && $hours == 0)
								echo $minutes.' minutes ago<br><br>';
								?>
								<?php
								}
							?>					
						&nbsp;

						<?php 
							if ($u_id = $id){
						?>	
					
						<?php 
							}
						else{
						?>
						
						<?php
						} } 
						?>							
						<?php
							if (isset($_POST['post'])){
							
							$userNamep  = $_POST['userNamep'];
							$requirements= $_POST['requirements'];
							$shipmentTime= $_POST['shipmentTime'];
							$product= $_POST['product'];
							$amountProduct= $_POST['amountProduct'];
							$details= $_POST['details'];
							$status=$_POST['status'];




							/////////////	


							$user_id=1;



							///////////
							
							
									$host="localhost";
					$user="root";
					$pass="";
					$db="project_shipping";
					
					
					    $dbb=mysqli_connect($host,$user,$pass,$db);

							mysqli_query($dbb,"insert into post (userNamep,requirements,shipmentTime,product,amountProduct,details,status,date_created,user_id) values ('$userNamep','$requirements','$shipmentTime','$product','$amountProduct','$details','$status','".strtotime(date("Y-m-d h:i:sa"))."','$user_id') ")or die(mysql_error());
							@header('location:home.php');
							}
						?>

						<?php							
							if (isset($_POST['comment'])){
							$comment_content = $_POST['comment_content'];
							$user_id=$_POST['user_id'];
							$post_id=$_POST['id'];	
							
									$host="localhost";
					$user="root";
					$pass="";
					$db="project_shipping";
					
					
					    $dbb=mysqli_connect($host,$user,$pass,$db);
							
							mysqli_query($dbb,"insert into comment (post_id,user_id,content,date_posted) values ('$post_id','$user_id','$comment_content','".strtotime(date("Y-m-d h:i:sa"))."')") or die (mysqli_error());
							@header('location:ad.php');
							}
						?>	
						</div>
						<br>
					</div>	
				</div>
			</div>
		</div>
	</main>

<script src="vendors/jquery-1.7.2.min.js"></script>
<script src="vendors/bootstrap.js"></script>

<?php 
include("footer.php");
