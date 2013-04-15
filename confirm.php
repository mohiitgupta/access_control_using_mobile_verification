<?php
$enter=$_GET['code'];
echo $enter;
$code='';
$output_form=false;
$subphp=$_SERVER['PHP_SELF'];
/*if($_POST['Submit'])
{ 
$code=$_POST['code'];
 $_POST['Submit']='';
}*/
?>
<html>
<title>confirmation code</title>
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

<p class="toptitle">IIT<BR/>VARANASI-221005</p>
 
</div>
<hr/>
<div class="signupbox">
<label style="padding-left:230; color:red;size:30;"><?php echo $information;?></label><br/>
<table width="350" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td><form name="form2"  method="post" action="
<?php

if(!empty($code))
{
if($enter==$_POST['code'])
{
echo "Successful";
}
else
{
echo "Code Incorrect";
}
	           
               
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
     echo '<br/><i><label id="alerts">***please enter code in the given field.</label></i><br/><br/>'; 	 
   }
   }
?>
<tr>
<td width="76">Code</td>
<td width="3">:</td>
<td width="305"><input name="code" type="text" id="code" size="30" value="<?php echo $code;?>"></td>
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