var validuser=0;
var validpass=0;
var validveri=0;
var validemail=0;
var validsid=0;
var validrno=0;
var validfname=0;
var validlname=0;
var tfir;
var tlas;
var trno;
var tuser;    
var temail;
var tpass;
var tveri;
var tsid;

function validateuser(str)
{
	if ( tuser )
	{
		clearTimeout( tuser );
		tuser = setTimeout( function() {
		showUserHint(str);}, 500 );
	}
	else
	{
		tuser = setTimeout( function() {
		showUserHint(str);}, 500 );
	}
};

function validatefname(str)
{
	if ( tfir )
	{
		clearTimeout( tfir );
		tfir = setTimeout( function() {
		showFnameHint(str);}, 500 );
	}
	else
	{
		tfir = setTimeout( function() {
		showFnameHint(str);}, 500 );
	}
};

function validatelname(str)
{
	if ( tlas )
	{
		clearTimeout( tlas );
		tlas = setTimeout( function() {
		showLnameHint(str);}, 500 );
	}
	else
	{
		tlas = setTimeout( function() {
		showLnameHint(str);}, 500 );
	}
};


function validateemail(str)
{
	if ( temail )
	{
		clearTimeout( temail );
		temail = setTimeout( function() {
		showEmailHint(str);}, 500 );
	}
	else
	{
		temail = setTimeout( function() {
		showEmailHint(str);}, 500 );
	}
};

function validatepassword(str)
{
	if ( tpass )
	{
		clearTimeout( tpass );
		tpass = setTimeout( function() {
		showPasswordHint(str);}, 500 );
	}
	else
	{
		tpass = setTimeout( function() {
		showPasswordHint(str);}, 500 );
	}
}

function validateverify(str)
{
	if ( tveri )
	{
		clearTimeout( tveri );
		tveri = setTimeout( function() {
		showVerifyHint(str);}, 500 );
	}
	else
	{
		tveri = setTimeout( function() {
		showVerifyHint(str);}, 500 );
	}
}

function validatestudentid(str)
{
	if ( tsid )
	{
		clearTimeout( tsid );
		tsid = setTimeout( function() {
		showSIDHint(str);}, 500 );
	}
	else
	{
		tsid = setTimeout( function() {
		showSIDHint(str);}, 500 );
	}
}

function validateroomno(str)
{
	if ( trno )
	{
		clearTimeout( trno );
		trno = setTimeout( function() {
		showRNoHint(str);}, 500 );
	}
	else
	{
		trno = setTimeout( function() {
		showRNoHint(str);}, 500 );
	}
}

function showRNoHint(str)
{
	if(str.length==3 && !(isNaN(str))){
		
		id = parseInt(str);
		
		if(id>100 && id<400){
			$("#winggroup").attr("class","control-group success");
			document.getElementById("winghelp").innerHTML="Seems good!";
			validrno=1;
		}
		else{
			$("#winggroup").attr("class","control-group error");
			document.getElementById("winghelp").innerHTML="Invalid";
			validrno=0;
		}
	}
		
	else{
		$("#winggroup").attr("class","control-group error");
		document.getElementById("winghelp").innerHTML="Invalid";
		validrno=0;
	}		
	
	checkallvalidations();
	return;
}

function showSIDHint(str)
{
	if(str.length==9 && !(isNaN(str))){
		
		id = parseInt(str);
		
		if(id>200700000 && id<201300000){
			validsid=1;
			checksidavail(str);
		}
		else{
			validsid=0;
		}
	}
		
	else{
		$("#studentidgroup").attr("class","control-group error");
		document.getElementById("studentidhelp").innerHTML="Invalid";
		validsid=0;
	}		
	
	checkallvalidations();
	return;
}	


function showVerifyHint(str)
{
	if(str==document.getElementById("inputPassword").value)
	{	
		if(str.length>5){
			$("#verigroup").attr("class","control-group success");
			document.getElementById("verifyhelp").innerHTML="Seems good!";
			validveri=1;
		}
		else{
			$("#verigroup").attr("class","control-group error");
			document.getElementById("verifyhelp").innerHTML="At least 6 characters long";
			validveri=0;
		}		
		checkallvalidations();
		return;
	}
	else
	{
		$("#verigroup").attr("class","control-group error");
		document.getElementById("verifyhelp").innerHTML="Passwords don't match";
		validveri=0;
		checkallvalidations();
		return;
	}
}	

