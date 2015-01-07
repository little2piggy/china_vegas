<script type="text/javascript">

/**
*
*  Javascript sprintf
*  http://www.webtoolkit.info/
*
*
**/
 
sprintfWrapper = {
 
	init : function () {
 
		if (typeof arguments == "undefined") { return null; }
		if (arguments.length < 1) { return null; }
		if (typeof arguments[0] != "string") { return null; }
		if (typeof RegExp == "undefined") { return null; }
 
		var string = arguments[0];
		var exp = new RegExp(/(%([%]|(\-)?(\+|\x20)?(0)?(\d+)?(\.(\d)?)?([bcdfosxX])))/g);
		var matches = new Array();
		var strings = new Array();
		var convCount = 0;
		var stringPosStart = 0;
		var stringPosEnd = 0;
		var matchPosEnd = 0;
		var newString = '';
		var match = null;
 
		while (match = exp.exec(string)) {
			if (match[9]) { convCount += 1; }
 
			stringPosStart = matchPosEnd;
			stringPosEnd = exp.lastIndex - match[0].length;
			strings[strings.length] = string.substring(stringPosStart, stringPosEnd);
 
			matchPosEnd = exp.lastIndex;
			matches[matches.length] = {
				match: match[0],
				left: match[3] ? true : false,
				sign: match[4] || '',
				pad: match[5] || ' ',
				min: match[6] || 0,
				precision: match[8],
				code: match[9] || '%',
				negative: parseInt(arguments[convCount]) < 0 ? true : false,
				argument: String(arguments[convCount])
			};
		}
		strings[strings.length] = string.substring(matchPosEnd);
 
		if (matches.length == 0) { return string; }
		if ((arguments.length - 1) < convCount) { return null; }
 
		var code = null;
		var match = null;
		var i = null;
 
		for (i=0; i < matches.length; i++) {
 
			if (matches[i].code == '%') { substitution = '%' }
			else if (matches[i].code == 'b') {
				matches[i].argument = String(Math.abs(parseInt(matches[i].argument)).toString(2));
				substitution = sprintfWrapper.convert(matches[i], true);
			}
			else if (matches[i].code == 'c') {
				matches[i].argument = String(String.fromCharCode(parseInt(Math.abs(parseInt(matches[i].argument)))));
				substitution = sprintfWrapper.convert(matches[i], true);
			}
			else if (matches[i].code == 'd') {
				matches[i].argument = String(Math.abs(parseInt(matches[i].argument)));
				substitution = sprintfWrapper.convert(matches[i]);
			}
			else if (matches[i].code == 'f') {
				matches[i].argument = String(Math.abs(parseFloat(matches[i].argument)).toFixed(matches[i].precision ? matches[i].precision : 6));
				substitution = sprintfWrapper.convert(matches[i]);
			}
			else if (matches[i].code == 'o') {
				matches[i].argument = String(Math.abs(parseInt(matches[i].argument)).toString(8));
				substitution = sprintfWrapper.convert(matches[i]);
			}
			else if (matches[i].code == 's') {
				matches[i].argument = matches[i].argument.substring(0, matches[i].precision ? matches[i].precision : matches[i].argument.length)
				substitution = sprintfWrapper.convert(matches[i], true);
			}
			else if (matches[i].code == 'x') {
				matches[i].argument = String(Math.abs(parseInt(matches[i].argument)).toString(16));
				substitution = sprintfWrapper.convert(matches[i]);
			}
			else if (matches[i].code == 'X') {
				matches[i].argument = String(Math.abs(parseInt(matches[i].argument)).toString(16));
				substitution = sprintfWrapper.convert(matches[i]).toUpperCase();
			}
			else {
				substitution = matches[i].match;
			}
 
			newString += strings[i];
			newString += substitution;
 
		}
		newString += strings[i];
 
		return newString;
 
	},
 
	convert : function(match, nosign){
		if (nosign) {
			match.sign = '';
		} else {
			match.sign = match.negative ? '-' : match.sign;
		}
		var l = match.min - match.argument.length + 1 - match.sign.length;
		var pad = new Array(l < 0 ? 0 : l).join(match.pad);
		if (!match.left) {
			if (match.pad == "0" || nosign) {
				return match.sign + pad + match.argument;
			} else {
				return pad + match.sign + match.argument;
			}
		} else {
			if (match.pad == "0" || nosign) {
				return match.sign + match.argument + pad.replace(/0/g, ' ');
			} else {
				return match.sign + match.argument + pad;
			}
		}
	}
}
 
