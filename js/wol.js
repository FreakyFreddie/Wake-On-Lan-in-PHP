$(document).ready(function()
{
	$("#wolserver").click(function()
	{
		if($("#WakeOnLan").val() != "" && $("#BroadCast").val() != "")
		{
			var macaddress = $("#WakeOnLan").val();
			var broadcastaddress = $("BroadCast").val();
			
			//prepare request
			$request = $.ajax({
				method: "POST",
				url: "AJAX/sendWol.php?r=" + new Date().getTime(),
				data: {
					macaddress: macaddress,
					broadcastaddress: broadcastaddress
				}
			});

			$request.done(function()
			{
				//display message when project is successfully added
				$('<div class="navbar-fixed-bottom alert alert-success"> <strong>Succes</strong> Wol packet sent.</div>').insertBefore($("footer")).fadeOut(2000, function()
				{
					$(this).remove();
				});
			});
		}
	});
});