<?php
	require 'config.php';

	$grand_total=0;
	$allItems='';
	$items=array();

	$sql="SELECT CONCAT(product_name,'(',qty,')') AS ItemQty,total_price FROM cart ";
	$stmt=$conn->prepare($sql);
	$stmt->execute();
	$result=$stmt->get_result();
	while($row=$result->fetch_assoc()){
		$grand_total += $row['total_price'];
		$items[]=$row['ItemQty'];
	}

	$allItems= implode(",",$items);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="veggies.css">
    <link rel="stylesheet" type="text/css" href="queries.css">

    <script src="https://kit.fontawesome.com/yourcode.js"></script>
    <script src="https://kit.fontawesome.com/a0941870c8.js" crossorigin="anonymous"></script>


    <title>Checkout</title>
</head>
<body background="bg.jpg">

    	<nav class="navbar navbar-expand-md bg-dark navbar-dark">
      <!-- Brand -->
      <img src="logo.jpg" width="120" height="80">

      <!-- Toggler/collapsibe Button -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

  <!-- Navbar links -->
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link " href="index-part.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="checkout.php">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="checkout.php">Checkout</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"> <span id="cart-item" class="badge badge-danger"></span></i></a>
          </li>

        </ul>
      </div>
    </nav>

    <div class="container">
    	<div class="row justify-content-center">
                    <div class="col-lg-6 px-4 pb-4" id="order">
                <h4 class="text-center text-info p-2">Complete your Order!</h4>
                <div class="jumbotron p-3 mb-2 text-center">
                    <h6 class="lead"><b>Product(s): </b><?= $allItems; ?></h6>
                    <h5><b> Total Amount Payable: </b><?= number_format($grand_total,2) ?></h5>

                </div>
                <form action="pay.php" method="post" id="placeOrder">
                    <input type="hidden" name="products" value="<?= $allItems; ?>">
                    <input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                    </div>
                    <div class="form-group">

                        <input type="text" class="form-control"  name="purpose" placeholder="Enter Purpose:">

                     </div>   





                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Enter Email" required>

                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" class="form-control" placeholder="Enter Mobile No." required>
                    </div>
                    
                    
                    <!---<h3 class="text-center lead">Select Payment Mode</h3>
                    <div class="form-group">
                        <select name="pmode" class="form-control">
                            <option value=""selected disabled>-Select Payment Mode-</option>
                            <option value="netBanking">Net Banking</option>
                            <option value="cards">Debit/Credit Card</option>
                            <option value="upi">UPI</option>
                        </select>
                    </div>-->
                    <div class="form-group">
                        <input type="submit" name="submit" value="Place Order" class="btn btn-danger btn-block">
                    </div>


                    
                </form>

        </div>
    </div>
    </div>  

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>      
    		

    

</body>
</html>