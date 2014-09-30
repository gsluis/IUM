session_start(); // sessie beginnen
// controleren of pagina correct is aangeroepen.
if (!empty($_POST))
{
	//Make connection to database
            require_once("inc_Connection_DB_ium.php");
	
	$sql = "SELECT * FROM Users 
				WHERE email='" . $_POST["email"] ."' 
				AND password='". $_POST["password"]. "'"; 
	$rs = $conn->query($sql);
	//Check if SQL statement on check existing email was succesfull 
            If ($rs === false)
                {
                   trigger_error('Wrong SQL: ' .$sql . 'Error: ' . $conn->error, E_USER_ERROR);
                    die();
                } ;
		
		
	If (Mysqli_num_rows($rs)>0)
	{
		// email address found, register
					$_SESSION['username']=$_POST["email"];
					$_SESSION['password']=$_POST["password"]; 
		
		//Retrieve record values to check if user is already approved          
		$arr=$rs->fetch_array(MYSQLI_ASSOC);
		if ($arr['approved'] =="Y")
			{
				// Send to protected site
				header("Location: monitor_Overview_ium.php"); 
				exit();
			}
		else
			{
				// invalid combination
			$text = "Je account is nog niet vrijgegeven door de Webmaster. Je krijgt asap via mail bericht.<br>
					<a href=\"login_ium.php\">Log opnieuw in</a><br>
					<a href=\"register_ium.php\">Meld je aan</a><br>";
				die("<center>" . $text);	
			}
	}
	else
	{
			// invalid combination
  		$text = "Je hebt een verkeerde combinatie van email adres / wachtwoord ingegeven: <br>
				<a href=\"login_ium.php\">Log opnieuw in</a><br>
				<a href=\"register_ium.php\">Meld je aan</a><br>";
			die("<center>" . $text);
				}
}

else
{
	// page was called incorrectly goto login.php
	header("Location: login_ium.php"); 
}
?>
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
