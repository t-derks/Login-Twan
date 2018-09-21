<?php

include_once 'include/class.user.php';
$user = new User();

 if (isset($_POST['submit'])){
  extract($_POST);
  $register = $user->reg_user($naam, $gebruikersnaam,$wachtwoord, $email);

   if ($register) {
     ?>
     <script type="text/javascript">
     alert("U kunt nu inloggen");
     window.location.href = "index.php";
     </script>
     <?php
   }
}

 ?>


 <script type="text/javascript" language="javascript">
  function submitreg() {
  var form = document.reg;
  if(form.naam.value == ""){
  alert( "Voer een naam in." );
  return false;
  }
  else if(form.gebruikersnaam.value == ""){
  alert( "Voer een gebruikersnaam in." );
  return false;
  }
  else if(form.wachtwoord.value == ""){
  alert( "Voer een wachtwoord in." );
  return false;
  }
  else if(form.email.value == ""){
  alert( "Voer een email in." );
  return false;
  }
  }
 </script>

 <head>
 <title>Register Twan</title>
 <link rel="stylesheet" type="text/css" href="css/style.css">
 <?php include_once "include/boostrap.html";?>
 </head>

 <div class="login-form">
 <form  method="post">
 <div class="avatar"><i class="material-icons">&#xE7FF;</i></div>
 <h4 class="modal-title">Hier kunt u een account aanmaken</h4>
 <div class="form-group">
 <input type="text"  name="naam" class="form-control" placeholder="Naam" required="required">
 </div>
 <div class="form-group">
 <input type="text"  name="gebruikersnaam" class="form-control" placeholder="Gebruikersnaam" required="required">
 </div>
 <div class="form-group">
 <input type="email"  name="email" class="form-control" placeholder="Email" required="required">
 </div>
 <div class="form-group">
 <input type="password" class="form-control"  name="wachtwoord" placeholder="Wachtwoord" required="required">
 </div>
 <input onclick="return(submitreg());" type="submit" name="submit" value="Register"  class="btn btn-primary btn-block btn-lg" >
 </form>
 <div class="text-center small"><a href="index.php">Heeft u al een account Klik hier!</a></div>
 </div>
