function validateForm()
{

var flag = 0;
console.log(flag);


var a = document.forms["myForm"]["name"].value;
  if (a == "") {
    alert("Name cannot be empty");
    flag = 1;
  }

  console.log(flag);

var b = document.forms["myForm"]["email"].value;
  if (b == "") {
    alert("Email cannot be empty");
    flag = 1;
  }

console.log(flag);

var c = document.forms["myForm"]["pass"].value;
var len = c.length;
  if (len < 8 || len > 32) {
    alert("password must be between 8 and 32 characters");
    flag = 1;
  }

var d = document.forms["myForm"]["pass2"].value;
  if (c != d) {
    alert("Password doesn't match");
    flag = 1;
  }

var e = document.forms["myForm"]["phone"].value;
  if (e == "") {
      alert("Phone cannot be empty");
      flag = 1;
    }
  if (isNaN(e)) {
    alert("Contact must be a number");
    flag = 1;
  }

console.log(flag);

if(flag == 0) return true;
//alert("Flag is zero!");
if(flag == 1) return false;

}
function validategameForm()
{
  var flag = 0;
  console.log(flag);

  var a = document.forms["myForm"]["name"].value;
    if (a == "") {
      alert("Name cannot be empty");
      flag = 1;
    }
    var len = a.length;
    if(len>45)
    {
      alert("Name cannot be more than 45 characters long");
      flag = 1;
    }



  var b = document.forms["myForm"]["year"].value;
    if (b == "") {
      alert("Year cannot be empty");
      flag = 1;
    }
    var len = b.length;
    if(len>4)
    {
      alert("Year cannot be more than 4 characters long");
      flag = 1;
    }




  var c = document.forms["myForm"]["price"].value;
  if (c == "") {
    alert("Price cannot be empty");
    flag = 1;
  }
  if (isNaN(c)) {
    alert("Price must be a number");
    flag = 1;
  }




  var d = document.forms["myForm"]["description"].value;
  if (d == "") {
    alert("Description cannot be empty");
    flag = 1;
  }
  var len = d.length;
  if(len>3000)
  {
    alert("Description cannot be more than 3000 character long");
    flag = 1;
  }

  var e = document.forms["myForm"]["availnum"].value;
  if (e == "") {
    alert("Availability cannot be empty");
    flag = 1;
  }
  if (isNaN(e)) {
    alert("Availability must be a number");
    flag = 1;
  }


  if(flag == 0) return true;
  //alert("Flag is zero!");
  if(flag == 1) return false;
}

