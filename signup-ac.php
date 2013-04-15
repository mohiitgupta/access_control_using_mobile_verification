<?php

include('config.php');
// table name 
$tbl_name="temp_members_db";
mysql_select_db("$db_name");
mysql_query("CREATE TABLE temp_members_db(
   confirm_code varchar(50),
   mobile varchar(10),  
   name varchar(50),
   email varchar(50),
   password varchar(100),
   country varchar(100))");
// Random confirmation code 
$confirm_code=md5(uniqid(rand())); 

// values sent from form 
$name=$_POST['name'];
$email=$_POST['email'];
$country=$_POST['country'];
$mobile=$_POST['mobile'];
$password=$_POST['password'];
// Insert data into database 
$sql="INSERT INTO $tbl_name(confirm_code, mobile,name, email, password, country)VALUES('$confirm_code', '$mobile','$name', '$email', '$password', '$country')";
$result=mysql_query($sql);
echo $result;
// if suceesfully inserted data into database, send confirmation link to email 
if($result){
// ---------------- SEND MAIL FORM ----------------

// send e-mail to ...
$to=$email;

// Your subject
$subject="Your confirmation link here";

// From
$header="from: response@iitbhu.net";

// Your message
$message="Your Comfirmation link \r\n";
$message.="Click on this link to activate your account and proceed further \r\n";
$message.="http://mohit.byethost7.com/sms.php?131346546464mob=91316465464974987984613&phone=".$mobile."";

// send email
$sentmail = mail($to,$subject,$message,$header);
}

// if not found 
else {
echo "Not found your email in our database";
}

// if your email succesfully sent
if($sentmail){
global $mobile;
echo "Your Confirmation link Has Been Sent To Your Email Address.";
echo '<br/>click on the link to proceed for the registration if link is not available please copy link and paste it to the browsers';
//echo "<a href='../sms.php?phone=".$mobile."'>registration form</a>";
}
else {
echo "Cannot send Confirmation link to your e-mail address";
}
?>