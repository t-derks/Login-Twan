<?php

session_start();
	include_once 'include/class.user.php';
	$user = new User();

	if (isset($_REQUEST['submit'])) {
		extract($_REQUEST);
	    $login = $user->check_login($email, $wachtwoord);
	    if ($login) {
	        // login Success
	       header("location:home.php");
	    } else {
				?>
					<script type="text/javascript" language="javascript">
								alert( "Uw wachtwoord of gebruikersnaam klopt niet" );
					</script>
				<?php
	    }
	}

 ?>

<script type="text/javascript" language="javascript">
	function submitlogin() {
		var form = document.login;
		if(form.email.value == ""){
			alert( "Voer een email of gebruikersnaam in." );
			return false;
		}
		else if(form.wachtwoord.value == ""){
			alert( "Voer een wachtwoord in." );
			return false;
		}
	}

</script>

<div class="login-form">
<form  method="post">
<div class="avatar"><i class="material-icons">&#xE7FF;</i></div>
<h4 class="modal-title">U kunt nu inloggen</h4>
<div class="form-group">
<input type="text"  name="email" class="form-control" placeholder="Gebruikersnaam" required="required">
</div>
<div class="form-group">
<input type="password" class="form-control"  name="wachtwoord" placeholder="Wachtwoord" required="required">
</div>
<div class="form-group small clearfix">
<label class="checkbox-inline"><input type="checkbox"> Onthouden</label>
<a href="#" class="forgot-link">Wachtwoord vergeten?</a>
</div>
<input  onclick="return(submitlogin());" type="submit" name="submit" class="btn btn-primary btn-block btn-lg" value="Login">
</form>
<div class="text-center small">Geen account? <a href="register">Registeer nu</a></div>
</div>
