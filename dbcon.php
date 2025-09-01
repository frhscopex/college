<?php
session_start();
$con=mysqli_connect('localhost','root','','tms');
if($con)
{
	echo "Database is connected Successfully";
}
?>