sprintf = sprintfWrapper.init;

function getXmlHttpRequestObject()
{
	var xmlhttp;
	
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	return xmlhttp;
}

function loadXMLDoc(elementID, city_id,host_url)
{
	xmlhttp = getXmlHttpRequestObject();
	xmlhttp.onreadystatechange=function()
	{
		/*if(xmlhttp != null)
		{
		alert(xmlhttp);
		str = sprintf("Ready State %d, Status %d",xmlhttp.readyState,xmlhttp.status);
		alert(str);
		}
		else
		{
		alert("NULL");
		}*/
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById(elementID).innerHTML=select_hotels(xmlhttp.responseText);
		}
	}
	//change script.php and parameter
	url = sprintf("http://%s/script.php?parameter=%s",host_url,city_id);
	xmlhttp.open("GET",url,true);
	xmlhttp.send();
}

function makeHighScoreBox(scores)
{
	sarr = scores.split("\n");
	
	str = "<table width=\"300px\">";
	j = 1;
	for ( var i in sarr )
	{
		if(sarr[i].length <1)
		{
			continue;
		}
		str += "<tr><td align=\"left\"><div class=\"highscoreText smallerScore\">";
		str += j;
		str += "</div></td><td align=\"right\"><div class=\"highscoreText smallerScore\">";
		str += sarr[i];
		str += "</div></td></tr>";
		j++;
	}
	str += "</table>";
	return (str);
}

var pos = 0;
var startName = ['A','A','A'];

function drawTheScoreBox()
{
	elem = document.getElementById('ScorePanel');
	str = "";
	for(i = 0 ; i < 3 ; i++)
	{
		if (i == pos)
		{
			str += sprintf("<div class=\"highScoreText active\">%s</div>",startName[i]);
		}
		else
		{
			str += sprintf("<div class=\"highScoreText\">%s</div>",startName[i]);
		}
	}
	elem.innerHTML = str;
}

function isAlpha(xStr)
{  
	var regEx = /^[a-zA-Z0-9\-]+$/;  
	return xStr.match(regEx);  
} 

document.onkeydown = KeyDownHighScore;   

function KeyDownHighScore(e)
{
    var code;
	
	if (!e) var e = window.event;

	if (e.keyCode) 
	{
		code = e.keyCode;
	}
	else if (e.which) 
	{
		code = e.which;
	}
	
	var character = String.fromCharCode(code);
	
	switch(code)
	{
		case 8:
		case 38:
		case 37:
			/*left arrow*/
			if (pos > 0)
			{
				pos--;
			}
			drawTheScoreBox();
			return;
		case 40:
		case 39:
			/*right arrow*/
			if (pos < 2)
			{
				pos++;
			}
			drawTheScoreBox();
			return;
		case 13:
			return;
		default:
			break;
	}	
	
	character = character.toUpperCase();
	
	if (!isAlpha(character))
	{
		character = "&nbsp;";
	}
	
	startName[pos] = character;
	
	if (pos < 2)
	{
		pos++;
	}
	
	drawTheScoreBox();
	return;
}

</script>

<?php
/*
$lang = "CN";
$_SESSION['lang'] = $lang;

if ($lang == "EN")
{
include_once("ENG.php");
}
else
{
include_once("CNY.php");
}
global $_WORDS;
$q=$_REQUEST["q"];

include_once("sql_con.php");

$con = sql_con();

$sql="SELECT * FROM admin_activity_log WHERE admin_id = '".$q."' order by access_day desc";

$result = mysql_query($sql);

echo "<table border='1'>
<tr>
<th>".$_WORDS['user_date']."</th>
<th>".$_WORDS['username']."</th>
<th>".$_WORDS['amin_act']."</th>
<th>IP</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['access_day'] . "</td>";
  echo "<td>" . $row['admin_id'] . "</td>";
  echo "<td>" . $row['page_update'] . "</td>";
  echo "<td>" . $row['ip_address'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

mysql_close($con);
*/
?>