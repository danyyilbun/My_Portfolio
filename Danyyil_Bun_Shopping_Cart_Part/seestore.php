<?php
//connect to database
require "utils/dbConn.inc";

$display_block = "<h1>My Categories</h1>
<p>Select a category to see its items.</p>";

//show categories first
$get_cats_sql = "SELECT id, cat_title, cat_desc FROM store_categories ORDER BY cat_title";
$get_cats_res =  $conn->query($get_cats_sql) or die("Couldn't connect");
		if ($get_cats_res->num_rows < 1) 
			$display_block = "<p><em>Sorry, no categories to browse.</em></p>";
   while ($cats = $get_cats_res->fetch_array()) {
        $cat_id  = $cats['id'];
        $cat_title = strtoupper(stripslashes($cats['cat_title']));
        $cat_desc = stripslashes($cats['cat_desc']);

        $display_block .= "<p><strong><a href=\"".$_SERVER["PHP_SELF"]."?cat_id=".$cat_id."\">".$cat_title."</a></strong><br/>".$cat_desc."</p>";

        if (isset($_GET["cat_id"])) {
			if ($_GET["cat_id"] == $cat_id) 
			{
			   //get items

			   $get_items_sql = "SELECT id, item_title, item_price FROM store_items WHERE cat_id = '".$cat_id."' ORDER BY item_title";
			   $get_items_res = $conn->query($get_items_sql) or die("Couldn't connect");

			   if ($get_items_res->num_rows < 1) 
					$display_block = "<p><em>Sorry, no items in this category.</em></p>";
					$display_block .= "<ul>";

					while ($items = $get_items_res->fetch_array()) {
					   $item_id  = $items['id'];
					   $item_title = stripslashes($items['item_title']);
					   $item_price = $items['item_price'];

					   $display_block .= "<li><a href=\"showitem.php?item_id=".$item_id."\">".$item_title."</a></strong> (\$".$item_price.")</li>";
					}

					$display_block .= "</ul>";
				

				//free results
				$get_items_res->free();

			}
		}
	}

//free results
$get_cats_res->free();

//close connection to MSSQL
$conn->close();
?>
<html lang="en">
		<head>
		<meta charset="utf-8">
		<title>  My categories</title>
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
		<a class=" nav-link " href = "Index.php">Index</a>
		</li> 
		<li class="nav-item">
		<a class=" nav-link" href = "ContactUs.html">Contact Us</a>
		</li>
		<li class="nav-item">
		<a class="  nav-link" href = "AboutUs.html">About Us</a>
		</li>
		<li>
		<a class="active  nav-link" href = "seestore.php">See Store</a>
		</li>
		<li class="nav-item">
		<a class="  nav-link" href = "showcart.php">Your Cart</a>
		</li>
		<li class="nav-item">
		<a class="  nav-link" href = "Interface/Interface.php">Discount</a>
		</li>

		</ul>
		</nav>
		
		
    </div>
	
 </nav>
 <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1"></div><div class="col-xl-10 col-lg-10 col-md-10 col-sm-10">
<?php echo $display_block; ?>
<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1"></div>
</div>
</body>
</html>
