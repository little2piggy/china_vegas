<?php
include_once("include/rand_generator.php");
include_once("include/myDB.php");
include_once("bookfntion.php");
$getID=true;
do{
	$bID = get_rand_id(10);
	$getID = get_booking( $bID );
}while($getID <> false);


foreach($_REQUEST as $query_string_variable => $value) {
	 $_SESSION[$query_string_variable] = $value;
}
if($_REQUEST['nonsmoking'] == "nonsmoking"){ $ns ="Yes"; }
else {$ns="No";}

if($_REQUEST['handcap'] == "handcap"){$hc="Yes";}
else {$hc="No";}
if($_REQUEST['late_checkin'] == "late_checkin"){$lc="Yes";}
else {$lc="No";}
	$item_name = $_SESSION['ht_name']."&nbsp;--&nbsp;".$_SESSION['item_name'];
	$checkin = $_SESSION['chkin'];
	$checkout = $_SESSION['chkout'];
	$rooms = $_SESSION['rooms'];
	$amount = $_SESSION['amount'];
	$name_one = $_SESSION['1_name'];
	$name_two = $_SESSION['2_name'];
	$e_mail = $_SESSION['e_mail'];
	$tel = $_SESSION['tel'];
	$booking_date = date("Y-m-d g:i A");
	
if(isset($_SESSION['1_name']) && isset($_SESSION['2_name']) &&
	isset($_SESSION['e_mail']) && isset($_SESSION['tel']) && 
	isset($_SESSION['amount']) && isset($_SESSION['item_name']) &&
	isset($_SESSION['agree']))
{
	
	$a = new sqlDrv();
	$inst = "INSERT INTO booking (booking_id, products, member_id,check_in, check_out, no_of_rooms,
								  amount,Nonsmoking,disability,late_checkout,name_1,name_2,
								  email, phone, booking_date) 
								VALUES ('$bID','$item_name','$session->username','$checkin','$checkout','$rooms',
										'$amount','$ns','$hc','$lc','$name_one','$name_two',
										'$e_mail', '$tel', '$booking_date')";
	//echo $inst;
	mysql_query($inst);
	
	$to = 'everdesign09@gmail.com';
		$subject = "客房预订单 -- 日期 ".$booking_date;
		$subject = "=?UTF-8?B?" . base64_encode($subject) . "?=";
		$message ="
		<html>
		<head>
		客房预订单 -- 日期 ".$booking_date."
		</head>
		<body>
			<p align='left'>以下是客人提供的信息：</p>
			<table align='left'>
			<tr>
			<td>订单号码：</td><td>".$bID."</td></tr>
			<tr>
			<td>姓名:</td><td>".$_SESSION['pre_fix'].$_SESSION['1_name']." ".$_SESSION['2_name']."</td></tr>
			<tr><td>电子邮箱:</td><td>".$_SESSION['e_mail']."</td></tr>
			<tr><td>电话:</td><td>".$_SESSION['tel']."</td></tr>
			<tr><td colspan='2'>住房信息 --</td></tr>
			<tr><td>入住日期:</td><td>".$_SESSION['checkin']."</td></tr>
			<tr><td>离店日期:</td><td>".$_SESSION['checkout']."</td></tr>
			<tr><td>房间数量:</td><td>".$_SESSION['rooms']."</td></tr>
			<tr><td>成年人:</td><td>".$_SESSION['adults']."</td></tr>
			<tr><td>小童:</td><td>".$_SESSION['children']."</td></tr>
			<tr><td>房间类型:</td><td>".$_SESSION['item_name']."</td></tr>
			<tr><td>合计:</td><td>".$_SESSION['amount']."</td></tr>
			<tr><td colspan='2'>特别要求 --</td></tr>
			<tr><td>无烟楼层:</td><td>".$ns."</td></tr>
			<tr><td>无障碍通道:</td><td>".$hc."</td></tr>
			<tr><td>18点后入住:</td><td>".$lc."</td></tr>
			</table>
		</body>
		</html>
		";
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$headers .= "From: postmaster@triumphal-view-hotel.cn\r\nReply-To: postmaster@triumphal-view-hotel.cn";
		$mail_sent = @mail( $to, $subject, $message, $headers );
		$_SESSION['mail_sent'] = $mail_sent;
		if( $mail_sent == 1)
		{
			unset($_SESSION);
			header("Location: done.php");
		}
		else
		{ 
			$_SESSION['bID'] = $bID;
			unset($_SESSION['agree']);
			header("Location: done.php");
		}	
	
}
else
{
	header("Location: book.php");
}
?>