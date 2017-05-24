function formValidation()
{
var fname = document.registration.fname;
var lname = document.registration.lname;
var username = document.registration.username;
var password = document.registration.password;
var adhar = document.registration.adhar;
var email = document.registration.email;
var state = document.registration.state;
var pin = document.registration.pin; 
var mobile = document.registration.mobile;
if(allLetter(fname))
{
if(allLetter(lname))
{
if(username_validation(username,5,12))
{
if(password_validation(password,7,12))
{
if(allnumeric(adhar))
{
if(allnumeric(mobile))
{ 
//if(ValidateEmail(email))
{
//if(allLetter(state))
{
//if(allnumeric(pin))	
{


}
}
} 
}
} 
}
}
}
}
}
function allLetter(fname)
{ 
var letters = /^[A-Za-z]+$/;
if(fname.value.match(letters))
{
return true;
}
else
{
alert('first name must have alphabet characters only');
fname.focus();
return false;
}
}
return false;
}
function allLetter(lname)
{ 
var letters = /^[A-Za-z]+$/;
if(lname.value.match(letters))
{
return true;
}
else
{
alert('last name must have alphabet characters only');
lname.focus();
return false;
}
}
function username_validation(uid,mx,my)
{
var username_len = username.value.length;
if (username_len == 0 || username_len >= my || username_len < mx)
{
alert("Username should not be empty / length be between "+mx+" to "+my);
username.focus();
return false;
}
return true;
}
function password_validation(password,mx,my)
{
var password_len = password.value.length;
if (password_len == 0 ||password_len >= my || password_len < mx)
{
alert("Password should not be empty / length be between "+mx+" to "+my);
password.focus();
return false;
}
return true;
}
}
function allnumeric(mobile)
{
var mobile = /^\d{10}$/;
if(mobile.value.match(mobile))
{
return true;
}
else
{
alert("Not a valid Phone Number");
return false;
}
}  
function ValidateEmail(email)
{
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(email.value.match(mailformat))
{
return true;
alert('Form Succesfully Submitted');

}
else
{
alert("You have entered an invalid email address!");
return false;
}
}
	
/*else
{
alert('Form Succesfully Submitted');
window.location.reload()
return true;
}*/
/*function formValidation()
{
var submit = document.registration.submit;
alert("not submitted");
}
}*/