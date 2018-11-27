<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php include 'includes/config.php'; ?>
<html>
	<title>Ether Saga Odyssey</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
	<link rel='stylesheet' type='text/css' href='/includes/style.css' />
	<link rel="icon" type="image/png" href="/img/favicon.png">



<body>
<script src="/includes/jquery-1.7.2min.js"></script>

<script type="text/javascript">

$(document).ready(function() {

$.ajaxSetup({ cache: false }); 
setInterval(function(){

$("#info").load('pages/status.php');
$("#time").load('pages/time.php');
}, 1000);
});
</script>

<img src="/img/header.png"/>
	<div id="form"> 
     <form method="post" name=f1 id="nav" action=''><input type="hidden" value="submit">  
	 <input type="submit" id="btn" name="home" value="HOME" /> </form>
	 <form method="post" name=f1 id="nav1" action='index.php'><input type="hidden" value="submit">
	 <input type="submit" id="btn" name="reg" value="REGISTER" /> </form>
	 <form method="post" name=f1 id="nav2" action='index.php'><input type="hidden" value="submit">
	 <input type="submit" id="btn" name="cash" value="ADD CASH" /> </form>
	 <form method="post" name=f1 id="nav3" action='index.php'><input type="hidden" value="submit">
	 <input type="submit" id="btn" name="gm" value="ADD GM" /> </form>
	 </div>

<div class="status" style="width:200px">
	<div id="info"><?php include_once "pages/status.php"; ?></div>

	<div id="time"><div id="title"><font color="white"><br>Server Time:</div><font color="FFCC66"> <div id="time2"><?php echo date('g:i:s a');?></font></div></div>
</div>

<div id="content">
<?php

$home = $_GET['home'];

if(!$_POST){
include "pages/context.php"; 
include "pages/slide.php";
} 
if(isset($_POST['home'])){
include "pages/context.php"; 
include "pages/slide.php";
}

if(isset($_POST['reg'])){
?>
<center>
<form method="post" id="box" name=f1 action=''><input type="hidden" value="submit"> 
		<br /><br />
        <label for="username"><font color='white'>Username</font> </label><br> <input id="username" name="login" size="30" type="text" /><br>
        <label for="password"><font color='white'>Password </font></label><br> <input id="password" name="passwd" size="30" type="password" /><br> 
        <label for="rpassword"><font color='white'>Repeat Password</font> </label><br> <input id="rpassword" name="repasswd" size="30" type="password" /><br>
        <label for="email"><font color='white'>Email</font> </label><br> <input id="email" name="email" size="30" type="text" /><br><br>
        <input type="submit" name="regsub" id="btn2" value="Register" /> 
</form>

<?php
}

if (isset($_POST['regsub'])) 
	{ 
		
		$con = mysql_connect($dbhost, $dbuser, $dbpasswd) or die (mysql_error());
			mysql_select_db($dbname, $con) or die (mysql_error());
		
		$Login = $_POST['login']; 
		$Pass = $_POST['passwd']; 
		$Repass = $_POST['repasswd']; 
		$Email = $_POST['email']; 
		 
		$Login = StrToLower(Trim($Login)); 
		$Pass = StrToLower(Trim($Pass)); 
		$Repass = StrToLower(Trim($Repass)); 
		$Email = Trim($Email);
 
	if (empty($Login) || empty($Pass) || empty($Repass) || empty($Email))
		{ 
			echo '<center>';
			include 'pages/reg.php';
			echo "<br /><font color='red'>Please complete all fields.</font></center><br />"; 
		}       
	elseif (ereg("[^0-9a-zA-Z_-]", $Login, $Txt))
		{ 
			echo "<center>";
			include 'pages/reg.php';
			echo "<br /><font color='red'>Username contains illegal characters.</font></center><br />"; 
		}             
	elseif (ereg("[^0-9a-zA-Z_-]", $Pass, $Txt))
		{ 
			echo "<center>";
			include 'pages/reg.php';
			echo "<br /><font color='red'>Password contains illegal characters.</font></center><br />";  
		} 
	elseif (ereg("[^0-9a-zA-Z_-]", $Repass, $Txt))
		{ 
			echo "<center>";
			include 'pages/reg.php';
			echo "<br /><font color='red'>Password contains illegal characters.</font></center><br />";  
		} 
	elseif (StrPos('\'', $Email))
		{ 
			echo "<center>";
			include 'pages/reg.php';
			echo "<br /><font color='red'>Email contains illegal characters.</font></center><br />";     
		}     
	else 
		{ 
			$Result = MySQL_Query("SELECT name FROM users WHERE name='$Login'") or ("Can't execute username check.");                 
	if (MySQL_Num_Rows($Result)) 
		{ 
			echo "<center>";
			include 'pages/reg.php';
			echo "<br /><font color='red'>Username <b>".$Login."</b> has already been registered.</font></center><br />"; 		
		} 
	elseif ((StrLen($Login) < 4) or (StrLen($Login) > 10))
		{ 
			echo "<center>";
			include 'pages/reg.php';
			echo "<br /><font color='red'>Username is too short. Must be between 4 and 10 characters.</font></center><br />"; 
		} 
	elseif ((StrLen($Pass) < 4) or (StrLen($Pass) > 10))
		{ 
			echo "<center>";
			include 'pages/reg.php';
			echo "<br /><font color='red'>Password is too short. Must be between 4 and 10 characters.</font></center><br />"; 	
		} 
	elseif ((StrLen($Repass) < 4) or (StrLen($Repass) > 10))
		{ 
			echo "<center>";
			include 'pages/reg.php';
			echo "<br /><font color='red'>Password is too short. Must be between 4 and 10 characters.</font></center><br />";
		} 
	elseif ((StrLen($Email) < 4) or (StrLen($Email) > 25))
		{ 
			echo "<center>";
			include 'pages/reg.php';
			echo "<br /><font color='red'>Email is too short. Must be between 4 and 25 characters.</font></center><br />"; 
		} 
	elseif ($Pass != $Repass)
		{ 
			echo "<center>";
			include 'pages/reg.php';
			echo "<br /><font color='red'>Passwords do not match.</font></center><br />";
		}         
	else 
		{ 
			$Salt = $Login.$Pass; 
			$Salt = md5($Salt); 
			$Salt = "0x".$Salt;
			MySQL_Query("call adduser('$Login', $Salt, '0', '0', '0', '0', '$Email', '0', '0', '0', '0', '0', '0', '0', '', '0', $Salt)") or die ("Can't execute query.");
		
			echo "<br /><center><font color='white'>Username <b>".$Login."</b> created successfully!</font></center><br />"; 
			#call id from new account
			$lookup = mysql_query("SELECT ID FROM users WHERE name='$Login'") 
			 or die(mysql_error());
			 $info = mysql_fetch_array( $lookup );
			echo "<center><font color='white'>User ID is: <b>".$info['ID'] . " </b></font></center><br />";
			mysql_close($con);
			
		}         
	}     
}    
if(isset($_POST['cash'])){
?>
<form method="post" id="box" name=f1 action=""><input type="hidden" value="submit"><br><br><br><br><br>
	<center><font color="white">Enter Admin password</font><br>
	<input id="adminpass" name="adminpass"  size="10" type="password"/><br><br>
	<input type="submit" name="cashadd" id="btn2" value="Submit" /> 
	</center>
</form>
<?php
}

