<?php
      if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="UTF-8">
    <title>Wijzigen studentgegevens</title>
    <link rel="stylesheet" type="text/css" href="styles/ium.css"
	media="screen" />
</head>
<body>
<header>     
            In- en Uitstroommonitor :  Wijzigen studentgegevens
</header>
    
<div class="menu">
        <?php
        // To be used in screens where it makes sence to have a menu.
        ?>
</div>
        
    
<div class="content">  
<?php
   
    //fill user from session information
    $user = $_SESSION["username"];
    
     //fill current date
    $date = date('Y-m-d H:i:s');
    
    //Make connection to database
    require_once("inc_Connection_DB_ium.php");

    //Retrieve Update Form values from Update_Grades.php
    $id=$_REQUEST['id'];
    $voornaam=$_REQUEST['Voornaam'];
    $achternaam=$_REQUEST['Achternaam'];
    $bsn=$_REQUEST['BSN'];
    $postcode=$_REQUEST['Postcode'];
    $geslacht=$_REQUEST['Geslacht'];
    $geboortedatum=$_REQUEST['Geboortedatum'];
    $inschrijfdatum=$_REQUEST['Inschrijfdatum'];
    $woonsituatie=$_REQUEST['Woonsituatie'];
    $etnischeafkomst=$_REQUEST['Etnischeafkomst'];
    
    
    
    //Perform MYSQL update 
    $sql = "UPDATE Students SET Voornaam = '". $voornaam."', Achternaam = '". $achternaam."', Postcode = '". $postcode."', Geslacht = '". $geslacht."', Geboortedatum = '". $geboortedatum."',
    Inschrijfdatum = '". $inschrijfdatum."', Woonsituatie = '". $woonsituatie."', Etnischeafkomst ='".$etnischeafkomst."', BSN = '".$bsn."',Gebruiker = '". $user ."',  modDate = '" .$date ."'  WHERE Id = '".$id. "';";
    
    
    //Check if SQL statement was succesfull 
    if ($conn->query($sql) == false)
        {
            trigger_error('Wrong SQL: ' . $sql . 'Error: '.$conn->error,E_USER_ERROR);
        }
    else
        {
            //Present the details on update action
            /*$affected_rows=$conn->affected_rows;
            print("<br/><b><center>SQL Statement:</center></b><br/>");
            print("<center>'".$sql ."<br/> </center>");
            print("<br/>");
            print("<br/><center>was performed succesfully. Affected rows: " .$affected_rows );
            */
            print("<br/>");
            print("<br/><center>Gegevens van student ".$voornaam ." " .$achternaam . " zijn succesvol opgeslagen.");
              
        }
    $conn->close();
    
?>
        <nav>
            <a href='monitor_Overview_ium.php'>In- en Uitstroommonitor Overzicht</a>
            <a href='logout_ium.php'>Uitloggen</a>
        </nav>

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
