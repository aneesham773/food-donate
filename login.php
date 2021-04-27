<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="style-1.css">
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   <script src="https://kit.fontawesome.com/yourcode.js"></script>
    <script src="https://kit.fontawesome.com/a0941870c8.js" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >

    </head>
<body background="bg.jpg">
	<?php

     include 'config.php';
     if(isset($_POST['submit'])){
     	$email=$_POST['email'];
     	$password=$_POST['password'];
     	$email_search="select * from registeration where email='$email'";
     	$query=mysqli_query($con,$email_search);
     	$email_count=mysqli_num_rows($query);
     	if($email_count){
     		$email_pass=mysqli_fetch_assoc($query);
     		$db_pass=$email_pass['password'];
     		$_SESSION['username']=$email_pass['username'];
     		$pass_decode=password_verify($password, $db_pass);
     		if($pass_decode){
     			?>
     			<script>
                 alert('Login Successful');
             </script>
             <?php
                ?>
                <script>
                	location.replace("index-part.php");
                </script>
                <?php
     		}else{
     			echo 'password incorrect';
     		}
     	}else{
     			echo 'Invalid email';
     		}
     	}
     
	?>
	<div class="card bg-dark">
	<article class="card-body mx-auto" style="max-width=400px;">
    <img src="logo.jpg" width="120" height="80" style="float: left;">    
		
	<h4 class="card-title mt-3 text-center" style="color: white;">Create Account</h4>	
	<p class="text-center" style="color: white;">Get started with your free account</p>
	
		
	<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
		<div class="form-group input-group">
			<div class="input-group-prepend">
				<span class="input-group-text"><i class="fa fa-envelope"></i></span>
			</div>
			<input  name="email" class="form-control" placeholder="Enter Email" type="email" autocomplete="off"required>
			</div>	
		
		<div class="form-group input-group">
		    <div class="input-group-prepend">
		    	<span class="input-group-text"><i class="fa fa-lock"></i></span>
		    </div>
		    <input  name="password" class="form-control" placeholder="Password" type="password" autocomplete="off"required>
			</div>	
		  
		<div class="form-group">
			<button type="submit" name="submit" class="btn btn-primary btn-block">Login Now</button>
		</div>
		<p class="text-center" style="color: white;">Forgot your Password?<a href="recover_email.php">Click Here</a></p>
		<p class="text-center" style="color: white;">Not have an account?<a href="registeration.php">Sign Up Here</a></p>
		    
		   
	    					

	</form>	

</body>	

</html>