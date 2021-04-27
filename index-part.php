<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['username'])){
	header('location:login.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style-css.css">
     <link rel="stylesheet" type="text/css" href="normalize.css">
	 <link rel="stylesheet" type="text/css" href="grid.css">
	 <link rel="stylesheet" type="text/css" href="ionicons.min.css">
	 <link rel="stylesheet" type="text/css" href="animate.css">
	 <link rel="stylesheet" type="text/css" href="queries.css">
	 



	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital@1&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="./fontawesome-free-5.13.0-web/css/all.css">

  <script src="https://kit.fontawesome.com/yourcode.js"></script>
    <script src="https://kit.fontawesome.com/a0941870c8.js" crossorigin="anonymous"></script>

  
</head>

<body>
	<header>
	
     <nav class="bg-dark">


     <div class= "row">
     	<img src="logo.jpg" width="120" height="80" style="margin-top: 20px;margin-bottom: 20px;margin-left: 30px;">
     	<div class="openMenu"><i class="fa fa-bars" style="color: white;"></i></div>
  	 
     <ul class="mainMenu">

      	
      <li class="nav-item active">
        <a class="nav-link" href="index-part.php" style="margin-left: 20px;margin-top: 20px;">Home <span class="sr-only">(current)</span></a>
      </li>
      

      <li class="nav-item">
        <a class="nav-link" href="veggies.php" style="margin-top: 20px;">Products</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="about.php"style="margin-top: 20px;">About</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="contact.php"style="margin-top: 20px;">Contact</a>
      </li>
        <li class="nav-item">
      <a href="cart.php" class="nav-link" style="margin-top: 20px;"><i class="fas fa-shopping-cart"></i><span id="cart-item" class="badge badge-danger"></span></a>
       </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php" style="margin-top: 20px;"><i class="fa fa-sign-out" aria-hidden="true">Logout</i></a>

      </li>
      <div class="closeMenu"><i class="fa fa-times" style="color: white;"></i></div>
      
    </ul>
	
 </div>
</nav>
 <span style="color:white;margin-top:-75px;margin-right: 30px;float: right;font-size: 30px;"><i class="fa fa-user" align="center"></i></span>
 <h4 style="color:white;font-size: 20px;float: right;margin-top:-38px;margin-right:20px;"><?php echo $_SESSION['username'];?></h4>

</header>

    
  





<script type="text/javascript">
	window.addEventListener("scroll",function(){
		var header=document.querySelector("header");
		header.classList.toggle("sticky",window.scrollY=0);
	});
	
	$(document).ready(function(){
       load_cart_item_number();
       function load_cart_tem_number(){
       	$.ajax({
       		url:'action.php',
       		method:'get',
       		data:{cartItem:"cart-item"},
       		success:function(response){
       			$("#cart-item").html(response);
       		}
       		});
       	}
       
		
	});
</script>
 

<div id="demo" class="carousel slide" data-ride="carousel">

  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="2.jpg" alt="DONATE" width="1800" height="500">
      <div class="carousel-caption">
        <h3 style="color:black;">DONATE</h3>
        <p style="color:black;">Show some Love</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="3.jpg" alt="DONATE A CAN" width="1800" height="500">
      <div class="carousel-caption">
        <h3 style="color:black;">DONATE A CAN</h3>
        <p style="color: black;">Lets Kick Hunger</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="1-img.jpg" alt="LEND A HELPING HAND" width="1800" height="500">
      <div class="carousel-caption">
        <h3 style="color:black;">LEND A HELPING HAND</h3>
        <p style="color:black;">Donate a Can</p>
      </div>   
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>


<section class="my-5">
	<div class="py-5">
		<h3 class="text-center">
			About Us
		</h3>
	</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-6 col-md-6 col-12">
			<img src="4.jpg" class="img-fluid aboutimg">
		</div>
		<div class="col-lg-6 col-md-6 col-12">
			<h2 class="display-4">Welcome to Food Bank</h2>
			<p class="py-5">We save lives.
			This is a non-profit organization that distributes food aiming towards hunger-relief. We act as food storage and distribution depots; and usually give out food directly to people struggling with hunger.
			</p>
			<a href="about.php" class="btn btn-success">Know More</a>
		</div>
		
	</div>
</div>
</section>

<section class="my-5">
	<div class="py-5">
		<h3 class="text-center">
			Our Services
		</h3>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-12">
				<div class="card">
  					<img class="card-img-top" src="5.jpg" alt="Card image">
  					<div class="card-body">
    					<h4 class="card-title">Fruits and Vegetables</h4>
    					<p class="card-text">Fresh Veggies</p>
    					<a href="veggies.php" class="btn btn-primary">View All</a>
  					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-12">
				<div class="card">
  					<img class="card-img-top" src="6.jpg" alt="Card image">
  					<div class="card-body">
    					<h4 class="card-title">Oats and Pulses</h4>
    					<p class="card-text">Instant Nutrition</p>
    					<a href="grains.php" class="btn btn-primary">View All</a>
  					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-12">
				<div class="card">
  					<img class="card-img-top" src="7.jpg" alt="Card image">
  					<div class="card-body">
    					<h4 class="card-title">Canned Food Items</h4>
    					<p class="card-text">Remains Fresh for Days</p>
    					<a href="dairy.php" class="btn btn-primary">View All</a>
  					</div>
				</div>
			</div>
			
		</div>
		
	</div>
</section>

<section class="my-5">
	<div class="py-5">
		<h3 class="text-center">
			Our Gallery
		</h3>
	</div>

	<section class="section-meals">
	 <ul class="meals-showcase clearfix">
	  <li>
	        <figure class="meal-photo">
				<img src="g1.jpg" class="img-fluid pb-4" style="left: 15px;" >
			</figure>
	  </li>			
      <li>
	        <figure class="meal-photo">		
				<img src="g2.jpg"  class="img-fluid pb-4">
			</figure>
	  </li>		
      <li>
	        <figure class="meal-photo">
				<img src="g3.jpg" class="img-fluid pb-4" >
			</figure>
	  </li>	
	  </ul>	
	  <ul class="meals-showcase clearfix">
	  <li>
	        <figure class="meal-photo">
				<img src="g4.jpg" class="img-fluid pb-4" >
			</figure>
	  </li>	
	  <li>
	       <figure class="meal-photo">	
			
				<img src="g5.jpg" class="img-fluid pb-4" >
		    </figure>
	  </li>				
			
       <li>
	        <figure class="meal-photo">
				<img src="g6.jpg" class="img-fluid pb-4" >
		    </figure>
	   </li>
	   </ul>
	   <ul class="meals-showcase clearfix">
	   <li>			
	        <figure class="meal-photo">
				<img src="g7.jpg"  class="img-fluid pb-4" >
			</figure>
	   </li>		
		<li>
		    <figure class="meal-photo">	
				<img src="g8.jpg"  class="img-fluid pb-4" style="align-items: center;">
			</figure>
		</li>	
		<li>
		    <figure class="meal-photo">	
				<img src="g9.jpg" class="img-fluid pb-4" style="align-items: center;">
			</figure>
		</li>
		</ul>	
			
	
</section>



<footer>
  <div class="row">
                <div class="col span-1-of-2">
                    <ul class="footer-nav">
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Press</a></li>
                        <li><a href="#">iOS App</a></li>
                        <li><a href="#">Android App</a></li>
                    </ul>
                </div>
                <div class="col span-1-of-2">
                    <ul class="social-links">
                        <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <p class="p-3 text-white text-center">
                    Copyright &copy; 2020 by FoodBank. All rights reserved.
                </p>
            </div>
	<p class="p-3 bg-dark text-white text-center">@foodbankind</p>
</footer>
<script src="jquery.waypoints.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="//cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
 <script src="//cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.jsdelivr.net/selectivizr/1.0.3b/selectivizr.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="app.js"></script>
</body>
</html>