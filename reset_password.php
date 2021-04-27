<?php 
session_start();
ob_start();

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

      if(isset($_GET['token'])){
      	$token=$_GET['token'];
      
      $newpassword=mysqli_real_escape_string($con,$_POST['password']);
      $cpassword=mysqli_real_escape_string($con,$_POST['cpassword']);

      $pass=password_hash($newpassword, PASSWORD_BCRYPT);
      $cpass=password_hash($cpassword, PASSWORD_BCRYPT);
      

      	if($newpassword === $cpassword){

           $updatequery="update registeration set password='$pass' where token='$token'";
           
           $iquery=mysqli_query($con,$updatequery);
           if($iquery){
            $_SESSION['msg']="Your password has been updated";
            header('location:login.php');

           }
           else{
             $_SESSION['passmsg']="Your password is not updated";
             header('location:reset_password.php'); 
           }
      	}
      	
      }
  }

	
	?>
	<div class="card bg-dark">
	<article class="card-body mx-auto" style="max-width=400px;">
		    <img src="logo.jpg" width="120" height="80" style="float: left; margin-left: 20px;">    
	<h4 class="card-title mt-3 text-center" style="color: white;">Create Account</h4>	
	<p class="text-center" style="color: white;">Get started with your free account</p>
	<p class="bg-info text-white px-5"><?php 
        if(isset($_SESSION['passmsg'])){
	    echo $_SESSION['passmsg'];
	}else{
		echo $_SESSION['passmsg']="";
	}?></p>

	<form action="" method="POST">

		

		<div class="form-group input-group">
		    <div class="input-group-prepend">
		    	<span class="input-group-text"><i class="fa fa-lock"></i></span>
		    </div>
		    <input  name="password" id="password" class="form-control" placeholder="New Password" type="password" required>
		    <div class="input-group-prepend">
		    	<span class="input-group-text"><i class="fa fa-eye" aria-hidden="true" id="eye" onclick="toggle()"></i></span>
		    </div>
			</div>	
		<div class="form-group input-group">
		    <div class="input-group-prepend">
		    	<span class="input-group-text"><i class="fa fa-lock"></i></span>
		    </div>
		    
		    <input  name="cpassword" class="form-control" placeholder="Confirm Password" type="password" required>	
		</div>    
		<div class="form-group">
			<button type="submit" name="submit" class="btn btn-primary btn-block">Update Password</button>
		</div>
		<p class="text-center" style="color: white;">Have an account?<a href="login.php">Log In</a></p>
		    
		   
	    					
     
	</form>
		
</article>
</div>
<script>
	var state=false;
	function toggle(){
		if(state){
          document.getElementById("password").setAttribute("type","password");
          document.getElementById("eye").style.color='#7a797e';
          state=false;
		}
		else{
            document.getElementById("password").setAttribute("type","text");
            document.getElementById("eye").style.color='#5887ef';
          state=true;  
		}
	}
</script>



</body>	

</html>