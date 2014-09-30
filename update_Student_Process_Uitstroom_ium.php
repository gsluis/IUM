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
    <title>Wijzigen Uistroomsgegevens student</title>
    <link rel="stylesheet" type="text/css" href="styles/ium.css"
	media="screen" />
</head>
<body>
<header>     
            In- en Uitstroommonitor :  Wijzigen uitstroomgegevens student
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
    $uitschrijfdatum=$_REQUEST['Uitschrijfdatum'];
    $locatieentree=$_REQUEST['Locatieentree'];
    $diplomaentree=$_REQUEST['Diplomaentree'];
    $certificaten=$_REQUEST['Certificaten'];
    $doorstroomMBO2A=$_REQUEST['DoorstroomMBO2A'];
    $opleidingMBO2=$_REQUEST['OpleidingMBO2'];
    $gemeldstartklaar=$_REQUEST['Gemeldstartklaar'];
    $extrabegeleiding=$_REQUEST['Extrabegeleiding'];
    $arbeidscontract1okt=$_REQUEST['Arbeidscontract1okt'];
    $hulpbijuitstroom=$_REQUEST['Hulpbijuitstroom'];
    $instellinghulpverlening=$_REQUEST['Instellinghulpverlening'];
    
    //Perform MYSQL update 
    $sql = "UPDATE Students SET Uitschrijfdatum = '". $uitschrijfdatum ."', Locatieentree = '". $locatieentree ."', Diplomaentree = '". $diplomaentree ."',
    Certificaten = '". $certificaten ."', DoorstroomMBO2A = '". $doorstroomMBO2A ."', OpleidingMBO2 = '" .$opleidingMBO2 ."',
    Gemeldstartklaar = '". $gemeldstartklaar ."', Extrabegeleiding = '". $extrabegeleiding ."', Arbeidscontract1okt = '". $arbeidscontract1okt ."', Hulpbijuitstroom = '". $hulpbijuitstroom ."',
    Instellinghulpverlening = '". $instellinghulpverlening ."', Gebruiker = '". $user ."',  modDate = '" .$date ."' WHERE Id = '".$id. "';";
 

    //Check if SQL statement was succesfull 
    if ($conn->query($sql) == false)
        {
            trigger_error('Wrong SQL: ' . $sql . 'Error: '.$conn->error,E_USER_ERROR);
        }
    else
        {
            print("<br/>");
            print("<br/><center>Gegevens zijn succesvol opgeslagen.");
              
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
