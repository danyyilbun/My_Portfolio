<?php require"utils/head.php"; require"utils/dbConn.inc";?>
<body>
<?php




	if(isset($_POST["NAME"]) && isset($_POST["ADDR"]) 
		 && isset($_POST["ZIP"])
		&& isset($_POST["TEL"]) && isset($_POST["EMA"])
		)
	{
		if($_POST["NAME"] != "Name" && $_POST["ADDR"] !="Address" && $_POST["city"] != "N/A"
		&& $_POST["state"] != "N/A" && $_POST["ZIP"] != "zip"
		&& $_POST["TEL"] != "telephone number" 
		&& $_POST["EMA"] != "email" && $_POST["ship"] != "City")
		{
			//verification for zip
			$regex_zip = "/[A-Za-z][0-9][A-Za-z][0-9][A-Za-z][0-9]/";
			//verification for email
			//$regex_ema = "/					  //^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/";

			///$regex_tel = "/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$/";
			if(preg_match($regex_zip,$_POST["ZIP"]))
			{
				
				//if(preg_match($regex_ema,$_POST["EMA"]))
				//{
					//if(preg_match($regex_tel,$_POST["TEL"]))
					//{
						if(!isset($_POST["state"]))
							{$state = " ";}
						else
							{$state = $_POST["state"];}
						if(!isset($_POST["city"]))
							{$city = " " ;}
						else{$city = $_POST["city"];}
						$text = "Let's continue the purchase";
						$display="<br><form action=\"completedpurchase.php\" method=\"post\">
							<input type=\"hidden\" value=\"".$_POST["NAME"]."\" NAME=\"NAME\">
	<input type=\"hidden\" value=\"".$_POST["ADDR"]."\" NAME=\"ADDR\">
	<input type=\"hidden\" value=\"".$city."\" NAME=\"city\">
	<input type=\"hidden\" value=\"".$state."\" NAME=\"state\">
	<input type=\"hidden\" value=\"".$_POST["ZIP"]."\" NAME=\"ZIP\">
	<input type=\"hidden\" value=\"".$_POST["TEL"]."\" NAME=\"TEL\">
	<input type=\"hidden\" value=\"".$_POST["EMA"]."\" NAME=\"EMA\">
	<input type=\"hidden\" value=\"".$_POST["ship"]."\" NAME=\"ship\">
	
	<br><input type=\number\" value=\"Enter your credit card\">
	<br><br><select name=\"TypeC\">
	<option value=\"MC\">Master Card</option>
	<option value=\"AE\">American Express</option>
	</select>
	<br><br><input type=\"submit\" value=\"".$text."\"name=\"submit\">
						</form>";
	
						echo $display;
						
						
					
					/*else
					{
						echo Form($_POST["NAME"],$_POST["ADDR"],$_POST["city"],$_POST["state"],$_POST["ZIP"],$_POST["TEL"],$_POST["EMA"],$_POST["ship"],"Go Back and Fix Telephone");
						echo "&nbsp
						<button><a style=\"color:black;\" href=\"seestore.php\">Go back to store</a></button>";	
					}
				
				else
				{
					echo Form($_POST["NAME"],$_POST["ADDR"],$_POST["city"],$_POST["state"],$_POST["ZIP"],$_POST["TEL"],$_POST["EMA"],$_POST["ship"],"Go Back And Fix Email");
					echo "&nbsp
					<button><a style=\"color:black;\" href=\"seestore.php\">Go back to store</a></button>";	
					
				}*/
			
			
			}
			else
			{
				echo Form($_POST["NAME"],$_POST["ADDR"],$_POST["city"],$_POST["state"],$_POST["ZIP"],$_POST["TEL"],$_POST["EMA"],$_POST["ship"],"Go Back And Fix ZIP ");
				echo "&nbsp
				<button><a style=\"color:black;\" href=\"seestore.php\">Go back to store</a></button>";	
				
			}
		}
		else{
			echo"Seems like you have left some data empty, please retry or go back to shop , if you wish so";
	echo Form($_POST["NAME"],$_POST["ADDR"],$_POST["city"],$_POST["state"],$_POST["ZIP"],$_POST["TEL"],$_POST["EMA"],$_POST["ship"],"Go Back And Add non Generic Values");
	echo "&nbsp
	<button><a style=\"color:black;\" href=\"seestore.php\">Go back to store</a></button>";	
			
		}

	}
	else
	{
		echo"Seems like you have left some data empty, please retry or go back to shop , if you wish so";
			if(!isset($_POST["state"]))
	{$state = " ";}
else{$state = $_POST["state"];}
if(!isset($_POST["city"]))
{$city = " " ;}
else{$city = $_POST["city"];}
echo Form($_POST["NAME"],$_POST["ADDR"],$city,$state,$_POST["ZIP"],$_POST["TEL"],$_POST["EMA"],$_POST["ship"],"Go Back And Fix Request");
	echo "&nbsp
	<button><a style=\"color:black;\" href=\"seestore.php\">Go back to store</a></button>";	
	}


function Form($NAME,$addr,$city,$state,$zip,$tel,$ema,$ship,$text)
{
	echo "<h1>Error during processing</h1><br>";
	$display="";
	$display.="<br><form action=\"completepurchase.php\" method=\"post\">
	<input type=\"hidden\" value=\"".$NAME."\" name=\"NAME\">
	<input type=\"hidden\" value=\"".$addr."\" name=\"ADDR\">
	<input type=\"hidden\" value=\"".$city."\" name=\"city\">
	<input type=\"hidden\" value=\"".$state."\" name=\"state\">
	<input type=\"hidden\" value=\"".$zip."\" name=\"ZIP\">
	<input type=\"hidden\" value=\"".$tel."\" name=\"TEL\">
	<input type=\"hidden\" value=\"".$ema."\" name=\"EMA\">
	<input type=\"hidden\" value=\"".$ship."\" name=\"ship\">
	<input type=\"submit\" value=\"".$text."\"name=\"submit\">
	</from>";
	return $display;
}
?>

</body>
</html>