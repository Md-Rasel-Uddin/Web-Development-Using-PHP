<?php 
include("header.php");

if ($_POST) {
	
	$errors= array();	

	if (empty($_POST['first_name'])) {
		$errors['firstName1'] = "Your first name can't be empty";
	}
	if (empty($_POST['last_name'])) {
		$errors['lastName1'] = "Your last name can't be empty";
	}
	if (empty($_POST['company_name'])) {
		$errors['company_name1'] = "Your company name can't be empty";
	}
	if (empty($_POST['licence_number'])) {
		$errors['licence_number1'] = "Your licence number can't be empty";
	}
	if (empty($_POST['email_id'])) {
		$errors['email_id1'] = "Your email id can't be empty";
	}
	if (empty($_POST['type_of_company'])) {
		$errors['type_of_company1'] = "Your type of company can't be empty";
	}
	if (empty($_POST['company_mail_id'])) {
		$errors['company_mail_id1'] = "Your company mail id can't be empty";
	}
	if (empty($_POST['country'])) {
		$errors['country1'] = "Your country can't be empty";
	}
	if (empty($_POST['state'])) {
		$errors['state1'] = "Your state can't be empty";
	}
	if (empty($_POST['userName'])) {
		$errors['userName1'] = "Your user name can't be empty";
	}
	if (empty($_POST['password'])) {
		$errors['password1'] = "Your password can't be empty";
	}
}

if (@count($errors) == 0) {
	if(isset($_REQUEST['submit'])){
		
		extract($_REQUEST);
		//var_dump($_REQUEST);
		$_SESSION['userName']=$_REQUEST['userName'];		

		if($db->Insert("members","firstName='$first_name',lastName='$last_name',companyName='$company_name',licence_number='$licence_number',email_id='$email_id',type_of_company='$type_of_company',company_mail_id='$company_mail_id',country='$country',state='$state',userName='$userName',password='$password'")){
			//$msg="Insert Success";
			@header("location:index.php");
			$msg="<p style=\"color: ; margin-left:550px\">Registration Success And waiting for Approval!</p>";
		}
		else{
			$msg="Registration Fail!";
		}
	}
}
else{
	echo "<h2 style=\"margin-left:100px;text-transform:capitalize\">fill up the blank fields</h2>";
}
?>

<?=@$msg;?>
<div class="container" id="c4">
 	<div class="row">
 		<div class="col-md-12">
 		
 			<h1 class="memd">Membership</h1>
 		</div>
 	</div>
 	<div class="row">
 		<div class="col-md-12"> 		
 			<form style="margin-bottom: 50px; background:  #dfe2c5;padding: 30px;" class="formm"  method="post">
 				<table>
 					<tr>
 						<th>* First Name:</th>
 						<td><input type="text" name="first_name" value="<?php if(isset($_POST['first_name'])) echo $_POST['first_name']; ?>">
 							<?php if (isset($errors['firstName1'])) {
							echo $errors['firstName1'];
							} ?> 

 						</td>
 					</tr>
 					<p></p>
 					<tr style="margin-top: 15px">
 						<th>* Last Name:</th>
 						<td><input type="text" name="last_name" value="<?php if(isset($_POST['last_name'])) echo $_POST['last_name']; ?>">
 							<?php if (isset($errors['lastName1'])) {
							echo $errors['lastName1'];
							} ?> 
 						</td>
 					</tr>
 					<tr>
 						<th>* Company Name:</th>
 						<td><input type="text" name="company_name" value="<?php if(isset($_POST['company_name'])) echo $_POST['company_name']; ?>">

 							<?php if (isset($errors['company_name1'])) {
							echo $errors['company_name1'];
							} ?> 
 						</td>
 					</tr>
 					<tr>
 						<th>* Licence Number:</th>
 						<td><input type="number" name="licence_number" value="<?php if(isset($_POST['licence_number'])) echo $_POST['licence_number']; ?>">
 							<?php if (isset($errors['licence_number1'])) {
							echo $errors['licence_number1'];
							} ?> 
 						</td>
 					</tr>
 					<tr>
 						<th>* Email ID:</th>
 						<td><input type="email" name="email_id" value="<?php if(isset($_POST['email_id'])) echo $_POST['email_id']; ?>">
 							<?php if (isset($errors['email_id1'])) {
							echo $errors['email_id1'];
							} ?> 
 						</td>
 					</tr>
 					<tr>
 						<th>  Type of Company:</th>
 						<td><input type="text" name="type_of_company" value="<?php if(isset($_POST['type_of_company'])) echo $_POST['type_of_company']; ?>">
 							<?php if (isset($errors['type_of_company1'])) {
							echo $errors['type_of_company1'];
							} ?> 
 						</td>
 					</tr>
 					<tr>
 						<th>* Company Mail ID:</th>
 						<td><input type="email" name="company_mail_id" value="<?php if(isset($_POST['company_mail_id'])) echo $_POST['company_mail_id']; ?>">
 							<?php if (isset($errors['company_mail_id1'])) {
							echo $errors['company_mail_id1'];
							} ?> 
 						</td>
 					</tr>
 					<tr>
 						<th>* Country:</th>
 						<td><input type="text" name="country" value="<?php if(isset($_POST['country'])) echo $_POST['country']; ?>">
 							<?php if (isset($errors['country1'])) {
							echo $errors['country1'];
							} ?> 
 						</td>
 					</tr>
 					<tr>
 						<th>  State:</th>
 						<td><input type="text" name="state" value="<?php if(isset($_POST['state'])) echo $_POST['state']; ?>">
 							<?php if (isset($errors['state1'])) {
							echo $errors['state1'];
							} ?> 
 						</td>
 					</tr>
 					<tr>
 						<th>* <b>User Name:</b></th>
 						<td><input type="text" name="userName" value="<?php if(isset($_POST['userName'])) echo $_POST['userName']; ?>">
 							<?php if (isset($errors['userName1'])) {
							echo $errors['userName1'];
							} ?> 
 						</td>
 					</tr>
 					<tr>
 						<th>* <b>Password</b>:</th>
 						<td><input type="password" name="password">
 							<?php if (isset($errors['password1'])) {
							echo $errors['password1'];
							} ?> 
 						</td>
 					</tr>
 					<tr>
 						<td><input style="margin-top: 25px;margin-bottom: 25px;padding-left: 30px;padding-right: 30px" type="submit" name="submit" value="Submit"></td>
 					</tr>
 				</table>
 			</form>	
 		</div>
 	</div>
</div>

<?php 
include("footer.php");
