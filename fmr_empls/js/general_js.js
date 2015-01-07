// JavaScript Document
function showonlyone(thechosenone) {
      var newboxes = document.getElementsByTagName("div");
            for(var x=0; x<newboxes.length; x++) {
                  name = newboxes[x].getAttribute("name");
                  if (name == 'newboxes') {
                        if (newboxes[x].id == thechosenone) {
                        newboxes[x].style.display = 'block';
                  }
                  else {
                        newboxes[x].style.display = 'none';
                  }
            }
      }
}
function showHide(shwID, hdeID)
{
	if(document.getElementById(shwID).style.display == 'none')
	{
		document.getElementById(shwID).style.display = 'block';
		document.getElementById(hdeID).style.display = 'none';
	}
	else if(document.getElementById(hdeID).style.display == 'none')
	{
		document.getElementById(hdeID).style.display = 'block';
		document.getElementById(shwID).style.display = 'none';
	} 
}
function sendOffer(o_id, ht_name,sv_name,o_cdesc, o_edesc,o_imp)
{
	document.getElementById('edit_id').value = o_id;
	document.getElementById('edit_hotel_offer').value = ht_name;
	document.getElementById('edit_svc_offer').value = sv_name;
	document.getElementById('edit_coffer').value = o_cdesc.replace(/<br>/gi, "\n");
	document.getElementById('edit_eoffer').value = o_edesc.replace(/<br>/gi, "\n");
	document.getElementById('edit_oimp').value = o_imp;
	showHide('myOList', 'myOFill');
}

function sendSvc(sv_cname,sv_ename, pd_id)
{
	document.getElementById('edit_csvc').value = sv_cname;
	document.getElementById('edit_esvc').value = sv_ename;
	document.getElementById('edit_svcid').value = pd_id;
	//edit_svcid
	showHide('mySList', 'mySFill');
}

function sendCity(ct_cname, ct_ename, ct_province, ct_abbr, ct_id)
{

	document.getElementById('edit_cname').value = ct_cname;
	document.getElementById('edit_ename').value = ct_ename;
	document.getElementById('edit_pvc').value = ct_province;
	document.getElementById('edit_abbr').value = ct_abbr;
	document.getElementById('edit_ctyid').value = ct_id;
	showHide('myList', 'myFill');
}

function sendHotel(ht_cname, ht_cdes, ht_ename, ht_edes, ht_star, ht_imp, city_id,ht_id)
{
	document.getElementById('edit_chname').value = ht_cname;
	document.getElementById('edit_cdec').value = ht_cdes.replace(/<br>/gi, "\n");
	document.getElementById('edit_ehname').value = ht_ename;
	document.getElementById('edit_edec').value = ht_edes.replace(/<br>/gi, "\n");
	document.getElementById('edit_star').value = ht_star;
	document.getElementById('edit_himp').value = ht_imp;
	document.getElementById('edit_city').value = city_id;
	document.getElementById('edit_hid').value = ht_id;
	showHide('myHList', 'myHFill');
}

function validOffer(dateID)
{
	var s = document.getElementById('pk_svc').value;
	var g = document.getElementById('pk_hotel').value;
	if ( s==0 || g==0)
	{
		//document.getElementById(dateID).style.display = 'block';
		return false;	
	}
	else{
		document.forms["add_offer"].submit();
		//document.getElementById(dateID).style.display = 'none';
		return true;
	}
}
