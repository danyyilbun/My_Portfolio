<?php
//connect to database
require "utils/cart.php";
require "utils/session_start.inc";
$cart = array();
echo isset($_GET["id"]) && isset($_COOKIE["cart"]);
if (isset($_GET["id"]) && isset($_COOKIE["cart"])) {
	
	if($_GET["id"] == "All"){setcookie("cart", "", time() -1);}
	else{
	$cart = unserialize($_COOKIE["cart"]);
	$cId=array();
	foreach($cart as $c){
		echo "<br>";
		echo $c->get_id_static();
		
		array_push($cId,$c->get_id_static());}
	
	echo "<br>".$_GET["id"];
	if(in_array( $_GET["id"] , $cId))
	{
	
		foreach($cart as $key => $value)
		{
			if($value->get_id_static() == trim($_GET["id"]))
			{
				unset($cart[$key]);
			}
		}

		if(count(cart) > 0)
	    setcookie("cart", serialize($cart), time() + 999);
		else{ setcookie("cart", serialize($cart), time() -1);}
	}
	}
//redirect to showcart page
header("Location: showcart.php");
exit();
}
//send them somewhere else
header("Location: seestore.php");
exit();


?>
<p>error leaving</p>