
<?php require"utils/head.php";?>
<body><div class="col-xl-2 col-lg-2 col-md-2 col-sm-2"></div><div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
<h1>To complete purchase</h1>
<form action="confirmeduser.php" method="post">
<br><input type="text" name="NAME" value="<?php if(isset($_POST["NAME"])){echo $_POST["NAME"];}else echo"Name";?>">

<br><br><input type="text" name="ADDR" value="<?php if(isset($_POST["ADDR"])){echo $_POST["ADDR"];}else echo"Address";?>">
<br><br>

<?php 
require "utils/arrays.php";

echo "<select name=\"city\"><option disabled value=\"N/A\">Choose One</option>";
foreach($cities as $state => $value)
{
	echo"<option value=\"$state\"";
	if(isset($_POST["state"])){if($_POST["state"] == $state){echo "selected";}}
	echo">$state</option>";	
}
echo "</select><br><br>";
?>


<?php
echo "<select name=\"state\"><option disabled value=\"N/A\">Choose One</option>";

foreach($cities as $state => $citys)
{
	echo "<optgroup label=\"$state\">";
	foreach($citys as  $city){
		
	echo"<option value=\"$city\"";
	if(isset($_POST["city"])){if($_POST["city"] == $city){echo "selected";}}
	echo">$city</option>";}	
	echo "</optgroup>";
}
echo "</select><br>";

?>

<br>Format Expected : A1A1A1 (We ship only in Canada)
<br><br><input type="text" name="ZIP" value="<?php if(isset($_POST["ZIP"])){echo $_POST["ZIP"];}else echo"zip";?>">
<br><br><input type="text" name="TEL"value="<?php if(isset($_POST["TEL"])){echo $_POST["TEL"];}else echo"telephone number";?>">
<br><br><input type="text" name="EMA" value="<?php if(isset($_POST["EMA"])){echo $_POST["EMA"];}else echo"email";?>">
<?php
echo "<br><br><select  name=\"ship\"><option disabled value=\"N/A\">Choose One</option>";
foreach($shipping as $key => $value)
{
	echo"<option value=\"".$key."\"";
	if(isset($_POST["ship"])){if($_POST["ship"] == $key){echo "selected";}}
	echo">".$key." costs ".$value."$</option>";	
}
echo"</select><br>";
?>
<br><br><input type="Submit">
</form>
</div>
</body>
</html>