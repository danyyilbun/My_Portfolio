<?php
//connect to database
require "utils/head.php";
require "utils/dbConn.inc"; 
require "utils/arrays.php";
?>
<body>
<?php 



//Here should start Regex Logic ofr Master card or American Express depending on one you chose but I hasd no time sorry
//Master Card = ^(?:5[1-5][0-9]{2}|222[1-9]|22[3-9][0-9]|2[3-6][0-9]{2}|27[01][0-9]|2720)[0-9]{12}$
//American Express = ^3[47][0-9]{13}$



$display_block = "<div class=\"col-xl-1 col-lg-1 col-md-1 col-sm-1\"></div><div class=\"col-xl-10 col-lg-10 col-md-10 col-sm-10\"><h1>Your Purchase</h1>";
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
    </tr></thead>";


$get_items_sql = "SELECT id,sel_item_title,
 sel_item_price,sel_item_qty,sel_item_size,sel_item_color FROM store_orders_items ORDER BY id";
	$get_items_res = $conn->query($get_items_sql) or die("Couldn't connect1");
	$total = 0;
	$total_money = 0;
	while ($items = $get_items_res->fetch_array()) {
	$total += $items["sel_item_price"] * $items["sel_item_qty"];
		$id_no = $items["id"];
		$item_title = $items["sel_item_title"];
   	    $item_price = $items["sel_item_price"];
   	    $item_qty = $items["sel_item_qty"];
   	    $item_color = $items["sel_item_color"];
   	    $item_size = $items["sel_item_size"];
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
    $display_block .= "</table><br>
	<br>Click to Restart shopping =><a href=\"seestore.php\"> Order other items!</a></p></div><div class=\col-xl-1 col-lg-1 col-md-1 col-sm-1\"></div>";
	$ship_total = $total + $shipping[$_POST["ship"]];
	$get_items_res->free();






$store_items_sql = "INSERT INTO store_orders
(
order_date,
order_name,
 order_address,
 order_city,
 order_state,
 order_zip,
 order_tel,
 order_email,
 item_total,
 shipping_total)
VALUES (
'now()".		"','"
.$_POST["NAME"]."','"
.$_POST["ADDR"]."','"
.$_POST["city"]."','"
.$_POST["state"]."','"
.$_POST["ZIP"]."','"
.$_POST["TEL"]."','"
.$_POST["EMA"]."','"
.$total."','"
.$ship_total."')";

echo $store_items_sql . "<br>";
$storeitems_res =  $conn->query($store_items_sql) or die("Couldn't connect3");
$storeitems_res->free();






	//Get total qty from item_total_qty
	$item_tot_sql = "SELECT item_total_qty_rec,item_color_id,item_size_id FROM item_total_qty 
	WHERE item_id ='"
	.$id_no.
	"' ORDER BY item_id ";
	$item_tot_res = $conn->query($item_tot_sql) or die("Couldn't connect4");

$item_color_id = NULL;
$item_size_id = NULL;
$total_qty = 0;
	while ($items = $item_tot_res->fetch_array()) 
	{
		$total_qty = $items["item_total_qty_rec"] - $item->get_qty();
		$color_id = $items ["item_color_id"];
		$size_id = $items["item_size_id"];
		if(Color_Search($color_id) == $item_color 
		&& Size_Search($size_id) == $item_size)
		{
			$item_color_id = $color_id;
			$item_size_id = $size_id;
		}

			
	}

	
	
	
	
$items_total_qty_res_sql = "
		UPDATE item_total_qty 
		SET item_total_qty_rec ='".$total_qty."'
		WHERE item_id = '".$items->get_id()."'
		AND item_color_id = '".$item_color_id ."'
		AND item_size_id =  '".$item_size_id."'
		";
		
		$items_total_qty_res =  $conn->query($items_total_qty_res_sql) or die("Couldn't connect5");
		
//Sorry I had no time to add regex for Master or Visa card
echo "Thank you for your putchase , your money transaction has been accepted";
function Color_Search($item_color_id )
{
$relevant_color_sql = "SELECT item_color FROM store_item_color where item_color_id=".$item_color_id ;
$item_res = $conn->query($relevant_color_sql) or die("Couldn't connect7 in Function Color_Search");
return  $item_res["item_color"];
}
function Size_Search($item_size_id )
{
$relevant_size_sql = "SELECT item_size FROM store_item_size where item_size_id=".$item_size_id ;
$item_res = $conn->query($relevant_size_sql) or die("Couldn't connect8 in Function Size_Search");
return  $item_res["item_size"];
}
?><?php echo $display_block; ?>

</body>
</html>