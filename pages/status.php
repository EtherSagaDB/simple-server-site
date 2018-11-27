<?php 
	include '../includes/config.php';
	$con = mysql_connect($dbhost, $dbuser, $dbpasswd) or die (mysql_error());
			mysql_select_db($dbname, $con) or die (mysql_error());
	$Result = MySQL_Query("SELECT zoneid FROM point WHERE  `zoneid` > -1");
	$Count = 0;
	
	$Result1 = MySQL_Query("SELECT * FROM users");
	$Count1 = 0;
	
	while ($Rows = MySQL_Fetch_Array($Result))
		{
			$Count++;
		}
	while ($Rows = MySQL_Fetch_Array($Result1))
		{
			$Count1++;
		}
	$Sockres = @FSockOpen($ServerIP, $gamePort, $errno, $errstr, 1);
	$Sockres2 = @FSockOpen($ServerIP, $jettyport, $errno, $errstr, 1);	
		if (!$Sockres) 
			{
				MySQL_Query("DELETE FROM online");
				$Count = 0;
				echo "<font color='white'>Server Status: </font><font color='red'><b>Offline</b></font>";	
				@FClose($Sockres);
				@FClose($Sockres2);	
			} 
		else 
			{
				@FClose($Sockres);
				@FClose($Sockres2);
				echo "<font color='white'>Server Status: </font><font color='lime'><b>Online</b></font>";
			}	
	echo "<font color='white'><br>Registered Users: ".$Count1;
	echo "<br>Users Online:     ".$Count."</font>";
?>


	
