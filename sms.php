<?php 

/**
 * sendFullonSMS
 * Function to send to sms to single/multiple people via FullonSMS
 **/


$uid="";
$pwd="";
$phone=$_GET['phone'];
//echo $phone;
$msg="Your confirmation code is given below: "; 
    $no='';
    for ($i = 0; $i < 4; $i++){
        $no .= rand(0,9);
    } 
$msg .=$no;
  $curl = curl_init();
  $timeout = 30;
  $result = array();
  $headers = array();

  $headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8';
  $headers[] = 'Connection: Keep-Alive';
  $headers[] = 'Content-type: application/x-www-form-urlencoded;charset=UTF-8';
  $headers[] = 'Accept-Language: en-us,en;q=0.5';
  $headers[] = 'Accept-Encoding gzip,deflate';
  $headers[] = 'Keep-Alive: 300';
  $headers[] = 'Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7';

  curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
  //curl_setopt($curl, CURLOPT_HEADER, 1);

  curl_setopt($curl, CURLOPT_URL, "http://sms.fullonsms.com/login.php");
  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl, CURLOPT_POSTFIELDS, "MobileNoLogin=".$uid."&LoginPassword=".$pwd."&x=64&y=5&red=");
  //curl_setopt($curl , CURLOPT_PROXY , '10.3.100.211:8080' );
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);     
  curl_setopt($curl, CURLOPT_COOKIESESSION, 1);
  curl_setopt($curl, CURLOPT_COOKIEFILE, "cookie_fullonsms");
  curl_setopt($curl, CURLOPT_COOKIEJAR,  "cookie_fullonsms");
  curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($curl, CURLOPT_MAXREDIRS, 20);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_USERAGENT, "iPhone 4.0");
  curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);
  curl_setopt($curl, CURLOPT_REFERER, "http://sms.fullonsms.com/login.php");
  $text = curl_exec($curl);


  // Check if any error occured
  if (curl_errno($curl))
    return "access error : ". curl_error($curl);

   
  // Check for proper login
    if(!stristr($text,"http://sms.fullonsms.com/landing_page.php")  && !stristr($text,"http://sms.fullonsms.com/home.php?show=contacts") &&!stristr($text, "http://sms.fullonsms.com/action_main.php") )
  {
    return "invalid login";          
  }

  if (trim($msg) == "" || strlen($msg) == 0)
    return "invalid message";
  $msg = urlencode(substr($msg, 0, 160));
  $pharr = explode(",", $phone);
  $refurl = curl_getinfo($curl, CURLINFO_EFFECTIVE_URL);
  curl_setopt($curl, CURLOPT_REFERER, $refurl);
  curl_setopt($curl, CURLOPT_URL, "http://sms.fullonsms.com/home.php");
  $text = curl_exec($curl);

  foreach ($pharr as $p)
  {
    if (strlen($p) != 10 || !is_numeric($p) || strpos($p, ".") != false)
    {
      $result[] = array('phone' => $p, 'msg' => urldecode($msg), 'result' => "invalid number");
      continue;
    }
    $p = urlencode($p);

    // Send SMS
    curl_setopt($curl, CURLOPT_URL, 'http://sms.fullonsms.com/home.php');
    curl_setopt($curl, CURLOPT_REFERER, "http://sms.fullonsms.com/home.php?show=contacts");
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS,
      "ActionScript=%2Fhome.php&CancelScript=%2Fhome.php&HtmlTemplate=%2Fvar%2Fwww%2Fhtml%2Ffullonsms%2FStaticSpamWarning.html&MessageLength=140&MobileNos=$p&Message=$msg&Gender=0&FriendName=Your+Friend+Name&ETemplatesId=&TabValue=contacts");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $contents = curl_exec($curl);

    if(strpos($contents,"window.location.href" )  &&  strpos($contents, 'http://sms.fullonsms.com/MsgSent.php'))
    {
      curl_setopt($curl, CURLOPT_POST, 0);
      curl_setopt($curl, CURLOPT_REFERER,curl_getinfo($curl, CURLINFO_EFFECTIVE_URL));
      curl_setopt($curl, CURLOPT_URL, "http://sms.fullonsms.com/MsgSent.php");
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
      $contents = curl_exec($curl);
    }

    //Check Message Status
    $pos = strpos($contents, 'SMS Sent successfully');
    $res = ($pos !== false) ? true : false;
    $result[] = array('phone' => $p, 'msg' => urldecode($msg), 'result' => $res);

  }
  //echo $text;

  // Logout
  curl_setopt($curl, CURLOPT_URL, "http://sms.fullonsms.com/logout.php?LogOut=1");
  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl, CURLOPT_POSTFIELDS,"1=1");
  curl_setopt($curl, CURLOPT_REFERER, "http://sms.fullonsms.com/home.php");
  $text = curl_exec($curl);

  curl_close($curl);
  echo $result;
$garbage=md5(uniqid(rand()));
echo "Click on below link to proceed to fill your confirmation code sent to your mobile";
echo "<a href='http://mohit.byethost7.com/confirm.php?gar=".$garbage."123456789&code=".$no."&12434545545565'>Click</a>";

	