<?php


require "utils/dbConn.inc";

$itm_sql = "SELECT * FROM item_total_qty";
$itm_res =  $conn->query($itm_sql) or die ("Couldn't connect");

while($item=$itm_res->fetch_array())
{
	echo "<br>";
	foreach($item as $key => $value)
	{
		$value2 = $value;
		if($value == NULL){ $value2 = 'NU';}
		echo $key . " => $value2 , ";
	}
	echo ":::;";
}

?>