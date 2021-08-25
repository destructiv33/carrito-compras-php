<?php
$mysqli=new mysqli ('localhost','root','','zorro');
if($mysqli->connect_error){
	die('error: '.$mysqli->connect_error);
}		
?>

