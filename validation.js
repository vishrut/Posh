var validuser=0;
var validpass=0;
var validveri=0;
var validemail=0;
var tuser;    
var temail;
var tpass;
var tveri;

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

function showEmailHint(str)
{
	var emailexp=new RegExp("^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\\.[a-zA-Z0-9-.]+$");
	if(emailexp.test(str))
	{
		$("#emailgroup").attr("class","control-group success");
		document.getElementById("emailhelp").innerHTML="Seems good!";
		validemail=1;
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
	xmlhttp.open("GET","checkavailability.php?q="+str,true);
	xmlhttp.send();
}

function checkallvalidations()
{
	if(validuser==1 && validemail==1 && validpass==1 && validveri==1)
		$("#signupbtn").removeAttr("disabled");
	else
		$("#signupbtn").attr("disabled","disabled");
}	

