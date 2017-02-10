<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="">
		<meta name="author" content="">
		<!--  <link rel="icon" href="../../favicon.ico"> -->

		<title>
			Control Panel
		</title>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Custom styles for this template -->
		<link href="./css/main.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<!-- include jquery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	</head>
	<body>
		<div class="container text-center">
			<div class="row">
				<div class="main">
					<h2>Control panel</h2>
				</div>
			</div>
			<div class="row">
				<form role="form">
					<div class="col-sm-2">
					</div>
					<div class="form-group col-sm-4">
						<label for="BroadCast" class="sr-only">
							Enter broadcast:<br />
						</label>
						<input class="form-control" id="BroadCast" placeholder="broadcast ip" />
					</div>
					<div class="form-group col-sm-4">
						<label for="WakeOnLan" class="sr-only">
							Select a machine to wake:<br />
						</label>
						<select class="form-control" name="WakeOnLan" id="WakeOnLan">
							<option value="">Select Machine</option>
							<?php
								//read all entries of file into $servers array
								$file = fopen("servers.txt", "r") or die("Unable to open file!");
								$servers = array();
								
								//read first line into fake variable
								$throwinbin = fgets($file);
								
								$i = 0;
								
								while(!feof($file))
								{
									$tempserver = explode(" ", fgets($file));
									$servers[$i]["mac"] = $tempserver[0];
									
									if(isset($tempserver[1]))
									{
										$servers[$i]["name"] = $tempserver[1];
										
										if(isset($tempserver[2]))
										{
											$servers[$i]["ip"] = $tempserver[2];
										}
									}
									
									$i++;
								}
								
								//close the file
								fclose($file);
								
								foreach($servers as $server)
								{
									if(isset($server["ip"]) && isset($server["name"]))
									{
										echo '<option value="'.$server["mac"].'">'.$server["name"].' '.$server["ip"].'</option>';
									}
									else
									{
										echo '<option value="'.$server["mac"].'">'.$server["name"].'</option>';
									}
								}
							?>
						</select>
					</div>
					<div class="form-group col-sm-1">
						<input type="button" class="btn btn-primary" id="wolserver" value="Wake" />
					</div>
				</form>
			</div>
		</div>
	</body>
</html>