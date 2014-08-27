<?php 
 function countTopics($value){
	$sql = "SELECT * FROM topics".$value;
	$res = mysql_query($sql);
	return "$res";	
}
{
	
}
 ?>