<?php 
 function countTopics($value){
	$sql = "SELECT * FROM topics ".$value;
	$res = mysql_query($sql);
	$count = 0;
	while ($row = mysql_fetch_assoc($res)) {
		$count++;
	}	
	return $count;
}
{
	
}
 ?>