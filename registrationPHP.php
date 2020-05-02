<?php 
	include("mysql.php");
	if($_SERVER["REQUEST_METHOD"] == "POST"){
        $uid = $_POST["userid"];
        $username = $_POST["username"];
		$email = $_POST["email"];
		$pass = $_POST["password"];
		$repass = $_POST["retype_password"];
		if(strlen($uid) < 3)
			$errorName = "Username Should be more than 3 character";
		if(strlen($pass) < 8){	
			$errorPass = "Password Should be of 8 characters";
			if(strcmp($pass,$repass) != 0)
				$errorRepass = "Password Doesnt Match";
		}
		if(checkEmailName($email,$uid) == 1)
			$errorE = "Username or Email Id already exists.";
		
		if($errorName == "" and $errorPass == "" and $errorRepass == "" and $errorE == ""){
            insertData($username, $uid, $email, md5($pass));
			session_destroy();
			session_start();
			$_SESSION['suname'] = $uid;
            $suname = $_SESSION["uname"];
            if ($_SESSION['suname'] == 'admin')
                header("Location: admin_panel.php");
            else
                header("Location: home.php");
		}
	}
?>