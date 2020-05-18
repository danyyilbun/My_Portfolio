<?php
require "utils/dbConn.inc";
require "utils/session_start.inc";
$display_block = "<h1>My Store - Item Detail</h1>";

//validate item
$get_item_sql = "SELECT c.id as cat_id, c.cat_title, si.item_title, si.item_price, si.item_desc, si.item_image FROM store_items AS si LEFT JOIN store_categories AS c on c.id = si.cat_id WHERE si.id = '".$_GET["item_id"]."'";
$get_item_res =  $conn->query($get_item_sql) or die("Couldn't connect");

	   $cat_id;
	   $cat_title;
	   $item_title;
	   $item_price;
	   $item_desc;
	   $item_image;
if ($get_item_res->num_rows < 1) 
   //invalid item
   $display_block .= "<p><em>Invalid item selection.</em></p>";
   //valid item, get info
   while ($item_info = $get_item_res->fetch_array()) {
	   $cat_id = $item_info['cat_id'];
	   $cat_title = strtoupper(stripslashes($item_info['cat_title']));
	   $item_title = stripslashes($item_info['item_title']);
	   $item_price = $item_info['item_price'];
	   $item_desc = stripslashes($item_info['item_desc']);
	   $item_image = $item_info['item_image'];
	}

   //make breadcrumb trail
   $display_block .= "<p><strong><em>You are viewing:</em><br/>
   <a href=\"seestore.php?cat_id=".$cat_id."\">".$cat_title."</a> &gt; ".$item_title."</strong></p>
   <table cellpadding=\"3\" cellspacing=\"3\">
   <tr>
   <td valign=\"middle\" align=\"center\"><img <img style=\"height:300px;\" class = \"img-fluid\" src=\"Images/".$item_image."\"></td>
   <td valign=\"middle\"><p><strong>Description:</strong><br/>".$item_desc."</p>
   <p><strong>Price:</strong> \$".$item_price."</p>
   <form method=\"post\" action=\"addtocart.php\">";

   //free result
   $get_item_res->free() ;

   //get colors
   $get_colors_sql = "SELECT item_color FROM store_item_color WHERE item_id = '".$_GET["item_id"]."' ORDER BY item_color";
   $get_colors_res =  $conn->query($get_colors_sql) or die("Couldn't connect");

   if ($get_colors_res->num_rows > 0) {
        $display_block .= "<p><strong>Available Colors:</strong><br/>
        <select name=\"sel_item_color\">";

        while ($colors = $get_colors_res->fetch_array() ) {
           $item_color = $colors['item_color'];
           $display_block .= "<option value=\"".$item_color."\"";
		   if(isset($_GET["sel_item_color"]))
		  {
			  if(trim($_GET["sel_item_color"]) == $item_color)
			  $display_block .= "selected";
		  } 
		  $display_block .= ">".$item_color."</option>";
       }
       $display_block .= "</select>";
   }

   //free result
   $get_colors_res->free() ;

   //get sizes
   $get_sizes_sql = "SELECT item_size FROM store_item_size WHERE item_id = ".$_GET["item_id"]." ORDER BY item_size";
   $get_sizes_res =  $conn->query($get_sizes_sql) or die("Couldn't connect");

   if ($get_sizes_res->num_rows  > 0) {
       $display_block .= "<p><strong>Available Sizes:</strong><br/>
       <select name=\"sel_item_size\">";

       while ($sizes = $get_sizes_res->fetch_array()) {
          $item_size = $sizes['item_size'];
          $display_block .= "<option value=\"".$item_size."\"";
		  if(isset($_GET["sel_item_size"]))
		  {
			  if(trim($_GET["sel_item_size"]) == $item_size)
			  $display_block .= "selected";
		  } 
		  $display_block .= ">".$item_size."</option>";
       }
   }

   $display_block .= "</select>";

   //free result
   $get_sizes_res->free();

   $display_block .= "
   <p><strong>Select Quantity:</strong>
   <select name=\"sel_item_qty\">";

   for($i=1; $i<11; $i++) {
       $display_block .= "<option value=\"".$i."\"";
	   if(isset($_GET["sel_item_size"]))
		  {
			  if(trim($_GET["sel_item_qty"]) == $i)
			  $display_block .= "selected";
		  } 
		  $display_block .= ">".$i."</option>";
   }

   $display_block .= "
   </select>
   <input type=\"hidden\" name=\"sel_item_id\" value=\"".$_GET["item_id"]."\"/>
   <input type=\"hidden\" name=\"sel_item_title\" value=\"".$item_title."\"/>
   <input type=\"hidden\" name=\"sel_item_desc\" value=\"".$item_desc."\"/>
   <input type=\"hidden\" name=\"sel_item_price\" value=\"".$item_price."\"/>
   <p><input type=\"submit\" name=\"submit\" value=\"Add to Cart\"/></p>
   </form>
   </td>
   </tr>
   </table>";
if(isset($_GET["error"])){ $display_block .= $_GET["error"];}
//close connection to MSSQL
$conn->close() ;
?>
<html lang="en">
		<head>
		<meta charset="utf-8">
		<title>  My Store</title>
				<link rel="stylesheet" type="text/css" href="bootstrap-4.0.0/css/bootstrap.min.css"/>
				<link rel="stylesheet" type="text/css" href="css/MyCss"/>
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
		<a class=" nav-link" href = "seestore.php">See Store</a>
		</li>
		<li class="nav-item">
		<a class="nav-link" href = "showcart.php">Your Cart</a>
		</li>
		<li class="nav-item">
		<a class="nav-link" href = "Interface/Interface.php">Discount</a>
		</li>
		</ul>
		</nav>
		
		
    </div>
	
 </nav>
 <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1"></div><div class="col-xl-10 col-lg-10 col-md-10 col-sm-10">
<?php echo $display_block; ?>
<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1"></div>
</body>
</html>