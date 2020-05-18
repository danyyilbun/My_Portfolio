<?php
require "utils/dbConn.inc";
require "utils/cart.php";
if(isset($_COOKIE["cart"]))
{
	$cart = unserialize($_COOKIE["cart"]);
	
	$count = 0;
	if(isset($_COOKIE["cart"]))
		{
			$cart = unserialize($_COOKIE["cart"]);
			$count = end($cart)->get_id_static() + 1;
		}	
		
	//Cart
	foreach($cart as $item)
	{
		
	
	

	//If verifie whethear some data is empty
	$sel_item_size = " ";
		if($item->get_size() != " ")
		$sel_item_size = $item->get_size();

	$sel_item_color = " ";
		if($item->get_color() != " ")
		$sel_item_color = $item->get_color();
	
	//Sending to the store_orders_items to store it
	
	$storeitems_sql = "
		INSERT INTO store_orders_items
		(order_id,sel_item_title, sel_item_id, sel_item_qty, sel_item_size, sel_item_color, sel_item_price) 
		VALUES ('".$count."','".$item->get_title()."','".$item->get_id()."','".$item->get_qty()."','".$sel_item_size."','".$sel_item_color."','".$item->get_price()."')";
	
	echo $storeitems_sql;
	
	$storeitems_res =  $conn->query($storeitems_sql) or die("Couldn't connect 1 ");
		

		
	}
	setcookie("cart", serialize($cart), time() -1);
	
	$conn->close();
	header("Location: completepurchase.php");
	exit();
}	
header("Location: seestore.php");
exit();

?>