<?php
	/*
		About this script
		purpose: sending WOL packets to $server["name"] with $server["mac"] on broadcastaddress $broadcast.
		Author: internet, cleaned up & improved by Dennis Van Elst
	*/

	require "./functions/wol.php";
	
	if(isset($_POST["macaddress"]) && isset($_POST["broadcastaddress"]))
	{
		//validate inputs
		$macaddress = trim($_POST["macaddress"]);
		$macaddress = stripslashes($macaddress);
		$macaddress = htmlspecialchars($macaddress);
		
		//validate inputs
		$broadcastaddress = trim($_POST["broadcastaddress"]);
		$broadcastaddress = stripslashes($broadcastaddress);
		$broadcastaddress = htmlspecialchars($broadcastaddress);
		
		//future: check mac & broadcast with regex
		
		wol($broadcastaddress, $macaddress);
	}
?>
