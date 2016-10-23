<?php
$q = $_REQUEST['q'];//retrieving string being typed in textbox
if($q!="")
{
	$con = mysql_connect("localhost","root","");
	if(!$con)
	{
		die("Error has occured");
	}
	mysql_select_db("state_city");

	$query="SELECT city_name from cities WHERE city_name LIKE '%$q%' LIMIT 0,6";//selecting names of cities
	
	$result = mysql_query($query,$con);
	echo mysql_num_rows($result). '<br>';
	if(!$result)
	{
		die("Could not fetch the data");
	}
	echo "<div style='margin-left:76px;width:148px;border:1px solid black;'>";
	while($row = mysql_fetch_array($result))
	{   
		echo "<div style=height:18px;padding:3px; border-bottom:1px solid black;>".$row['city_name']."</div>";//displaying each city's name
	}
	echo "</div>";
	
}
?>

