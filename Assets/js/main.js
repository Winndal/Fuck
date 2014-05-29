function validateForm()
{
var namn=document.forms["theForm"]["Fname"].value;
var mail=document.forms["theForm"]["Fmail"].value;
var kommentar=document.forms["theForm"]["Fcomment"].value;

var atpos=mail.indexOf("@");
var dotpos=mail.lastIndexOf(".");

if (!namn ||atpos<1 || dotpos<atpos+2 || dotpos+2>=mail.length|| kommentar.trim().length==0)
  {
  alert("Du har fel syntax, var noga 'förnamn efternamn' och 'example@yahoo.com'");
  return false;
  }
}
function validateRegister()
{
 var namn=document.forms["RegisterForm"]["name"].value;
 var email=document.forms["RegisterForm"]["email"].value;
 var password=document.forms["RegisterForm"]["password"].value;

 var atpos=email.indexOf("@");
 var dotpos=email.lastIndexOf(".");

 if (!namn ||atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length || !password)
  {
   alert("Du har fel syntax, var noga 'förnamn efternamn' och 'example@yahoo.com' och att lösen är ifyllt");
   return false;
  }
}

function loadUploadFile()
{
	$("#contentDiv").load("upload_filehtml.php");
	
}
function loadMyUploads()
{
  $("#contentDiv").load("myUploads.php");
}
  
function loadNewCourse()
{
  $("#contentDiv").load("createCoursehtml.php");
}

function loadSearch()
{
  var data = {
    data: document.forms["searchForm"]["search"].value
  };
  $("#contentDiv").load("searchCourse.php", data);
  return false;
}

$(function(){
  // när man klickar på serach, kör finltion loadSearch
  $("#searchDiv form").submit(loadSearch);
});
function buildinginprogress()
{
  $("#contentDiv").load("buildinginprogress.php")
}

function welcomepage()
{
  $("#contentDiv").load("welcome.php")
}
