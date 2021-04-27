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
      
      $username=mysqli_real_escape_string($con,$_POST['username']);
      $email=mysqli_real_escape_string($con,$_POST['email']);
      $mobile=mysqli_real_escape_string($con,$_POST['phone']);
      $password=mysqli_real_escape_string($con,$_POST['password']);
      $cpassword=mysqli_real_escape_string($con,$_POST['cpassword']);

      $pass=password_hash($password, PASSWORD_BCRYPT);
      $cpass=password_hash($cpassword, PASSWORD_BCRYPT);
      $token=bin2hex(random_bytes(15));

      $emailquery = "select * from registeration where email ='$email'";
      $query=mysqli_query($con,$emailquery);
      $emailcount = mysqli_num_rows($query);
      
     
     
      if($emailcount>0){
      	echo "email already exist";
      }
   else{

      	if($password!=""&&$cpassword!=""&&$username!=""&&$email!=""&&$mobile!=""&&strlen($username)>=4&&$password === $cpassword&&strlen($mobile)==10&&strlen($password )>=8&&strlen($password )<= 20&&preg_match("#[0-9]+#", $password )&&preg_match("#[a-z]+#", $password )&&preg_match("#[A-Z]+#", $password )&&preg_match("#\W+#", $password )){
      		
           
           $insertquery="insert into registeration(username,email,mobile,password,cpassword,token)values('$username','$email','$mobile','$pass','$cpass','$token')";
           $iquery=mysqli_query($con,$insertquery);
           if($iquery){
           	
           	?>

           	<script>
           		alert("Inserted Successfully");
           	</script>
           	<?php
           	?>
           	<script >
           		alert("Registered Successfully");
           	</script>
           	<?php
           }
           else{
           	
           	?>
           	<script>

           		alert("not inserted check details");
           	</script>
           	<?php
           }
      	
      	
      }
  }
}
	?>
	<div class="card bg-dark">
	<article class="card-body mx-auto" style="max-width=400px;">
	    <img src="logo.jpg" width="120" height="80" style="float: left;margin-left: 20px;">    	
	<h4 class="card-title mt-3 text-center" style="color: white;">Create Account</h4>	
	<p class="text-center" style="color: white;">Get started with your free account</p>
	
	<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST" autocomplete="off" onsubmit="return myfun()" >
		<div class="form-element">
		<div class="form-group input-group">
			<div class="input-group-prepend">
				<span class="input-group-text"><i class="fa fa-user"></i></span>
			</div>
			<input  name="username" id="username" autocomplete="off" class="form-control" placeholder="Full Name" type="text"required>
			<div>
			<span id="usermsg"></span>
		</div>
			</div>	
		<div class="form-group input-group">
		    <div class="input-group-prepend">
		    	<span class="input-group-text"><i class="fa fa-envelope"></i></span>
		    </div>
		    <input  name="email" id="email" class="form-control" placeholder="Email Address" type="email" autocomplete="off"required >
		    <div>
		    <span id="throwmsg"></span>
		</div>
			</div>	
		<div class="form-group input-group">
		    <div class="input-group-prepend">
		    	<span class="input-group-text"><i class="fa fa-phone"></i></span>
		    </div>
		    <input  name="phone" class="form-control" id="phone" placeholder="Mobile Number" type="Number" autocomplete="off" required>
		    <div>
		    <span id="mobmsg"></span>
		</div>
			</div>	
		<div class="form-group input-group">
		    <div class="input-group-prepend">
		    	<span class="input-group-text"><i class="fa fa-lock"></i></span>
		    </div>
		    
		    <input  name="password" id="password" class="form-control" placeholder="Password" type="password" required>
		    <div>
		    <span id="passmsg"></span>
		</div>
		    <div class="input-group-prepend">
		    	<span class="input-group-text"><i class="fa fa-eye" aria-hidden="true" id="eye" onclick="toggle()"></i></span>
		    </div>

		    </div>
			
		<div class="form-group input-group">
		    <div class="input-group-prepend">
		    	<span class="input-group-text"><i class="fa fa-lock"></i></span>
		    </div>
		    
		    <input  name="cpassword" id="cpassword" class="form-control" placeholder="Confirm Password" type="password"required>
		    <div>
		    <span id="cpassmsg"></span>	
		</div>
		</div>    
		<div class="form-group">
			<button type="submit" name="submit" class="btn btn-primary btn-block" style="color: white;">Create Account</button>
		</div>
		<p class="text-center" style="color: white;">Have an account?<a href="login.php">Log In</a></p>
		    
		   
	 </div>  
	 <p id="demo"></p> 					

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
	    
		function myfun(){
		var username=document.getElementById('username').value;
	    var phone=document.getElementById('phone').value;
		var password=document.getElementById('password').value;
		var confirmpassword=document.getElementById('cpassword').value;
		var emailcheck=document.getElementById('email').value;
		var pattern=/^[A-Za-z0-9._]{3,}@[A_Za-z]{3,}[.]{1}[A-Za-z.]{2,6}$/;
		var usercheck=/^[A-Za-z. ]{3,30}$/;
		var passwordcheck=/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,16}$/;
		var mobilecheck=/^[789][0-9]{9}$/;
		if(username==""){
			alert("Username field required");
			
			return false;
		}

		if(!usercheck.test(username)){
			alert("Username incorrect");

			return false;
		}
		
		if(emailcheck==""){
			alert("Email field required");
			
			return false;
		}
		
		if(phone==""){
			alert("Mobile No field required");
		
			return false;
		}
		
		if(phone.length!=10){
			//document.getElementById('mobmsg').innerHTML="Mobile No should be of 10 digits";
			alert("Mobile No should be of 10 digits");
			return false;
		}
		if(!mobilecheck.test(phone)){
			alert("Mobile No incorrect");
			
			return false;
		}
		
		if(password==""){
			alert("Password field required");
			
			return false;
		}
		if(!passwordcheck.test(password)){
			alert("Password incorrect");
			
			return false;
		}
		
		if(confirmpassword==""){
			alert("Password field required");
			
			return false;
		}
		
	    if(!password.match(confirmpassword)){
			alert("Password did not match");
			
			return false;
		}
		
		
		if(!pattern.test(emailcheck)){
           alert("Email is incorrect");
           
           return false;
		}
		
		return true;
	}


</script>
	

</body>	

</html>