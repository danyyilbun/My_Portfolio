<?php
	//require "../utils/dbConn.inc"; 
	require "../utils/session_start.inc";
	require "head.php";
?>
<?php
	
	$discount = "";
	
	$option = "";
	
	$id = "";
	
	if(isset($_POST["ID"]))
	$id = $_POST["ID"];
	if(isset($_POST["OPTION"]))
		$option=$_POST["OPTION"];
	if(isset($_POST["DISCOUNT"]))
		$discount=$_POST["DISCOUNT"];


	if($id != "")
	{
		if(Exists($_POST["ID"]))
		{
			if($option != "")
			{
				if($option == "ADD" || $option == "UPDATE")
				{
					if($discount != "" || $discount != 0)
					{
							ADD($id, $discount);
							header("Location:Interface.php");
							exit();
					}
					else
					{
					echo "<p>Discount is empty</p>";
					echo "<a href=\"Interface.php?ID=$id&OPTION=".$option."&DISCOUNT".$discount."\">Go Back</a>";	
					}
				}
				else if($option == "DELETE")
				{
					DELETE_($id);
					header("Location:Interface.php");
					exit();
				}
				else if($option == "DELETE_ALL")
				{
					DELETE_ALL();
					header("Location:Interface.php");
					exit();
				}
				
			}
			else
			{
			echo "<p>Option is empty</p>";
			echo "<a href=\"Interface.php?ID=$id&OPTION=".$option."&DISCOUNT".$discount."\">Go Back</a>";
			
			}
			
		}
		else
		{
			echo "<p>Id is not in the list of items</p>";
			echo "<a href=\"Interface.php?ID=$id&OPTION=".$option."&DISCOUNT".$discount."\">Go Back</a>";
			
		}
	}
	else
	{
		echo "<p>Id Is Null</p>";
		echo "<a href=\"Interface.php?ID=$id&OPTION=".$option."&DISCOUNT".$discount."\">Go Back</a>";
		
	}
function ADD($id, $discount)
{
				$filename = "../textFiles/discount.txt";
			$id_number_array = array();
	try{
		
			//READ DATA FROM THE FILE
			if($testing = @fopen($filename, "r"))
				{
					while(!feof($testing))
					{
						$line = fgets($testing);
						if($line != "" && $line != " " && $line != "\r\n")
						{
							
							$arr = explode( "|",$line);
							if($id != $arr[0]){
							$arry = array($arr[0] => $arr[1] );
							array_push($id_number_array, $arry);}
						}
					}
				}
			fclose($testing);
			$id_number_array[] = array($id => $discount);
			$filename = "../textFiles/discount.txt";
			
			$fhandle = fopen($filename, "w");
			//REWRITE FILE
			foreach($id_number_array as $key2)
			{										
				foreach($key2 as $key => $value)
				{$text_to_write = $key."|".$value."\r\n";
									
					if(fwrite($fhandle, $text_to_write) === false)
					{
						echo "Error, error, no data to the file has been writen";
				}}
			}
			
				fclose($fhandle);
	}
			catch(Exception $e)
			{
				echo "Sorry, ". $e->getMessage() ."<br>";
			}
	
}	
function DELETE_($id)
{
			$filename = "../textFiles/discount.txt";
			$id_number_array = array();
	try{
		
			//READ DATA FROM THE FILE
			if($testing = @fopen($filename, "r"))
				{
					while(!feof($testing))
					{
						$line = fgets($testing);
						if($line != "" && $line != " " && $line != "\r\n")
						{
							$arr = explode( "|",$line);
							if($arr[0] != $id){
							$arry = array($arr[0] => $arr[1] );
							array_push($id_number_array, $arry);
							}
						}
					}
				}
			fclose($testing);
			$filename = "../textFiles/discount.txt";
			$fhandle = fopen($filename, "w");
			//REWRITE FILE
			foreach($id_number_array as $key2)
			{										
				foreach($key2 as $key => $value)
				{$text_to_write = $key."|".$value."\r\n";
									
					if(fwrite($fhandle, $text_to_write) === false)
					{
						echo "Error, error, no data to the file has been writen";
				}}
			}
			
							fclose($fhandle);			}

			catch(Exception $e)
			{
				echo "Sorry, ". $e->getMessage() ."<br>";
			}
	
	
}	
function DELETE_ALL()
{
		$filename = "../textFiles/discount.txt";
			
			$fhandle = fopen($filename, "w");
					$text_to_write = "";
									
					if(fwrite($fhandle, $text_to_write) === false)
					{
						echo "Error, error, no data to the file has been writen";
					}
				fclose($fhandle);
	
}
function Exists($id)
{
	$conn = new mysqli("localhost","root","","shop");
	$get_items_sql = "SELECT id FROM store_items";
	$get_items_res = $conn->query($get_items_sql) or die("Couldn't connect");
if ($get_items_res->num_rows < 1) 
	echo "<p><em>Sorry, no items in this category.</em></p>";
	$item_ids = array();
while ($items = $get_items_res->fetch_array()) 
	{
		$item_ids[]  = $items['id'];
	}
	return in_array($id, $item_ids);
}
?>
</body>
</html>