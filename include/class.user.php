<?php

include "db_config.php";

	class User{

		public $db;
		public function __construct(){
			$this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
			if(mysqli_connect_errno()) {
				echo "Error: kan niet met de database verbinden.";
				exit;
				}
		}

		/*** Registratie ***/
			public function reg_user($naam,$gebruikersnaam,$wachtwoord,$email){
				$wachtwoord = md5($wachtwoord);

				$sql="SELECT * FROM klanten WHERE gebruikersnaam='$gebruikersnaam' OR email='$email'";

				//checkt of gebruikersnaam of email in database zit
				$check =  $this->db->query($sql) ;
				$count_row = $check->num_rows;

				//Als gebruikersnaam of email niet in db zit insert
				if ($count_row == 0){
					$sql1="INSERT INTO klanten SET gebruikersnaam='$gebruikersnaam', wachtwoord='$wachtwoord', naam='$naam', email='$email'";
					$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
	        		return $result;
				}
				else { return false;}
		}

		/*** Login proces ***/
		public function check_login($email, $wachtwoord1){

      $wachtwoord2 = md5($wachtwoord1);
			$sql2="SELECT uid from klanten WHERE email='$email' or gebruikersnaam='$email' and wachtwoord='$wachtwoord2'";

			//checkt of de tabel bestaat
        	$result = mysqli_query($this->db,$sql2);
        	$user_data = mysqli_fetch_array($result);
        	$count_row = $result->num_rows;

	        if ($count_row == 1) {
	            $_SESSION['login'] = true;
	            $_SESSION['uid'] = $user_data['uid'];
	            return true;
	        }

	        else{
			    return false;
					}
    	}

    	/*** Naam laten zien ***/
    	public function naam_gebruiker($uid){
    		$sql3="SELECT naam FROM klanten WHERE uid = $uid";
	        $result = mysqli_query($this->db,$sql3);
	        $user_data = mysqli_fetch_array($result);
	        $naam = $user_data['naam'];
					echo ucfirst($naam);
    	}

    	/*** session***/
	    public function get_session(){
	        return $_SESSION['login'];
	    }

	    public function Gebruiker_uitloggen() {
	        $_SESSION['login'] = FALSE;
	        session_destroy();
	    }

	}



 ?>