if(isset($_POST['cashadd']))
{
	if($adminpass!=$_POST['adminpass'])
	{
	echo "<div id='box'><br><br><br><br><br><br><br><center><font color='red' size='6'>Admin password was wrong.</font></center></div>";
	}
	else
	{
	?>
	<form method="post" id="box" name=f1 action=""><input type="hidden" value="submit"><br><br><br>
	<center><font color="white">ADD E-Bucks</font><br> 
	<label for="userid"><font color='white'>User ID</font></label><br><input id="userid" name="userid" maxlength="3" size="7" type="text"/><br> 
	<label for="ebuck"><font color='white'>E-buck Amount</font></label><br><input id="ebuck" name="ebuck" maxlength="7" size="7" type="text"/><br><br>
	<input type="submit" name="cashsub" id="btn2" value="Submit" /> 
	</center>
	</form>
	<?php
	}
}
if (isset($_POST['cashsub'])) 
	{ 

			$con = mysql_connect($dbhost, $dbuser, $dbpasswd) or die (mysql_error());
			mysql_select_db($dbname, $con) or die (mysql_error());

			$userid = $_POST['userid']; 
			$ebuck = $_POST['ebuck']; 
			$ecent = "00"; 
			$total = "".$ebuck."".$ecent."";
      
		if (empty($userid) || empty($ebuck))
		{ 
			include 'pages/cash.php';
			echo "<br /><center><font color='red'>Please complete all fields.</font></center><br />"; 
		}	
		else
		{
			MySQL_Query("call usecash('".$userid."',1,0,14,0,'".$total."',1,@error)") or die (mysql_error());
			echo "<div id='box'><br /><br /><br /><br /><br /><br /><center><font color='white'>Success</font><br><font color='white'>$ebuck E-Bucks added for user $userid</font></center><br /></div>";
			mysql_close($con);
		}
	}

if(isset($_POST['gm'])){
?>
<form method="post" id="box" name=f1 action=""><input type="hidden" value="submit"><br><br><br><br><br>
	<center><font color="white">Enter Admin password</font><br>
	<input id="adminpass" name="adminpass"  size="10" type="password"/><br><br>
	<input type="submit" name="gmadd" id="btn2" value="Submit" /> 
	</center>
</form>
<?php
}
if(isset($_POST['gmadd']))
{
	if($adminpass!=$_POST['adminpass'])
	{
	echo "<div id='box'><br><br><br><br><br><br><br><center><font color='red' size='6'>Admin password was wrong.</font></center></div>";
	}
	else
	{
	?>
<form method="post" name=f1 id="box" action=''><input type="hidden" value="submit"> <br><br><br><br>
	<center><font color="white">ADD GM</font><br> 
	<label for="gmid"><font color='white'>User ID</font></label><br><input id="gmid" name="gmid" size="10" type="text"/><br> <br>
	<input type="submit" name="gmsub" id="btn2" value="Submit" /> 
	</center>
</form>
	<?php
	}
}
if (isset($_POST['gmsub'])) 
	{ 

			$con = mysql_connect($dbhost, $dbuser, $dbpasswd) or die (mysql_error());
			mysql_select_db($dbname, $con) or die (mysql_error());

			$gmid = $_POST['gmid']; 
			
		if (empty($gmid))
		{ 
			include 'pages/gm.php';
			echo "<br /><center><font color='red'>Please Enter an ID</font></center><br />"; 
		}	
		else
		{
			MySQL_Query("call addGM($gmid,1)") or die (mysql_error());
			echo "<div id='box'><br /><br /><br /><br /><br /><br /><center><font color='white'>Success</font><br><font color='white'>$gmid is now a <font color='red'>GM</font></center><br /></div>";
			mysql_close($con);
		}
	}
	
?>
</center>
</div>

<div id="footer"><img src="/img/footer.png"/></div>

</body>
</html>