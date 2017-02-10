<?php
	function wol($broadcast, $mac)
	{
		//mac address has 6 octets, split $mac into octets
		$mac_array = explode(':', $mac);
		$hwaddr = '';

		//paste octets back together without ':'
		foreach($mac_array AS $octet)
		{
			$hwaddr .= chr(hexdec($octet));
		}

		//create wol packet
		$packet = '';
		
		//add FFFFFFFFFFFF to the packet
		for ($i = 1; $i <= 6; $i++)
		{
			$packet .= chr(255);
		}

		//add the HW address 16 times (WOL protocol)
		for ($i = 1; $i <= 16; $i++)
		{
			$packet .= $hwaddr;
		}

		//create UDP socket over IPv4
		$sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
		
		//if the socket is created, set options for a broadcast
		if ($sock)
		{
			$options = socket_set_option($sock, 1, 6, true);

			//if options does not return false, send the WOL broadcast with the packet
			if ($options >=0) 
			{    
				$e = socket_sendto($sock, $packet, strlen($packet), 0, $broadcast, 7);
				socket_close($sock);
			}    
		}
	}
?>