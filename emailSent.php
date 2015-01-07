<?php
session_start();
include_once("include/session.php");
 
if(isset($_REQUEST['name_1']) && isset($_REQUEST['name_2']) && isset($_REQUEST['comment']) ){}
else
{
	header("Location: ".$session->referrer);
	return false;
}


  
  
//-----------------------------------------------------
/*
$from = "Sandra Sender <sender@example.com>";
$to = "Ramona Recipient <recipient@example.com>";
$subject = "Hi!";
$body = "Hi,\n\nHow are you?";

$host = "mail.example.com";
$username = "smtp_username";
$password = "smtp_password";

$headers = array ('From' => $from,
  'To' => $to,
  'Subject' => $subject);
$smtp = Mail::factory('smtp',
  array ('host' => $host,
    'auth' => true,
    'username' => $username,
    'password' => $password));

$mail = $smtp->send($to, $headers, $body);
*/
//-----------------------------------------------------
$n1 = $_REQUEST['name_1'];
$n1 = trim($n1);
$n2 = $_REQUEST['name_2'];
$n2 = trim($n2);
$email = $_REQUEST['email'];
$email = trim($email);
$tel = $_REQUEST['phone'];
$tel = trim($tel);
$obj = $_REQUEST['object'];
$obj = trim($obj);
if (filter_var($obj, FILTER_VALIDATE_URL))
{
	header("Location: ".$session->referrer);
	return false;
}

$cmmnt = $_REQUEST['comment'];
$cmmnt = trim($cmmnt);
if (filter_var($cmmnt, FILTER_VALIDATE_URL))
{
	header("Location: ".$session->referrer);
	return false;
}
if($n1 == "" || $n2 == "" || strlen($cmmnt) < 2 || $tel == "15016865979" ){}
else
{
	$to = 'everdesign09@gmail.com'; //tvh@triumphal-view-hotel.com, 
	$subject = $_REQUEST['object'];
	$subject = "=?UTF-8?B?" . base64_encode($subject) . "?=";
	$message = "<html>
	<head>
	</head>
	<body>
	<p align='left'>以下是客人提供的信息：</p>
	<table align='left'>
	<tr>
	<td>姓名:</td><td>".$n1." ".$n2."</td></tr>
	<tr><td>电子邮箱:</td><td>".$email."</td></tr>
	<tr><td>电话:</td><td>".$tel."</td></tr>
	<tr><td>题目:</td><td>".$obj."</td></tr>
	<tr><td>内容:</td><td>".$cmmnt."</td>
	</tr>
	</table>
	</body>
	</html>
	";
	
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	$headers .= "From: postmaster@triumphal-view-hotel.cn\r\nReply-To: postmaster@triumphal-view-hotel.cn";
	
	
	$mail_sent = @mail( $to, $subject, $message, $headers );
	$_SESSION['mail_sent'] = $mail_sent;
}
unset($_REQUEST['object']);
unset($_REQUEST['name_1']);
unset($_REQUEST['name_2']);
unset($_REQUEST['email']);
unset($_REQUEST['phone']);
unset($_REQUEST['comment']);

header("Location: ".$session->referrer);

?>
