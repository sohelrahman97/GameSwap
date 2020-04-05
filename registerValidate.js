function validateForm()
{

var flag = 0;
console.log(flag);


var a = document.forms["myForm"]["name"].value;
  if (a == "") {
    alert("Name cannot be empty");
    flag = 1;
  }

  

var b = document.forms["myForm"]["email"].value;
  if (b == "") {
    alert("Email cannot be empty");
    flag = 1;
  }



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