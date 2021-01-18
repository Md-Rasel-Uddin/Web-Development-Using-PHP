<?php 
session_start();
include("db.php");

if(isset($_REQUEST['login'])){
	extract($_REQUEST);
	//$password=sha1($password);

if($db->getById("members","*","email_id='$email_id' AND password='$password' AND status=1")!=false){
		$info=$db->getById("members","*","email_id='$email_id' AND password='$password' AND status=1");
		$_SESSION['email_id']=$info['email_id'];
		$_SESSION['id']=$info['serial_id'];
		$user_id=$_SESSION['user_id'];	

		header("location:Admin_panel/index.php");
	}
	else{
		echo "Invalid Username/Password";
	}

	$query = mysql_query("SELECT * FROM members WHERE email_id='$email_id' AND password='$password'")or die(mysql_error());
	$count = mysql_num_rows($query);

	if ($count > 0){		
		$_SESSION['id']=$info['serial_id'];		
			echo 'true';		
		}
		else{ 
			echo 'false';
		}
}


if (isset($_REQUEST['submit_post'])) {
	extract($_REQUEST);
	
	if ($db->Insert("post","title='$title',content='$content',status='$status'")) {		
		$msg="<p style=\"color: ; margin-left:598px\">post  Success!</p>";
	}
	else{		
		$msg="<p style=\"color: ; margin-left:598px\">post Fail!</p>";
	}
}

