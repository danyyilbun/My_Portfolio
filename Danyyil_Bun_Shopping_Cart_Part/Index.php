<!DOCTYPE html>
    <?php require "utils/dbConn.inc"; ?>
<html lang="en">
		<head>
		<meta charset="utf-8">
		<title>  Champlain Shop</title>
				<link rel="stylesheet" type="text/css" href="bootstrap-4.0.0/css/bootstrap.min.css"/>
				
		 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/MyCss.css"/>
		<link rel="icon" href="Pictures/cartLogo.png" type="image/jpg" sizes="16x16">	

		</head>
		<body>
		<!--The navigation area-->
    <nav class="navbar-dark row">
	
	<!--This is the Logo-->
    <div class="navbar">
		<a class="navbar-brand" href="Index.php">
            <img src="Pictures/cartLogo.png" width="30" height="30" class="d-inline-block align-top" alt="logo">
            CartLogo
            </a>
 	
		<ul class = "nav nav-tabs justify-content-end" role="tablist">
		<li class="nav-item">
		<a class="active  nav-link " href = "Index.php">Index</a>
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
		<a class="  nav-link" href = "showcart.php">Your Cart</a>
		</li>
		<li class="nav-item">
		<a class="  nav-link" href = "Interface/Interface.php">Discount</a>
		</li>
		</ul>
		</nav>
		
		
    </div>
	
 </nav>
  <main>

<div class="container">
  <h2> Images of our products</h2>  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
    <?php
	
 
 	$get_items_sql = "SELECT id, item_image FROM store_items ORDER BY item_title";
	$get_items_res = $conn->query($get_items_sql) or die("Couldn't connect");
	$count = 0;
	while ($items = $get_items_res->fetch_array()) {
						echo " <li data-target=\"#myCarousel\" data-slide-to=\"$count\" ";
						
						if($items['id']  == 1){
						echo "class=\"active\"";   }
				
				echo "></li>";
					$count +=1;
					}
	$get_items_res->free();
	
	?>  

    
	</ol>

    <!-- Wrapper for slides -->
  <?php
 
 			   $get_items_sql = "SELECT id, item_image FROM store_items ORDER BY item_title";
			   $get_items_res = $conn->query($get_items_sql) or die("Couldn't connect");
				
			   if ($get_items_res->num_rows < 1) 
					echo  "<p><em>Sorry, no items in this category.</em></p>";
			else{	echo "<div class=\"carousel-inner \">";

					while ($items = $get_items_res->fetch_array()) {
						if($items['id']  == 1){
						echo "<div class=\"item active\">";   }
						else
						{echo "<div class=\"item\">";}
							$item_image  = $items['item_image'];


					   echo "<img style=\"height:150px;\" class = \"img-fluid\" src=\"Images/".$item_image."\" alt=\"".$item_image."\">";
						echo "</div>";
					}

					echo "</div>";
			}

				//free results
				$get_items_res->free();
 
 
  
?>
 


    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>



  
 </main>
 
 
 	   <footer class=" font-small ">
    <div class="container-fluid text-light">
        <div class="row">
            <div class="col-md-6 text-sm-center text-md-left">
            </div>
            <div class="col-md-6 text-right text-sm-center">

            </div>
        </div>
    </div>
    <div class="footer-copyright  text-center text-light">
        <p>© 2018 Copyright</p><a class="footer text-light" href="mailto:champlain.students@champlain.ca" title="Send us Email">Maintained by Danyyil Bun</a>
    </div>
		</footer>
		</body></html>