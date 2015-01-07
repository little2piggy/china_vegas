// JavaScript Document
function showtheone(chosen_one) {
      var nbxes = document.getElementsByTagName("div");
            for(var x=0; x<nbxes.length; x++) {
                  name = nbxes[x].getAttribute("name");
                  if (name == 'nbxes') {
                        if (nbxes[x].id == chosen_one) {
                        nbxes[x].style.display = 'block';
                  }
                  else {
                        nbxes[x].style.display = 'none';
                  }
            }
      }
}
function validatecu(){
	
	var prevar = document.getElementById('prefix').value;
	var n1var= document.getElementById('name_1').value;
	var n2var= document.getElementById('name_2').value;
	var comvar= document.getElementById('comment').value;
	
	var emailvar=document.getElementById('email').value;
	var phonevar=document.getElementById('phone').value;
	
	if(isBlank(prevar))
	{
		document.getElementById('prefix').focus(); 
		document.getElementById('prefixdiv').style.display = 'block';	
		return false;
	}
	if(isBlank(n1var) || isNumeric(n1var) == true )
	{
		document.getElementById('name_1').focus(); 
		document.getElementById('name1div').style.display = 'block';	
		return false;
	}
	if( isBlank(n2var) || isNumeric(n2var) == true )
	{
		document.getElementById('name_2').focus(); 
		document.getElementById('name2div').style.display = 'block';	
		return false;	
	}
	if( isBlank(emailvar) && valPhone(phonevar)==false){ 
		document.getElementById('email').focus(); 
		document.getElementById('teldiv').style.display = 'block';	
		return false;
	}
	if (emailchk(emailvar)==false){
		document.getElementById('email').value="";
		document.getElementById('email').focus();
		document.getElementById('emaildiv').style.display = 'block';			
		return false;
	}
	if( isBlank(comvar))
	{
		document.getElementById('comment').focus(); 
		document.getElementById('comdiv').style.display = 'block';	
		return false;
	}
	return true;
 }
function validFields()
{
	if (document.getElementById('checkin').value == "" || document.getElementById('checkout').value == "")
	{
		document.getElementById("datediv").style.display = 'block' ;
		document.getElementById("roomdiv").style.display = 'none';
		document.getElementById("numdiv").style.display = 'none';
		return false;
	}
	if (document.getElementById('rooms').value == "")
	{
		document.getElementById("roomdiv").style.display = 'block';
		document.getElementById("numdiv").style.display = 'none';
		document.getElementById("datediv").style.display = 'none';
		return false;
	}
	else
	{
		document.getElementById("numdiv").style.display = 'none';
		document.getElementById("roomdiv").style.display = 'none';
		document.getElementById("datediv").style.display = 'none';
		document.rest_left.submit();
		return true;
	}
}
function submit_cancel_booking(){
	document.cl_booking.submit();
}
function disableDiv(eDiv)
{
	if(document.getElementById(eDiv).style.display == 'block')
	{
		document.getElementById(eDiv).style.display = 'none';	
	}
}
 function custInfoValid(){
	var pre = document.getElementById('pre_fix').value;	 
	var n1= document.getElementById('1_name').value;
	var n2= document.getElementById('2_name').value;
	var e_mail=document.getElementById('e_mail').value;
	var tel=document.getElementById('tel').value;
	var agr = document.getElementById('agree').checked;
	
	if(isBlank(n1) || isNumeric(n1) == true )
	{
		document.getElementById('1_name').focus(); 
		document.getElementById('1namediv').style.display = 'block';	
		return false;
	}
	if( isBlank(n2) || isNumeric(n2) == true )
	{
		document.getElementById('2_name').focus(); 
		document.getElementById('2namediv').style.display = 'block';	
		return false;	
	}
	if( isBlank(e_mail))
	{
		document.getElementById('e_mail').focus(); 
		document.getElementById('emptye_maildiv').style.display = 'block';	
		return false;
	}				
	if(valPhone(tel)==false){ 
		document.getElementById('tel').focus(); 
		document.getElementById('tel_div').style.display = 'block';	
		return false;
	}
	if (emailchk(e_mail)==false){
		document.getElementById('e_mail').focus();
		document.getElementById('e_maildiv').style.display = 'block';			
		return false;
	}
	if(isBlank(pre) || isNumeric(pre) == true )
	{
		document.getElementById('pre_fix').focus(); 
		document.getElementById('prefixdiv').style.display = 'block';	
		return false;
	}
	if( agr == 0 || agr == flase){
		document.getElementById('agree').focus(); 
		document.getElementById('agree_div').style.display = 'block';	
		return false;
	}
    document.book_sent.submit();
	return true;
 }
 
 function emailchk(str) {

	str = str.trim();
	if(str == "")
	{
		return true;	
	}
	var at="@";
	var dot=".";
	var lat=str.indexOf(at);
	var lstr=str.length;
	var ldot=str.indexOf(dot);
	if (str.indexOf(at)==-1){
	   return false;
	}

	if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
	   return false;
	}

	if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
		return false;
	}

	 if (str.indexOf(at,(lat+1))!=-1){
		return false;
	 }

	 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
		return false;
	 }

	 if (str.indexOf(dot,(lat+2))==-1){
		return false;
	 }
	
	 if (str.indexOf(" ")!=-1){
		return false;
	 }

	 return true;					
}
 function isBlank(val)
{
	if(val==null)
	{return true;}
	for(var i=0;i<val.length;i++)
	{
		if((val.charAt(i)!=' ')&&(val.charAt(i)!="\t")&&(val.charAt(i)!="\n")&&(val.charAt(i)!="\r"))
		{return false;
		}
	}
	return true;
}
function mouseOver(pic_id,a_pic)
{
	document.getElementById(pic_id).src =a_pic;
}

function mouseOut(pix_id,the_pic)
{
	document.getElementById(pix_id).src =the_pic;
}

function isInteger(s, myID, errID)
{
      var i;
		s = s.toString();
      for (i = 0; i < s.length; i++)
      {
         var c = s.charAt(i);
         if (isNaN(c)) 
	   {
      	document.getElementById(errID).style.display = 'block';	
		document.getElementById(myID).value = "";
		return false;
	   }
      }
      document.getElementById(errID).style.display = 'none';
      return true;
}
function isNumeric(anumber)
 {
	 return(parseFloat(anumber,10)==(anumber*1));
}
function valPhone(sphone)
{
	if(isBlank(s)){return false;	}
	if(s=="0123-4567-8901"){return false;}
	var i=0;
	var mySplitResult = s.split(".");
	if(mySplitResult.length>1) {return false;}
	var mySplitResult = s.split("-");

	for(i = 0; i < mySplitResult.length; i++){
		if(isNaN(mySplitResult[i]) == true){return false; }
	}
	return true;
}
function sendDoc(hID,hotel, product_id, product){
	document.getElementById('htl_id').value = hID;
	document.getElementById('pd_id').value = product_id;
	document.getElementById('pd_name').value = product;
	document.getElementById('ht_name').value = hotel;
	
	document.so.submit();
}
function submit_htl(htl_id){
	document.getElementById('htl_id').value = htl_id;
	document.rest_left.submit();
}