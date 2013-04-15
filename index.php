<?php
$output_form=false;
$Name='';$Mobile='';$Email='';$Password='';
$Country='';
$information='';
$subphp=$_SERVER['PHP_SELF'];
if($_POST['Submit'])
{ 
 include 'variab.php';  
 $output_form=true;
 $information="Please check your information once again and do remember your password";
}
?>
<html>
<title>sign up form</title>
<style type="text/css">
BODY { font-family: verdana,arial,helvetica,sans-serif; font-size: 10pt; background-color: #CBD1D5; color: #000; margin: 0; }
TD { font-family: verdana,arial,helvetica,sans-serif; font-size: 10pt; }
TH { font-family: verdana,arial,helvetica,sans-serif; font-weight: bold; font-size: 10pt; }
div{ background-color: #FFF;font-family: verdana,arial,helvetica,sans-serif;width:750pt; font-weight: bold; font-size: 10pt;margin: 0px auto 0px auto;padding: 0px 0px 0px 0px;}
A.confName:link { text-decoration: none; color: #000000; }	
A.confName:visited { text-decoration: none; color: #000000; }
A.confName:hover { color: #666666; }
A:link { text-decoration: none; color: #0000ff; }
A:visited { text-decoration: none; color: #0000ff; }
A:hover { color: #ff0000; }
em { font-style: italic; }
strong { font-weight: bold; }
.signupbox{padding-top:20pt;padding-bottom:50pt;}
.mainheader{}
.toptitle{font-weight: bold;color: #751E1E;font-size: 15pt;text-align:center;float:right;padding-right:100pt;}
</style>
<body>
<div class="mainheader">
<img src="http://mohit.byethost7.com/iit.jpg" style="width:110pt;height:110pt;"/>
<img src="http://mohit.byethost7.com/bhu.jpg" style="width:120pt;height:110pt;float:right;

right:100px;"/>
<p class="toptitle">INDIAN INSTITUTE OF TECHNOLOGY<BR/>VARANASI-221005</p>
 
</div>
<hr/>
<div class="signupbox">
<h2><p style="padding-left:320pt;">IIT BHU</P></h2>
<h2><p style="padding-left:300pt;"><i>LOGIN FORM</i></P></h2>
<h2><p style="padding-left:280pt;"><i>CONTROL ACCESS</i></P></h2>
<label style="padding-left:230; color:blue;size:30;"><?php echo $information;?></label><br/>
<table width="350" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td><form name="form1"  action="
<?php

if(!empty($Name)&&!empty($Email)&&!empty($Password)&&!empty($Country)&&!empty($Mobile))
{
	           
               echo  'signup-ac.php' ;
     }
	 else
	 {
	    
	           echo  $subphp ;
	 }
	
?>" method="POST">

<table width="100%" border="0" cellspacing="4" cellpadding="0">
<tr>
<td colspan="3"><strong>Sign up</strong></td>
</tr>


<?php
if($output_form)
{
   if(empty($Name))
   {
     echo '<br/><i><label id="alerts">***please enter name in the given field.</label></i><br/><br/>'; 	 
   }
   }
?>
<tr>
<td width="76">Name</td>
<td width="3">:</td>
<td width="305"><input name="name" type="text" id="name" size="30" value="<?php echo $Name;?>"></td>
</tr>

<?php
if($output_form)
{
   if(empty($Email))
   {
     echo '<br/><i><label id="alerts">***please enter email in the given field.</label></i><br/><br/>'; 	 
   }
   }
?>
<tr>
<td>E-mail</td>
<td>:</td>
<td><input name="email" type="text" id="email" size="30" value="<?php echo $Email;?>"></td>
</tr>

<?php
if($output_form)
{
   if(empty($Mobile))
   {
     echo '<br/><i><label id="alerts">***please enter mobile in the given field.</label></i><br/><br/>'; 	 
   }
   }
?>
<tr>
<td>Mobile</td>
<td>:</td>
<td><input name="mobile" type="text" id="mobile" size="10" value="<?php echo $Mobile;?>"></td>
</tr>

<?php
if($output_form)
{
   if(empty($Password))
   {
     echo '<br/><i><label id="alerts">***please enter Password in the given field.</label></i><br/><br/>'; 	 
   }
   }
?>
<tr>
<td>password</td>
<td>:</td>
<td><input name="password" type="password" id="password" size="30" value="<?php echo $Password;?>"></td>
</tr>

<?php
if($output_form)
{
   if(empty($Country))
   {
     echo '<br/><i><label id="alerts">***please enter country name in the given field.</label></i><br/><br/>'; 	 
   }
   }
?>
<tr>
<td>Country</td>
<td>:</td>
<td><input name="country" type="text" id="country" size="30" value="<?php echo $Country;?>"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Submit"> &nbsp;
</td>
</tr>
</table>
</form></td>
</tr>
</table>
</div>
</body>
</html>	