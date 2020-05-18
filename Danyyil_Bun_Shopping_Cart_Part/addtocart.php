<?php
//connect to database
require "utils/dbConn.inc";
require "utils/cart.php";
require "utils/session_start.inc";
require "utils/head.php";
if (isset($_POST["sel_item_id"])) 
{
   //validate item and get title and price
    $get_iteminfo_sql = "SELECT item_title FROM store_items WHERE id ='".$_POST["sel_item_id"]."'";
    $get_iteminfo_res =  $conn->query($get_iteminfo_sql) or die ("Couldn't connect");


		
		

	if ($get_iteminfo_res->num_rows < 1) {
   	    //invalid id, send away
   	    header("Location: seestore.php");
   	    exit();
    } else {
   	    //get info
   	    while ($item_info = $get_iteminfo_res->fetch_array()) {
   	    	$item_title =  stripslashes($item_info['item_title']);
		}

   	    //add info to cart table
		if(!isset($_POST["sel_item_size"]))
		$sel_item_size = NULL;
		else
		$sel_item_size = $_POST["sel_item_size"];
   	    if(!isset($_POST["sel_item_color"]))
		$sel_item_color = NULL;
		else		
		$sel_item_color = $_POST["sel_item_color"];
	
	//Color name to Color id
	$color_sql = "SELECT item_color_id FROM store_item_color WHERE
	item_id = '".$_POST["sel_item_id"]
	."'AND item_color = '". $sel_item_color ."'";
    $get_color_count_res =  $conn->query($color_sql) or die ("Couldn't connect 17");	
	
	$ici = NULL;
	while ($quant = $get_color_count_res->fetch_array()) {
	$ici = $quant["item_color_id"];}
	echo 'ici  '.$ici."<br>";
	$get_color_count_res->free();
	
	
	
	
	//Size Name to Size Id
	$size_sql = "SELECT item_size_id FROM store_item_size WHERE
	item_id = '".$_POST["sel_item_id"] 
	."' AND item_size ='".$sel_item_size."'";
	$get_size_count_res =  $conn->query($size_sql) or die ("Couldn't connect 18");
	
	$isi = NULL;
	while ($quant2 = $get_size_count_res->fetch_array()) {
	$isi = $quant2["item_size_id"];}
	echo 'isi  '.$isi."<br>";
	$get_size_count_res->free();
	
	
		$cart = array();
		$count = count($cart);
		
		$ammount_of_already_ordered_items = 0;
		if(isset($_COOKIE["cart"]))
		{
			$cart = unserialize($_COOKIE["cart"]);
				if($count > 0)
				{$count = end($cart)->get_id_static() + 1;
				foreach($cart as $key)
				{
					if($key->get_id() == $_POST["sel_item_id"])
					{
						$ammount_of_already_ordered_items += $key->get_qty();
					}
				}
				}
		}

		if($ici == NULL && $isi != NULL)
		{
			$items_total_qty_res_sql = "
			SELECT item_total_qty_rec FROM item_total_qty WHERE item_id = '".$_POST["sel_item_id"]."' AND item_color_id is NULL AND item_size_id =  '".$isi."'";
		}
		else if($isi == NULL && $ici != NULL)
		{
			$items_total_qty_res_sql = "
			SELECT item_total_qty_rec FROM item_total_qty WHERE item_id = '".$_POST["sel_item_id"]."' AND item_color_id = '".$ici."' AND item_size_id is  NULL";	
		}
		else if($ici == NULL && $isi == NULL)
		{
			$items_total_qty_res_sql = "
			SELECT item_total_qty_rec FROM item_total_qty WHERE item_id = '".$_POST["sel_item_id"]."' AND item_color_id is NULL AND item_size_id is  NULL";}
			
		else
		{
		$items_total_qty_res_sql = "
			SELECT item_total_qty_rec 
			FROM item_total_qty 
			WHERE item_id = '".$_POST["sel_item_id"]."'
			 AND item_color_id = '".$ici."'
			 AND item_size_id =  '".$isi."'
				";
		}		
				echo $items_total_qty_res_sql;
				
				
		$items_total_qty_res =  $conn->query($items_total_qty_res_sql) or die("Couldn't connect2");	
		
		$number = 0;
		 while ($quant = $items_total_qty_res->fetch_array()) {
		 $number = $quant["item_total_qty_rec"];}	
		
		
		echo "<br>".$number."<br>";
		
		$sec_num = $ammount_of_already_ordered_items + $_POST["sel_item_qty"];
		
		
		if($number > $sec_num)	
		{
			$order_item = new order_item($_POST["sel_item_id"],$_POST["sel_item_title"],$_POST["sel_item_desc"],
			$_POST["sel_item_price"],$sel_item_size,
			$_POST["sel_item_qty"],  $sel_item_color, 
			date("Y-m-d H:i:s"),$count);
			array_push($cart,$order_item);
			setcookie("cart", serialize($cart), time() + 999);
						
			//Sending request to reduce count of items in the item_total_qty
				
					
				
			//redirect to showcart page
			header("Location: showcart.php");
			exit();
		}
		else
		{
		echo "<a href=\"showitem.php?item_id=".$_POST["sel_item_id"]."&error=not enough items,sorry&sel_item_color=".$sel_item_color."&sel_item_size=".$sel_item_size."&sel_item_qty=".$_POST["sel_item_qty"]. "\">Go Back Please, not enough items</a>";

		}
    
	}
} else {
    //send them somewhere else
    header("Location: seestore.php");
    exit();
}
?>
