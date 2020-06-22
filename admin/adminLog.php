<?php
session_start();
	 // print_r($_POST);
	 // die();

	
	$errorCount = 0;
	$email = $_POST["email"] != "" ? $_POST["email"] : $errorCount++;
	$password =  $_POST["password"] !="" ? $_POST["password"] : $errorCount;
	
	$_SESSION["email"] = $email;
	 
	 
	if($errorCount > 0){
			echo "errors in your input";
		header("Location: index.php");
	}else{
		$allUsers = scandir("db/");
		
		
		
		
		$countAllUsers = count($allUsers);
		
		
		for($counter= 0; $counter < $countAllUsers ; $counter++){
			$currentUser = $allUsers[$counter];
			
				if($currentUser == $email. ".json"){
					$userString = file_get_contents("db/".$currentUser);
					$userObject = json_decode($userString);
					$passwordFromDB = $userObject->password;
					 
					$passwordFromUser = password_verify($password,$passwordFromDB );
					if($passwordFromDB == $passwordFromUser){
						header("Location:dashboard.php");
						// redirect to dashboard
						// $_SESSION["loggedIN"]= $userObject-> email;
						// $_SESSION["email"]= $userObject-> email;
						
						// $_SESSION["email"]= $userObject->email;
						// if($userObject->email > 0){ #ot a member...
							
						// } else {
							// $_SESSION["error"] = "Unauthorized access, you are not an admin";
						// }
						
					} else {
						echo "invalid password";
					}
					
				} else { //Email not found
					echo "invalid email address";
				}
		}
		
		header("Location: dashboard.php");
		die();
	}
  ?>	