// JavaScript Document
var minYear=2009;
var maxYear=2100;

function deleteSVC(delID)
{
	document.getElementById('dsvc').value = document.getElementById(delID).value;
	document.type.submit();
}
function deletePDT(delID)
{
	document.getElementById('dptd').value = document.getElementById(delID).value;
	document.detailsvc.submit();
}
function sendGuest(username)
{	
	
	document.getElementById('nid').value = nid;
	document.getElementById('c_cat').value = document.getElementById(c_cat).value;
	document.getElementById('emps').value = document.getElementById(emps).value;
	document.getElementById('post').value = document.getElementById(post).value;
	document.getElementById('location').value =document.getElementById(location).value;
	document.getElementById('education').value = document.getElementById(education).value;	
	document.getElementById('req').value = document.getElementById(req).value;
	document.getElementById('note').value = document.getElementById(note).value;
	document.getElementById('cpost').value = document.getElementById(cpost).value;
	document.getElementById('clocation').value = document.getElementById(clocation).value;
	document.getElementById('ceducation').value = document.getElementById(ceducation).value;
	document.getElementById('creq').value = document.getElementById(creq).value;
	document.getElementById('cnote').value = document.getElementById(cnote).value;
	document.getcareer.submit();
}
function sendNews(nid,imp, name_e, desc_e, name_c, desc_c, name_j, desc_j)
{	
	document.getElementById('nid').value = nid;
	document.getElementById('imp').value = document.getElementById(imp).value;
	document.getElementById('name_e').value = document.getElementById(name_e).value;
	document.getElementById('desc_e').value = document.getElementById(desc_e).value;
	
	document.getElementById('name_c').value =document.getElementById(name_c).value;
	document.getElementById('desc_c').value = document.getElementById(desc_c).value;
	
	document.getnews.submit();
}

function openDiv(divID,rtID,rdiv)
{	
	if(document.getElementById(divID).style.display == 'block')
	{
		document.getElementById(divID).style.display = 'none';
		document.getElementById(rdiv).style.display = 'block';		
	}
	else if (document.getElementById(divID).style.display == 'none')
	{
		document.getElementById(divID).style.display = 'block';
		document.getElementById(rdiv).style.display = 'none';
		document.getElementById(rtID).value = "";
	}
	else{
		return false;
	}	
}

function sendSvc(tpID, tne, tde, tnc, tdc, tnj, tdj)
{
	var tID = document.getElementById(tpID).value;
	if(tID != "" || tID != 0)
	{
	document.getElementById('t_id').value = tID;
	
	var ne = document.getElementById(tne).value;
	document.getElementById('tname_e').value = ne;
	var nc = document.getElementById(tnc).value;
	document.getElementById('tname_c').value = nc;
	var nj = document.getElementById(tnj).value;
	document.getElementById('tname_j').value = nj;
	
	var de = document.getElementById(tde).value;
	document.getElementById('tdesc_e').value = de;
	var dc = document.getElementById(tdc).value;
	document.getElementById('tdesc_c').value = dc;
	var dj = document.getElementById(tdj).value;
	document.getElementById('tdesc_j').value = dj;
	document.type.submit();
	}
	else{
		document.getElementById('t_id').value = "";
		return false;
	}
	
}

function mouseOver(greased_monkey,a_pic)
{
	document.getElementById(greased_monkey).src =a_pic;
}

function mouseOut(greased_monkey,a_pic)
{
	document.getElementById(greased_monkey).src =a_pic;
}