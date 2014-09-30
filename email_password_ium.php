<!DOCTYPE html>

<html lang='en'>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="styles/ium.css"
	media="screen" />
</head>

<body>
<header>     
        In- en Uitstroommonitor : Wachtwoord vergeten
</header>
    
<div class="menu">
        <?php
        // To be used in screens where it makes sence to have a menu.
        ?>
</div>
<div class="content">  	        
<?php
	if (!empty($_POST))
	{
			//Make connection to database
			include("inc_Connection_DB.php");
		
			// Compose query and run
			$sql = "SELECT * FROM Users WHERE email='". $_POST["email"] ."'"; 
			$rs = $conn->query($sql);
		    
			//Check if SQL statement on correct email/password was succesfull 
			If ($rs === false)
			    {trigger_error('Wrong SQL: ' .$sql . 'Error: ' . $conn->error, E_USER_ERROR); die();} 
			    			    
			// controleren of mail-adres is gevonden
			If (Mysqli_num_rows($rs)==1)
				{
					//Retrieve values record found          
				        $arr=$rs->fetch_array(MYSQLI_ASSOC);
					$receiver = $arr['email'];
					$password = $arr['password'];
				
					// compose message 
					/*$subject = "Your password";
					$msg = "Hello, \n\n";
					$msg .= "you have requested your password to be sent to you.\n\n";
					$msg .= "Your password: " . $password ."\n\n";
					$msg .= "with kind regards,\n\n";
					$msg .= "your Webmaster.";
					$headers = 'From: <webmaster@example.com>';
					$extra = "X-MAILER: PHP/version " .phpversion();
					*/
					
					//HTML variant of mail
					
						$receiver = $arr['email'];
						$subject = "Je wachtwoord";
						$headers = "From: <webmaster@example.com>" . "\r\n";
						$headers .= "Reply-To: <webmaster@example.com>" . "\r\n";
						$headers .= "MIME-Version: 1.0\r\n";
						$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
						$extra = "X-MAILER: PHP/version " .phpversion();
						
						$msg = '<html><body>';
						$msg .= '<h1>Hallo!</h1><br>';
						$msg .= 'Je hebt gevraagd om je wachtwoord naar je te sturen. <br><br>';
						$msg .= 'je wachtwoord is:' .$password .'<br><br>';
						$msg .= 'met vriendelijke groeten<br><br>';
						$msg .= 'de Webmaster';
						$msg .= '</body></html>';
					
			
					// send the email and present error message if necessary 
						if (!mail($receiver, $subject, $msg, $headers))
							{
							$text = "Er ging iets mis in het versturen van de mail. Probeer opnieuw";
							print($text);
							}
							else
							{
							       print("<center>Uw wachtwoord is verstuurd!!! Ga terug naar <a href=\login_ium.php>Inloggen</a>");
							       print("<br/>");
							       print("<br/>");
							}
							die(); 
				}
			else
						{
							// No: email address not found: show error message
							$text = "Dit email adres  (<b>". $_POST["email"] . "</b>) komt 
							 niet voor in onze database<br>\n
							<a href=\"" . $_SERVER["PHP_SELF"] ."\">Ander email adres</a>";
							die ($text);
						}
	}
	else
	
	{
	}
	
	?>
	
		<form name="form1" method="post" action="<?php echo($_SERVER["PHP_SELF"]);?>">
				<nav>
					Vul je email-adres in: <input type="Text" name="email" id="email" size="30" class="large"  placeholder="email address">
				</nav>
				<nav>
			                <input type="submit" name="Submit" value="Submit">
					<input type="button" value="Back" onclick="javascript:history.back();">
				</nav>
		</form>
		</div>
<div class="right">
        <?php
        // To be used in screens where it makes sence to have a menu right side.
        ?>
</div>
    
<footer>
        powered by <a href='sluisitconsultancy.nl' title ="Homepage" id = "logo"><img src="img/Logo_gerton_FINAL.jpg" align="center" width="200" height="50"></a> 


</footer>
</body>
</html>
