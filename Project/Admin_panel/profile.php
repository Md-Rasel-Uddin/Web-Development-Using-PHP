<?php 
include("header.php");
?>

<div class="container">
	
	<div class="row" style="background: #E1E1E1;padding: 7px;margin: 0px 20px;word-wrap: break-word;">
		<div class="col-md-4">		
			<img src="images/cartoon.png" style="height: 150px;width: 120px;margin-top: 20px;" >
			<br>
			<table style="word-wrap: break-word;">
 					<tr>
 						<th> First Name:</th>
 						<td><?php echo $_SESSION['first_Name']; ?>


 						</td>
 					</tr>
 					<p></p>
 					<tr>
 						<th>Last Name:</th>
 						<td> <?php echo $_SESSION['lastName']; ?>
 						</td>
 					</tr>
 					<tr>
 						<th> Company Name:</th>
 						<td><?php echo $_SESSION['companyName']; ?>
 						</td>
 					</tr>
 					<tr>
 						<th>Licence Number:</th>
 						<td><?php echo $_SESSION['licence_number']; ?>
 						</td>
 					</tr>
 					<tr>
 						<th> Email ID:</th>
 						<td><?php echo $_SESSION['email_id']; ?>
 						</td>
 					</tr>
 					<tr>
 						<th>  Type of Company:</th>
 						<td><?php echo $_SESSION['type_of_company']; ?>
 						</td>
 					</tr>
 					<tr>
 						<th> Company Mail ID:</th>
 						<td><?php echo $_SESSION['company_mail_id']; ?>
 						</td>
 					</tr>
 					<tr>
 						<th>Country:</th>
 						<td><?php echo $_SESSION['country']; ?>
 						</td>
 					</tr>
 					<tr>
 						<th>  State:</th>
 						<td><?php echo $_SESSION['state']; ?>
 						</td>
 					</tr>
 					<tr>
 						<th> <b>User Name:</b></th>
 						<td><?php echo $_SESSION['userName']; ?>
 						</td>
 					</tr>
 					
 					
 				</table>
		</div>
		<div class="col-md-8">
			<h2>User-Name:<h1 style="color: blue;padding: 5px;"><?=$_SESSION['userName'];?></h1></h2>
			<h3>Given Advertise:</h3>
			<ol>
				<?php
				/*$all_categories=$db->getAll("post","*");
				foreach ($all_categories as $category) {
					extract($category);
*/


$host="localhost";
					$user="root";
					$pass="";
					$db="project_shipping";
					
					
					    $dbb=mysqli_connect($host,$user,$pass,$db);
					 
							$comment_query = mysqli_query ($dbb,"SELECT * FROM post LEFT JOIN members on members.user_id = post.user_id") or die (mysql_error());
							while ($comment_row=mysqli_fetch_array($comment_query)){
							$comment_id = $comment_row['post_id'];
							$comment_by = $comment_row['userName'];	
							$comment_by = $comment_row['product'];
							//print_r($comment_row);
							 $_SESSION['product']=$comment_row['product'];
										
				?>
				<!-- <li><a href=""><?=$requirements;?></a></li> -->
					<li><a href=""><?php echo $comment_row['requirements'];?></a></li>
				
				<?php
					}
				?>
			</ol>
			<h3>Products Name: </h3>

			<ol class="list-inline">
				<?php
				$db=new Db("localhost","root","","project_shipping");
				$all_categories=$db->getAll("post","*");
				foreach ($all_categories as $category) {
					extract($category);

				?>
				<!-- <li><a href=""><?=$requirements;?></a></li> -->
					<li><a href=""><?php echo $product ;?></a></li>
				
				<?php
					}
				?>
			</ol>
			<!-- <h3>Chat Personally:<br> -->
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;			
			</h3>
		</div>
	</div>	
</div>

<?php 
include("footer.php");
