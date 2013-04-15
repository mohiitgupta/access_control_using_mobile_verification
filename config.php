<?php
//echo 'entered in the config file';
$host=''; // Host name 
$username=''; // Mysql username 
$password=''; // Mysql password 
$db_name=""; // Database name 

//Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect to server"); 

if(mysql_select_db("$db_name"))
{
  //echo 'database already exists';
}
else
{
   //echo 'database need to be created';
   $sql='create database test_iit';
   $result=mysql_query($sql);
}


?>