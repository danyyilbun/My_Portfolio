<!DOCTYPE html>
    <?php require "../utils/dbConn.inc"; ?>
	<html lang="en">
		<head>
		<meta charset="utf-8">
		<title>  Champlain Shop</title>
				<link rel="stylesheet" type="text/css" href="bootstrap-4.0.0/css/bootstrap.min.css"/>
				
		 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/MyCss.css"/>
		<link rel="icon" href="../Pictures/cartLogo.png" type="../image/jpg" sizes="16x16">	

		</head>

 
 
<style>
i{color:red}
</style>
</head>
		<body>
		<!--The navigation area-->
   <nav class="navbar-dark row">
	
	<!--This is the Logo-->
    <div class="navbar">
		<a class="navbar-brand" href="../Index.php">
            <img src="../Pictures/cartLogo.png" width="30" height="30" class="d-inline-block align-top" alt="logo">
            CartLogo
            </a>
 	
		<ul class = "nav nav-tabs justify-content-end" role="tablist">
		<li class="nav-item">
		<a class="  nav-link " href = "../Index.php">Index</a>
		</li> 
		<li class="nav-item">
		<a class=" nav-link" href = "../ContactUs.html">Contact Us</a>
		</li>
		<li class="nav-item">
		<a class="  nav-link" href = "../AboutUs.html">About Us</a>
		</li>
		<li>
		<a class=" nav-link" href = "../seestore.php">See Store</a>
		</li>
		<li class="nav-item">
		<a class="  nav-link" href = "../showcart.php">Your Cart</a>
		</li>
		<li class="nav-item">
		<a class="active nav-link" href = "Interface.php">Discount</a>
		</li>
		</ul>
		</nav>
		
		
    </div>
	
 </nav>
<div class="container"> 
<div class= "col-xl-3 col-lg-3 col-md-3 col-sm-3 "></div><div class= "col-xl-8 col-lg-8 col-md-8 col-sm-8 ">
<h1>What do you want to do?</h1>
<br>
<p></p>
<form action="Verific.php" method="post">
<label name="ID" for="ID">
 
<input type="number" name="ID" min="0"  id="ID" required value="<?php if(isset($_GET["ID"])){echo $_GET["ID"];}?>">
Type ID</label><br>
<label name="OPTION" for="ADD"><br><br>
 <input type="radio" name="OPTION" id="ADD" value="ADD" <?php
		if(isset($_GET["OPTION"])){if($_GET["OPTION"] == "ADD"){echo "checked";}}?>>Add/Update Record
</label><br><br>

<label name="OPTION" for="DELETE">
 <input type="radio" name="OPTION" id="DELETE" value="DELETE" <?php
		if(isset($_POST["OPTION"])){if($_GET["OPTION"] == "DELETE"){echo "checked";}}?>>Delete Record
</label>

<br><br>

<label name="OPTION" for="DELETE_ALL">
 <input type="radio" name="OPTION" id="DELETE_ALL" value="DELETE" <?php
		if(isset($_POST["OPTION"])){if($_GET["OPTION"] == "DELETE_ALL"){echo "checked";}}?>><i>Delete All The Discounts</i>
</label>


<br><br>
<label name="DISCOUNT" for="DISCOUNT">
<input type="number" name="DISCOUNT" id="DISCOUNT" min="1" max="100"  value="<?php if(isset($_GET["DISCOUNT"])){echo $_GET["DISCOUNT"];}?>">    Discount Ammount
</label><br><br>
 <input type="Submit" value="Send Data">
 
 <input type="reset">
</form><br><br>

</div><div class="col-xl-1 col-lg-1 col-md-1 col-sm-1"></div>
</body>
</html>


<!--
if(isset($_GET["error"])){echo "Error :"."<i>".$_GET["error"]."</i>";}else{echo "Welcome To The Party";}
-->