function showPasswordHint(str)
{
	if(str.length>5)
	{
		$("#passgroup").attr("class","control-group success");
		document.getElementById("passwordhelp").innerHTML="Seems good!";
		validpass=1;
		showVerifyHint(document.getElementById("inputVerify").value);
		checkallvalidations();
		return;
	}
	else
	{
		$("#passgroup").attr("class","control-group error");
		document.getElementById("passwordhelp").innerHTML="At least 6 characters long";
		validpass=0;
		showVerifyHint(document.getElementById("inputVerify").value);
		checkallvalidations();
		return;
	}
}

function showFnameHint(str)
{
	if(str.length>0)
	{
		$("#firstnamegroup").attr("class","control-group success");
		document.getElementById("firstnamehelp").innerHTML="Seems good!";
		validfname=1;
		checkallvalidations();
		return;
	}
	else
	{
		$("#firstnamegroup").attr("class","control-group error");
		document.getElementById("firstnamehelp").innerHTML="Required";
		validfname=0;
		checkallvalidations();
		return;
	}
}

function showLnameHint(str)
{
	if(str.length>0)
	{
		$("#lastnamegroup").attr("class","control-group success");
		document.getElementById("lastnamehelp").innerHTML="Seems good!";
		validlname=1;
		checkallvalidations();
		return;
	}
	else
	{
		$("#lastnamegroup").attr("class","control-group error");
		document.getElementById("lastnamehelp").innerHTML="Required";
		validlname=0;
		checkallvalidations();
		return;
	}
}

function showEmailHint(str)
{
	var emailexp=new RegExp("^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\\.[a-zA-Z0-9-.]+$");
	if(emailexp.test(str))
	{
		validemail=1;
		checkemailavail(str);
		checkallvalidations();
		return;
	}
	else
	{
		$("#emailgroup").attr("class","control-group error");
		document.getElementById("emailhelp").innerHTML="Invalid e-mail";
		validemail=0;
		checkallvalidations();
		return;
	}
}

function checkemailavail(str){
	var xmlhttp;
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{	
			//Removes the special character returned by possibly the include option in checkavailability.php
			document.getElementById("emailhelp").innerHTML=xmlhttp.responseText.replace(/[^a-zA-Z0-9]/g,'');
			if(document.getElementById("emailhelp").innerHTML=="Available")
			{
				validemail=1;
				$("#emailgroup").attr("class","control-group success");
				checkallvalidations();
			}
			else
			{
				validemail=0;
				checkallvalidations();
				$("#emailgroup").attr("class","control-group error");
			}
		}
	}
	xmlhttp.open("GET","signup/checkemailavail.php?q="+str,true);
	xmlhttp.send();
}

function checksidavail(str){
	var xmlhttp;
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{	
			//Removes the special character returned by possibly the include option in checkavailability.php
			document.getElementById("studentidhelp").innerHTML=xmlhttp.responseText.replace(/[^a-zA-Z0-9]/g,'');
			if(document.getElementById("studentidhelp").innerHTML=="Available")
			{
				validsid=1;
				$("#studentidgroup").attr("class","control-group success");
				checkallvalidations();
			}
			else
			{
				validsid=0;
				$("#studentidgroup").attr("class","control-group error");
				checkallvalidations();
			}
		}
	}
	xmlhttp.open("GET","signup/checksidavail.php?q="+str,true);
	xmlhttp.send();
}

function showUserHint(str)
{
	var xmlhttp;
	if (str.length==0)
	{ 
		document.getElementById("usernamehelp").innerHTML="";
		return;
	}
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{	
			//Removes the special character returned by possibly the include option in checkavailability.php
			document.getElementById("usernamehelp").innerHTML=xmlhttp.responseText.replace(/[^a-zA-Z0-9]/g,'');
			if(document.getElementById("usernamehelp").innerHTML=="Available")
			{
				validuser=1;
				$("#usergroup").attr("class","control-group success");
			}
			else
			{
				validuser=0;
				$("#usergroup").attr("class","control-group error");
			}
			checkallvalidations();	
		}
	}
	xmlhttp.open("GET","signup/checkavailability.php?q="+str,true);
	xmlhttp.send();
}

function checkallvalidations()
{
	if(validuser==1 && validemail==1 && validpass==1 && validveri==1 && validsid==1 && validrno==1 && validfname==1 && validlname==1)
		$("#signupbtn").removeAttr("disabled");
	else{
		$("#signupbtn").attr("disabled","disabled");
		}
}	

