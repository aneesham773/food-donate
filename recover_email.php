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
	require 'includes/PHPMailer.php';
    require 'includes/SMTP.php';
    require 'includes/Exception.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

	if(isset($_POST['submit'])){
   $email=mysqli_real_escape_string($con,$_POST['email']);
   $emailquery = "select * from registeration where email ='$email'";
      $query=mysqli_query($con,$emailquery);
      $emailcount = mysqli_num_rows($query);
      if($emailcount){
      	$userdata=mysqli_fetch_array($query);
      	$username=$userdata['username'];
      	$token=$userdata['token'];

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth ="true";
$mail->SMTPSecure="tls";
$mail->Port="587";
$mail->Username="your username";
$mail->Password="your password";
$mail->Subject = "PASSWORD RESET";
$mail->setFrom("sender username");
$mail->Body="Hi,$username.Click here to reset your password http://localhost/front/reset_password.php?token=$token";
$mail->addAddress("sender address");
if($mail->Send()){
	echo 'Email Sent..';
	$_SESSION['msg']="check your mail to reset your password $email";
	header('location:login.php');
}
else{
	echo 'Error..!';
}
$mail->smtpClose();


      }else{
      	echo 'No email found.';
      }

  }
    

	?>
	<div class="card bg-dark">
	<article class="card-body mx-auto" style="max-width=400px;">
		    <img src="logo.jpg" width="120" height="80" style="float: left; margin-left:10px;">    
	<h4 class="card-title mt-3 text-center" style="color: white;">Recover your account</h4>	
	<p class="text-center"style="color: white;">Please fill the mobile number</p>
	
	
	<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
		
		<div class="form-group input-group">
		    <div class="input-group-prepend">
		    	<span class="input-group-text"><i class="fa fa-envelope"></i></span>
		    </div>
		    <input  name="email" class="form-control" placeholder="Email Address" type="email" autocomplete="off"required>
			</div>	
		
		
		  
		<div class="form-group">
			<button type="submit" name="submit" class="btn btn-primary btn-block">Send Mail</button>
		</div>
		<p class="text-center" style="color: white;">Have an account?<a href="login.php">Log In</a></p>

		    
		   
	    					

	</form>	
</article>
</div>

</body>	

</html>