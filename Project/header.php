<?php 
session_start();
include("db.php");

if(isset($_REQUEST['login'])){
	extract($_REQUEST);
	/*$password=sha1($password);*/

if($db->getById("members","*","email_id='$email_id' AND password='$password' AND status=1")!=false){
		$info=$db->getById("members","*","email_id='$email_id' AND password='$password' AND status=1");
		 $_SESSION['userName']=$info['userName'];
		 $_SESSION['first_Name']=$info['firstName'];
		 $_SESSION['lastName']=$info['lastName'];
		 $_SESSION['companyName']=$info['companyName'];
		 $_SESSION['licence_number']=$info['licence_number'];
		 $_SESSION['email_id']=$info['email_id'];
		 $_SESSION['type_of_company']=$info['type_of_company'];
		 $_SESSION['company_mail_id']=$info['company_mail_id'];
		 $_SESSION['country']=$info['country'];
		 $_SESSION['state']=$info['state'];
		 $_SESSION['userName']=$info['userName'];
		

		 header("location:Admin_panel/index.php");
	}
	else{
		echo "
		<script>
		alert(\"Invalid Username/Password\");
	</script>";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="login-register.css" rel="stylesheet" />
    <script src="jquery/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="bootstrap3/js/bootstrap.js" type="text/javascript"></script>
	<script src="login-register.js" type="text/javascript"></script>

	<title>ShippingGiant</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/styleSheet.css">
	<link rel="icon" href="images/icon.png">

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
			    caption.delay(500).toggle("slide", {direction:'down'});
			}

			carouselContainer.carousel({
			    interval: slideInterval,
			    cycle: true,
			    pause: "hover"
			}).on('slid.bs.carousel', function() {
			    toggleCaption();
			});

	</style>
	<style>
		* {
    		box-sizing: border-box;
		}

		body {
		    margin: 0;
		    font-family: Arial;
		}

		/* The grid: Four equal columns that floats next to each other */
		.column {
		    float: left;
		    width: 25%;
		    padding: 10px;
		}

		/* Style the images inside the grid */
		.column img {
		    opacity: 0.8; 
		    cursor: pointer; 
		}

		.column img:hover {
		    opacity: 1;
		}

		/* Clear floats after the columns */
		.row:after {
		    content: "";
		    display: table;
		    clear: both;
		}

		/* The expanding image container */
		.container {
		    position: relative;
		    
		}

		/* Expanding image text */
		#imgtext {
		    position: absolute;
		    bottom: 15px;
		    left: 15px;
		    color: white;
		    font-size: 20px;
		}

		/* Closable button inside the expanded image */
		.closebtn {
		    position: absolute;
		    top: 10px;
		    right: 15px;
		    color: white;
		    font-size: 35px;
		    cursor: pointer;
		}
	</style> 
	
</head>
<body>	
	<div class="structure">
		<div class="container">
			<div class="header_top">
				<div class="row">
					<div class="col-md-6">
						<h3 style="margin-top: 4px;color: #42F4E8;"><i>ShippingGiant</i></h3>
					</div>
					<div class="col-md-6">
						<div class="pull-right">
							<p><span> </span><span><a class="btn big-login" data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();">Log in</a>              			 	
                 				<a class="btn big-register" href="members.php#c4">Register</a></span>
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
        
        							<p>Want To Be A Member Of This Company! <a href="members.php#c4">click here</a></p>
     							 </div>
						      </div>

						      <div class="item">
						        <img src="images/gallery/o2.jpg" alt="Chicago" style="width:100%;height:350px">
						        <div class="carousel-caption">
        
        							<p>Just Create Account & post here your order !</p>
      							</div>
						      </div>
						    
						      <div class="item">
						        <img src="images/gallery/o3.jpg" alt="New york" style="width:100%;height:350px">
						        <div class="carousel-caption">
        
       								<p>And sellers keep eye to get buyers!</p>
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
								      
								      <li><a href="about.php">About Us</a></li>
								      <li class="dropdown">
								          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Business Excellence <span class="caret"></span></a>
								          <ul class="dropdown-menu">
								            <li><a href="business_exc.php">Our Services</a></li>
								            <li><a href="business_exc_policy.php">Our Policy</a></li>			            
								          </ul>
								        </li>
								      <li><a href="members.php">Members</a></li>
								      <li><a href="contact.php">Contact Us</a></li>
									  <li><a href="gallery.php">Gallery</a></li>
								    </ul>
								      <form action="" method="GET" class="navbar-form navbar-right">
								        <div class="form-group">
								          <input type="text" name="query" class="form-control" placeholder="Search" style="width: 200px;">
								        </div>								      
								         <input type="submit" value="Search" class="btn btn-default" style="width: 24%;padding: 10px 15px;" />
								      </form>
								      
								    </div>
								  </div>
								</nav>
							</div>
						</div>
					</div>			
				</div>

<?php


	
   @mysqli_connect("localhost", "root", "") or die("Error connecting to database: ".mysql_error());   
     
   @ mysqli_select_db("project_shipping");  
?>

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
							            WHERE (`content` LIKE '%".$query."%') ") or die(mysql_error());
							       
							         
							        if(mysql_num_rows($raw_results) > 0){ 
							             
							            while($results = mysql_fetch_array($raw_results)){							           
							             	echo "Search results:";
							                echo "<p><h3>".$results['content']."</h3>".$results['content']."</p>";	
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
												<td><input type="password" class="form-control" name="password" placeholder="******"></td>
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
                                 <a href="members.php#c4">create an account</a>
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
    

