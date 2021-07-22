<?php 
error_reporting(0);
$sname="localhost";
$suname="root";
$spass="";
$database="task";

///connection variable 
$conn=new PDO("mysql:host=$sname;dbname=$database;",$suname,$spass);


?>