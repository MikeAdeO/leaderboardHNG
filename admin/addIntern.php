

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css"/>

<html>
    <head>
        <title>Add Intern</title>
    </head>
	
    <body>
        <h2 align="center">ADMIN DASHBOARD</h2>
        

		<hr>
		<div class="container">
				
				<div class="col-12" style='margin-bottom: 2%'>
					<font size='4px'><b><a href="dashboard.php" style='text-decoration: none'>Dashboard</a>  &raquo; Add User</b></font><br>
					<font color='red'><b>Note: </b></font> All account created by admin are created with a default password of <b>12345</b>
				</div>
				
				<?php 
				$gender = ''; $designation = ''; $accntType = '';
				if(isset($_POST["addIntern"])) {
					$full_name = $_POST["full_name"];
					$slack_username = $_POST["slack_username"];
					$email = strtolower($_POST["email"]);
					$track = strtolower($_POST["track"]);
					$point= strtolower($_POST["point"]);
					$team = strtolower($_POST["team"]);
					
					//We need to open the location of where files are been stored to...
					$allInterns = scandir("db/interns/");
					$countAllInterns = count($allInterns);
					
					
					$InternObject = [
						"id" => 1,
						"full_name" => $full_name,
						"slack_username" => $slack_username,
						"email" => $email,
						"track" => $track,
						"point" => $point,
						"team" => $team
						
					]; 
					
					$exist = 0; //exist counter...
					
					//Check if user exist
					for($counter = 0; $counter < $countAllInterns; $counter++){
						$currentIntern = $allInterns[$counter];
						
						if($currentIntern == $email . ".json"){
							echo "Registration failed, Intern already exist";
							$exist++;
						}
						
					}
					
					if($exist == 0) {
						if(file_put_contents("db/interns/".$email . ".json",json_encode($InternObject))) { // Intern added...
							echo "<div class='alert alert-success'>Intern added successfully</div>";
							
							//We need to remove input values since registration as successful..
							unset($full_name); unset($slack_username); unset($email);
							unset($track); unset($point); unset($team); 
						} else {
							echo "you cannot add this intern, please retry";
						}
					}
					
					
				}
				
				?>
				
				<form method="post">
					<div class="row">
						
						<div class="col-12" style='margin-bottom: 2%'>
							<label for='first_name'><b>First Name</b></label>
							<input type="text" name="full_name" id="first_name" value="<?php if(isset($full_name)) { echo $full_name; } ?>" class="form-control" placeholder="Enter Intern full name" required>
						</div>
						
						<div class="col-12" style='margin-bottom: 2%'>
							<label for='last_name'><b>Slack Username</b></label>
							<input type="text" name="slack_username" id="last_name" value="<?php if(isset($slack_username)) { echo $slack_username; } ?>" class="form-control" placeholder="Enter Intern Slack name" required>
						</div>
						
						<div class="col-12" style='margin-bottom: 2%'>
							<label for='email'><b>Email Address</b></label>
							<input type="email" name="email" id="emailaddr" value="<?php if(isset($email)) { echo $email; } ?>" class="form-control" placeholder="Enter Email " required>
						</div>
						
						<div class="col-6" style='margin-bottom: 2%'>
							<label for='gender'><b>Track</b></label>
							<select name="track" id="gender" class="form-control" required>
								<option value=""> -- Select --</option>
								<option value="Backend">Backend</option>
								<option value="Frontend">Frontend</option>
								<option value="Design">Design</option>
							</select>
						</div>
						
						<div class="col-6" style='margin-bottom: 2%'>
								<label for='email'><b>Point</b></label>
							<input type="text" name="point" id="emailaddr" value="<?php if(isset($point)) { echo $point; } ?>" class="form-control" placeholder="Enter intern Point " required>
						
						</div>
						<div class="col-6" style='margin-bottom: 2%'>
							<label for='email'><b>Team</b></label>
							<input type="text" name="team" id="emailaddr" value="<?php if(isset($team)) { echo $team; } ?>" class="form-control" placeholder="Enter intern Point " required>
						
						</div>
						
						
						
						
							
						<div class="col-12" style='margin-bottom: 2%'>
							<button class='btn btn-primary btn-lg btn-block' type='submit' name='addIntern'><b>Add intern</b></button>
						</div>
					</div>
				</form>
				
		</div>
				
			
	</body>
</html>