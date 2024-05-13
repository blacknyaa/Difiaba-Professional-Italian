<?php 

require_once "backend/session.php";


if ($login) {

  if($_SESSION['level'] == 'user') {
    header("Location: index.php");
  } else {
    header("Location: a/dashboard.php");
  }

} else {

?>

<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script
   src="https://kit.fontawesome.com/64d58efce2.js"
   crossorigin="anonymous"
  ></script>
  <link rel="stylesheet" href="login.css" />
  <title>Sign in & Sign up Form</title>
 </head>

 <body>
  <div class="container">
   <div class="forms-container">
    <div class="signin-signup">
     <form method="post" class="sign-in-form" id="signin">
      <h2 class="title">Sign in</h2>
      
      <p  class="danger" id="login-error"></p>
      <div class="input-field">
       <i class="fas fa-user"></i>
       <input type="text" placeholder="Email" id="lgnemail"/>
      </div>
      
      <p  class="danger" id="email-error2"></p>
      <div class="input-field">
       <i class="fas fa-lock"></i>
       <input type="password" placeholder="Password" id="lgnpass" />
      </div>
      
      <p  class="danger" id="pass-error2"></p>
      <input type="button" class="btn" onclick="submitForm2()" value="Sign In" />
     </form>
     <form method="post" class="sign-up-form" id="signup" enctype="multipart/form-data">
      <h2 class="title">Sign up</h2>
      <div class="input-field">
       <i class="fas fa-user"></i>
       <input type="text" placeholder="First Name" id="firstname"/>
       
      </div>
        <p  class="danger" id="fname-error"></p>
      <div class="input-field">
       <i class="fas fa-user"></i>
       <input type="text" placeholder="Last Name" id="lastname"/>
      </div>
        <p  class="danger" id="lname-error"></p>
      <div class="input-field">
       <i class="fas fa-phone"></i>
       <input type="text" placeholder="Phone Number" id="phone"/>
      </div>
        <p  class="danger" id="phone-error"></p>
      <div class="input-field">
       <i class="fas fa-envelope"></i>
       <input type="email" placeholder="Email" id="email"/>
      </div>
        <p  class="danger" id="email-error"></p>
      <div class="input-field">
       <i class="fas fa-lock"></i>
       <input type="password" placeholder="Password" id="password"/>
      </div>
        <p  class="danger" id="pass-error"></p>
      <input type="button" class="btn" onclick="submitForm()" value="Sign up" />
     </form>
    </div>
   </div>

   <div class="panels-container">
    <div class="panel left-panel">
     <div class="content">
      <h3>New here ?</h3>
      <p>
       Hello! If you don't have an account or you are a new user kindly sign up here.
       <br>Stay pretty girl!
      </p>
      <button class="btn transparent" id="sign-up-btn">Sign up</button>
     </div>
     <img src="images/log.svg" class="image" alt="" />
    </div>
    <div class="panel right-panel">
     <div class="content">
      <h3>One of us ?</h3>
      <p>
       Already have an account? Sign In here. <br> Stay pretty girl!
      </p>
      <button class="btn transparent" id="sign-in-btn">Sign in</button>
     </div>
     <img src="images/register.svg" class="image" alt="" />
    </div>
   </div>
  </div>
  <script src="js/app.js"></script>
<script>

function submitForm() {

  var formData = {
      firstname: document.getElementById("firstname").value,
      lastname: document.getElementById("lastname").value,
      phone: document.getElementById("phone").value,
      email: document.getElementById("email").value,
      password: document.getElementById("password").value,
  };
  console.log(formData);
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "backend/api.php", true);
  xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8;multipart/form-data");
  xhr.onreadystatechange = function () {
    
      if (xhr.readyState === 4 && xhr.status === 200) {

          var response = JSON.parse(xhr.responseText);

          document.getElementById("fname-error").innerHTML = response.firstname;
          document.getElementById("lname-error").innerHTML = response.lastname;
          document.getElementById("email-error").innerHTML = response.email;
          document.getElementById("pass-error").innerHTML = response.password;
          document.getElementById("phone-error").innerHTML = response.phone;
          
          if(response.validate == "exists") {
            document.getElementById("email-error").innerHTML = response.count;
          }

          if(response.success == "success") {
            alert(response.count);
            window.location.href = "login.php"
          }

          console.log(response.count);console.log(xhr.responseText);
      }
      console.log(xhr.responseText);
  };
  xhr.send(JSON.stringify(formData));


}

function submitForm2() {

var formData = {
    email: document.getElementById("lgnemail").value,
    password: document.getElementById("lgnpass").value,
};
console.log(formData);
var xhr = new XMLHttpRequest();
xhr.open("POST", "backend/login-api.php", true);
xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8;multipart/form-data");
xhr.onreadystatechange = function () {
  
    if (xhr.readyState === 4 && xhr.status === 200) {

        var response = JSON.parse(xhr.responseText);

        document.getElementById("login-error").innerHTML = response.login;
        document.getElementById("email-error2").innerHTML = response.email;
        document.getElementById("pass-error2").innerHTML = response.password;

        if(response.success == "success") {
          alert("Login Successfuly");

          if(response.level === 'user') {

            window.location.href = "index.php";

          } else {

            window.location.href = "a/dashboard.php";

          }
          
        }

        console.log(response.count);console.log(xhr.responseText);
    }
    console.log(xhr.responseText);
};
xhr.send(JSON.stringify(formData));


}

</script>
 </body>
</html>


<?php 

}

?>