if (isset($_REQUEST['submit_edit_post'])) {
	extract($_REQUEST);
	if ($db->Update("categories","title='$title',content='$content',status='$status'","cat_id=$cat_id")) {
	}
	else{
		echo "fail";		
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="icon" href="images/gallery/o1.jpg">
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="login-register.css" rel="stylesheet" />
    <script src="jquery/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="bootstrap3/js/bootstrap.js" type="text/javascript"></script>
	<script src="login-register.js" type="text/javascript"></script>	
	<title>ShippingGiant</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/styleSheet.css">
	<link href="jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen"/>
	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="//cdn.ckeditor.com/4.8.0/full/ckeditor.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="vendors/jquery-1.7.2.min.js"></script>
    <script src="vendors/bootstrap.js"></script>
	<style>
		.carousel-caption {
			   
		}
		ul li a{
			font-weight: bold;
		}
		ul li a:hover{
			color: blue;
			font-size: 15px;	
		}
			var carouselContainer = $('.carousel');
			var slideInterval = 5000;

			function toggleCaption() {
			    $('.carousel-caption').hide();
			    var caption = carouselContainer.find('.active').find('.carousel-caption');
			    caption.delay(500).toggle("slide", {direction:'up'});
			}

			carouselContainer.carousel({
			    interval: slideInterval,
			    cycle: true,
			    pause: "hover"
			}).on('slid.bs.carousel', function() {
			    toggleCaption();
			});
	</style>
</head>
<body>
	<div class="structure">
		<div class="container">
			<div class="header_top">
				<div class="row">
					<div class="col-md-6">
						<h3 style="margin-top: 5px;color: white;"><i>ShippingGiant</i></h3>
					</div>
					<div class="col-md-6">
						<div class="pull-right" style="padding-top: 12px;">
							<p style="color: white;display: inline">Welcome to your account,<h4 style="color: yellow;display: inline;padding-right: 5px"><?=$_SESSION['userName'];?></h4><span><a style="color: red;background-color: #42F4E8;padding: 5px 4px" data-toggle="tooltip" data-placement="bottom" title="By clicking this , you are going to sign out of internal issues!" href="../index.php"> Sign out</a></span>					
								<?php 
									if ( $_SESSION['userName']=="ddd") {
										echo "<a href=\"admin/ffol/index.php\" style=\"color: red;background-color: #42F4E8;padding: 5px 4px\">admin</a>";
									}
								?>
							</p>
						</div>
					</div>				
				</div>
			</div>
		</div>
		</div>
		<div class="container">		
			<div class="row">
				<div class="col-md-12">
					<div id="myCarousel" class="carousel slide" data-ride="carousel">					   
					    <ol class="carousel-indicators">
					      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					      <li data-target="#myCarousel" data-slide-to="1"></li>
					      <li data-target="#myCarousel" data-slide-to="2"></li>
					    </ol>
					  
					    <div class="carousel-inner">
					      <div class="item active">
					        <img src="images/gallery/o1.jpg" alt="Los Angeles" style="width:100%;height:350px">
					         <div class="carousel-caption">    
    							<p>This Company Is The World Largest Shipping Company!</p>
 							 </div>
					      </div>

					      <div class="item">
					        <img src="images/gallery/o2.jpg" alt="Chicago" style="width:100%;height:350px">
					        <div class="carousel-caption">    
    							<p>Welcome To Your Account & Post Here Your Order !</p>
  							</div>
					      </div>
					    
					      <div class="item">
					        <img src="images/gallery/o3.jpg" alt="New york" style="width:100%;height:350px">
					        <div class="carousel-caption">    
   								<p>Meet The Best Company !</p>
 							 </div>
					      </div>
					    </div>
					   
					    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
					      <span class=""></span>
					      <span class="sr-only">Previous</span>
					    </a>
					    <a class="right carousel-control" href="#myCarousel" data-slide="next">
					      <span class=""></span>
					      <span class="sr-only">Next</span>
					    </a>
					</div>
				</div>
			</div>			
		</div>

		<div class="container">
			<div class="" style="background: #42f4e8;margin-left: 22px;margin-right: 22px;margin-bottom: 5px;">
				<div class="row">
					<div class="col-md-1">
						<p><b><h4>News</h4></b></p>
					</div>
					<div class="col-md-11">
						<marquee style="padding-top: 20px"><b><span>Are you searching trusted company for shipping!</span><span>&nbsp;&nbsp;&nbsp;Create Account & post here your order !</span><span>&nbsp;&nbsp;&nbsp;We are the world's largest shipping company!</span>........</b></marquee>
					</div>
				</div>
			</div>
		</div>

		<div class="container">		
				<div class="row">
					<div class="col-md-12">
						<div>
							<nav class="navbar navbar-default" style="background: #42e2f4">
							  <div class="container-fluid">							  
							    <div class="navbar-header">
							      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							        <span class="sr-only">Toggle navigation</span>
							        <span class="icon-bar"></span>
							        <span class="icon-bar"></span>
							        <span class="icon-bar"></span>
							      </button>
							      <a class="navbar-brand" href="index.php" style="padding-top: -5px">Home</a>
							    </div>

							    <div class="collapse navbar-collapse"  id="bs-example-navbar-collapse-1">
							      	<ul class="nav navbar-nav ">							      
								      <li><a href="ad.php?action=category">Advertisement</a></li>	
								      <li><a href="give_ad.php?id=category">Give Advertisement</a></li>
								      <li><a href="profile.php">Profile</a></li>
									  <li><a href="chat_box.php">Chatbox</a></li>
							    	</ul>
							      <form action="" method="GET" class="navbar-form navbar-right">
							        <div class="form-group">
							          <input type="text" name="query" class="form-control" placeholder="Search" style="width: 200px;">
							        </div>							      
							         <input type="submit" value="Search" class="btn btn-default" />
							      </form>
							    </div>
							</nav>
						</div>
					</div>
				</div>
			</div>		

			<div class="modal fade login" id="loginModal">
		      <div class="modal-dialog login animated">
    		      <div class="modal-content">
    		         <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Login Your Account</h4>
                    </div>
                    <div class="modal-body">  
                        <div class="box">
                             <div class="content">
                                <div class="social">
                                    <a class="circle github" href="">
                                        <i class="fa fa-github fa-fw"></i>
                                    </a>
                                    <a id="google_login" class="circle google" href="">
                                        <i class="fa fa-google-plus fa-fw"></i>
                                    </a>
                                    <a id="facebook_login" class="circle facebook" href="">
                                        <i class="fa fa-facebook "></i>
                                    </a>
                                </div>
                                <div class="division">
                                    <div class="line l"></div>
                                      <span>Enter</span>
                                    <div class="line r"></div>
                                </div>
                                <div class="error"></div>
                                <div class="form loginBox">
                                   
                                    <form action="" method="post">
										<table class="table table-bordered table-hover table-stripped table-condensed table-responsive">
											<tr>
												<th>Email: </th>
												<td><input type="email" class="form-control" name="email_id" placeholder="jhon@doe.com"></td>
											</tr>
											<tr>
												<th>Password: </th>
												<td><input type="password" class="form-control" name="password" placeholder="****"></td>
											</tr>
											<tr>							
												<td colspan="2" class="text-center"><input class="btn btn-primary" type="submit" name="login" value="Login"></td>
											</tr>						
										</table>
									</form>
                                </div>
                             </div>
                        </div>
                        <div class="box">
                            <div class="content registerBox" style="display:none;">
                             <div class="form">
                                <form method="post" html="{:multipart=>true}" data-remote="true" action="/register" accept-charset="UTF-8">
                                <input id="email" class="form-control" type="text" placeholder="Email" name="email">
                                <input id="password" class="form-control" type="password" placeholder="Password" name="password">
                                <input id="password_confirmation" class="form-control" type="password" placeholder="Repeat Password" name="password_confirmation">
                                <input class="btn btn-default btn-register" type="submit" value="Create account" name="login">
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="forgot login-footer">
                            <span>Click here to 
                                 <a href="javascript: showRegisterForm();">create an account</a>
                            ?</span>
                        </div>
                        <div class="forgot register-footer" style="display:none">
                             <span>Already have an account?</span>
                             <a href="javascript: showLoginForm();">Login</a>
                        </div>
                    </div>        
    		    </div>
		    </div>
		</div>

<div class="container">
			<div class="row">
					<div class="col-md-12">
						<div>
							<?php
							    @$query = $_GET['query']; 						 
							     
							    $min_length = 3;							 
							     
							    if(strlen($query) >= $min_length){ 
							         
							        $query = htmlspecialchars($query); 

							        $query = mysql_real_escape_string($query);						      
							         
							        $raw_results = mysql_query("SELECT * FROM post
							            WHERE (requirements LIKE '%".$query."%') ") or die(mysql_error());							           
							        if(mysql_num_rows($raw_results) > 0){ 
							             
							            while($results = mysql_fetch_array($raw_results)){
							           
							             	echo "Search results:";
							                echo "<p><h3>".$results['requirements']."</h3>".$results['details']."</p>";							               
							            }							             
							        }
							        else{ 
							            echo "No results";
							        }							         
							    }
							    else{ 
							    }
							?>
						</div>
					</div>
				</div>
			</div>


