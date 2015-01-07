// JavaScript Document
var xmlhttp;

function showElem(str)
{
xmlhttp=GetXmlHttpObject();
if (xmlhttp==null)
  {
  alert ("Browser does not support HTTP Request");
  return;
  }
var url="get_element.php";
url=url+"?q="+str;
	//alert (url);
url=url+"&sid="+Math.random();
xmlhttp.onreadystatechange=stateChanged;
xmlhttp.open("POST",url,true);
xmlhttp.send(null);
}

function stateChanged()
{
	if (xmlhttp.readyState==4 && xmlhttp.status==200)
	{
		document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
	}
}

function GetXmlHttpObject()
{
if (window.XMLHttpRequest)
  {
  // code for IE7+, Firefox, Chrome, Opera, Safari
  return new XMLHttpRequest();
  }
if (window.ActiveXObject)
  {
  // code for IE6, IE5
  return new ActiveXObject("Microsoft.XMLHTTP");
  }
return null;
}