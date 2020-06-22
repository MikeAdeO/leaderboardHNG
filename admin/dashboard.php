

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css"/>
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<html>
    <head>
        <title>Leadership Board</title>
    </head>
	
    <body>
        <h2 align="center">ADMIN DASHBOARD</h2>
        

		<hr>
		<div class="container">
				
			<div class="col-12" style='margin-bottom: 2%'>
				<font size='4px'><b><a href="dashboard.php" style='text-decoration: none'> Leader Dashboard</a>  &raquo; Internship</b></font><br>
			</div>
			
			
			<div class="col-12" style='margin-bottom: 2%'>
				<div class="table-responsive">
					<table class="table table-striped  table-bordered table-hover">
						<tr>
							<th>S/N</th>
							<th>Name</th>
							<th>Slack UserName</th>
							<th>Email</th>
							<th>Track</th>
							<th>Point</th>
							<th>Team</th>
							
						</tr>
						<tr>
						<?php
							$start_count = 1;
                            $allUser = scandir("db/interns/");
                           
                            $countAllUsers = count($allUser);
							
                           
							for($counter = 0; $counter < $countAllUsers; $counter++) {
                                $currentUser = $allUser[$counter]; 
                                
                              
								if(strlen($currentUser) > 5) { //To remove invalid account...
									//Open json file...
									$getFile = file_get_contents("db/interns/".$currentUser);
									
                                    $decodeResp = json_decode($getFile);
										
                                   

									?>
								
										<td><?php echo $start_count++;?></td>
										<td><?php echo $decodeResp->full_name;?></td>
										<td><?php echo $decodeResp->slack_username;?></td>
										<td><?php echo $decodeResp->email;?></td>
										<td><?php echo $decodeResp->track?></td>
										<td><?php echo $decodeResp->point?></td>
										<td><?php echo $decodeResp->team?></td>
										
							</tr>
							<?php	
							}
						} ?>
					</table>
				
				</div>
				<div>
					<a href="#" class="fa fa-facebook"></a>
					<a href="#" class="fa fa-twitter"></a>
				</div>
			</div>
			
			
				
			
	</body>
</html>