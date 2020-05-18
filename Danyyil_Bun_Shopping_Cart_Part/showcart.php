<?php
//connect to database
require "utils/dbConn.inc"; 
require "utils/cart.php";
require "utils/session_start.inc";
require "utils/arrays.php";
$display_block = "<div class=\"col-xl-1 col-lg-1 col-md-1 col-sm-1\"></div><div class=\"col-xl-10 col-lg-10 col-md-10 col-sm-10\"><h1>Your Shopping Cart</h1>";

//check for cart items based on user session id
$cart = array();
if(isset($_COOKIE["cart"]))
	$cart = unserialize($_COOKIE["cart"]);

 
if ($cart == null) {
    //print message
    $display_block .= "<p>You have no items in your cart.
    Please <a href=\"seestore.php\">continue to shop</a>!</p>";
} else {
    //get info and build cart display celpadding=\"3\" cellspacing=\"2\"  width=\"98%\"
    $display_block .= "
    <table  >
    <thead><tr class=\"row\">
    <th class=\"col-xl-2 col-lg-2 col-md-2 col-sm-2 d-flex justify-content-center\">Title</th>
    <th class=\"col-xl-2 col-lg-2 col-md-2 col-sm-2 d-flex justify-content-center\">Price</th>
    <th class=\"col-xl-2 col-lg-2 col-md-2 col-sm-2 d-flex justify-content-center\">Total Price</th>
    <th class=\"col-xl-1  col-lg-1  col-md-1 col-sm-1 d-flex justify-content-center\">Quan
	tity</th>
    <th class=\"col-xl-2 col-lg-2 col-md-2 col-sm-2 d-flex justify-content-center\">Size</th>
    <th class=\"col-xl-1 col-lg-1 col-md-1 col-sm-1 d-flex justify-content-center\">Colour</th>
    <th class=\"col-xl-2 col-lg-2 col-md-2 col-sm-2 d-flex justify-content-center\">Action</th>
    </tr></thead>";
	$total_money = 0;
    foreach($cart as $value) {
   	    $id_no = $value->get_id();
   	    $item_title = stripslashes($value->get_title());
   	    $item_price = $value->get_price();
   	    $item_qty = $value->get_qty();
   	    $item_color = $value->get_color();
   	    $item_size = $value->get_size();
	    $total_price = sprintf("%.02f", $item_price * $item_qty);
		$total_money += $total_price;
		
		$display_block .= "<tbody>
   	    <tr class=\"row\">
   	    <td class=\"col-xl-2 col-lg-2 col-md-2 col-sm-2 d-flex justify-content-center\">$item_title <br></td>
   	    <td class=\"col-xl-2 col-lg-2 col-md-2 col-sm-2 d-flex justify-content-center\">\$".number_format($item_price,2,',',".")." <br></td>
   	    <td class=\"col-xl-2 col-lg-2 col-md-2 col-sm-2 d-flex justify-content-center\">\$".number_format($total_price,2,',',".")." <br></td>
   	    <td class=\"col-xl-1 col-lg-1 col-md-1 col-sm-1 d-flex justify-content-center\"> $item_qty <br></td>
   	    <td class=\"col-xl-2 col-lg-2 col-md-2 col-sm-2 d-flex justify-content-center\">$item_size <br></td>
   	    <td class=\"col-xl-1 col-lg-1 col-md-1 col-sm-1 d-flex justify-content-center\"> $item_color</td>
   	    <td class=\"col-xl-2 col-lg-2 col-md-2 col-sm-2 d-flex justify-content-center\"><a href=\"removefromcart.php?id=".$value->get_id_static()."\">remove</a></td>
   	    </tr>";
   	    
    }
	$CanadaP = $shipping["CanadaPost"];
	$tax = $total_money / 100 * 15; 
		$display_block .= "
				<tr class=\"row\">
				<td class=\"col-xl-10 col-lg-10 col-md-10 col-sm-10 d-flex flex-row-reverse\" >Total pre-tax cost :<br></td>
				<td class=\"col-xl-2 col-lg-2 col-md-2 col-sm-2 d-flex justify-content-center\"  >\$".number_format($total_money,2,',',".")."<br></td>
				</tr>
				<tr class=\"row\">
				<td class=\"col-xl-10 col-lg-10 col-md-10 col-sm-10 d-flex flex-row-reverse\"  >Total tax(0.15%):<br></td>
				<td class=\"col-xl-2 col-lg-2 col-md-2 col-sm-2 d-flex justify-content-center \"  >\$".number_format($tax,2,',',".") ."<br></td>
				</tr>";
				
		$total_money += $tax + $CanadaP;
		$display_block .= "
				<tr class=\"row\">
				<td class=\"col-xl-10 col-lg-10 col-md-10 col-sm-10 d-flex flex-row-reverse\"  >Canada Post Cost</td>
				<td class=\"col-xl-2 col-lg-2 col-md-2 col-sm-2 d-flex justify-content-center\"  >\$".number_format($CanadaP,2,',',".")."</td>
				</tr>
				<tr class=\"row\">
				<td class=\"col-xl-10 col-lg-10 col-md-10 col-sm-10 d-flex flex-row-reverse\"  >Total Cost Plus Shipment</td>
				<td class=\"col-xl-2 col-lg-2 col-md-2 col-sm-2 d-flex justify-content-center\"  >\$".number_format($total_money,2,',',".")."</td>
				</tr></tbody>";
    $display_block .= "</table><br>You want to restart from scratch? Click That = ><a href=\"removefromcart.php?id=All\">Remove All</a>
	<br>Click to continue shopping =><a href=\"seestore.php\"> Order other items!</a></p>
	Click to finish shopping =><a href=\"confirmedpurchase.php\"> Complete Purhcase!</a></p></div><div class=\col-xl-1 col-lg-1 col-md-1 col-sm-1\"></div>";
	
}
?>
<html lang="en">
		<head>
		<meta charset="utf-8">
		<title>  My Store</title>
				<link rel="stylesheet" type="text/css" href="bootstrap-4.0.0/css/bootstrap.min.css"/>
				
		<link rel="icon" href="Pictures/cartLogo.png" type="image/jpg" sizes="16x16">
		 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>	
<link rel="stylesheet" type="text/css" href="css/MyCss.css"/>  
		<link rel="icon" href="Pictures/cartLogo.png" type="image/jpg" sizes="16x16">

		</head>
<body>
    <nav class="navbar-dark row">
	
	<!--This is the Logo-->
    <div class="navbar-right">
		<a class="navbar-brand" href="Index.php">
            <img src="Pictures/cartLogo.png" width="30" height="30" class="d-inline-block align-top" alt="logo">
            CartLogo
            </a>
 	
		<ul class = "nav nav-tabs justify-content-end" role="tablist">
		<li class="nav-item">
		<a class="nav-link " href = "Index.php">Index</a>
		</li> 
		<li class="nav-item">
		<a class=" nav-link" href = "ContactUs.html">Contact Us</a>
		</li>
		<li class="nav-item">
		<a class="nav-link" href = "AboutUs.html">About Us</a>
		</li>
		<li>
		<a class="nav-link" href = "seestore.php">See Store</a>
		</li>
		<li class="nav-item">
		<a class="active nav-link" href = "showcart.php">Your Cart</a>
		</li>
		<li class="nav-item">
		<a class="  nav-link" href = "Interface/Interface.php">Discount</a>
		</li>

		</ul>
		</nav>
		
		
    </div>
	
 </nav>
<?php echo $display_block; ?>
</body>
</html>
