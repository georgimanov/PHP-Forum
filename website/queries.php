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
 function countPosts($value)
{
	$sql = "SELECT * FROM posts WHERE topic_id=$value";
	$res = mysql_query($sql) or die(mysql_error());
	$count = 0;
	while ($row = mysql_fetch_assoc($res)) {
		$count++;
	}	
	return $count-1;
}
 ?>