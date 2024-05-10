<?php	
$HostName = 'localhost';
$UserName =	'root';
$Password = '';
$dbname = 'spruhahealthcare';
$conn=mysqli_connect($HostName,$UserName,$Password,$dbname);
if(!$conn)
{
	die ("conection failled".mysqli_connect_error());
}
else
{
	//echo("connection sucessfully");
}
?>