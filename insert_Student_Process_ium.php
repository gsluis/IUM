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
    <title>Toevoegen studentgegevens</title>
    <link rel="stylesheet" type="text/css" href="styles/ium.css"
	media="screen" />
</head>

<body>
<header>     
           In- en Uitstroommonitor :  Student toevoegen
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
    
    //Retrieve Update Form values from Update_Grades.php
    $voornaam=$_REQUEST['Voornaam'];
    $achternaam=$_REQUEST['Achternaam'];
    $bsn=$_REQUEST['BSN'];
    $postcode=$_REQUEST['Postcode'];
    $geslacht=$_REQUEST['Geslacht'];
    $geboortedatum=$_REQUEST['Geboortedatum'];
    $inschrijfdatum=$_REQUEST['Inschrijfdatum'];
    $woonsituatie=$_REQUEST['Woonsituatie'];
    $etnischeafkomst=$_REQUEST['Etnischeafkomst'];
      
    //Make connection to database
    require_once("inc_Connection_DB_ium.php");
                
    //Perform MYSQL update 
    $sql = "INSERT INTO Students ".
    "(Id,Voornaam,Achternaam,BSN,Geboortedatum,Geslacht,Postcode,Woonsituatie,Etnischeafkomst,Inschrijfdatum, Hulpverlening,Hulpverleningverleden, Hulpverleninginstelling,Medischeinfo, Vooropleiding,Diplomavooropleiding,Onderwijstotgroep, Leerstoornis, TIQ, VIQ
    ,PIQ,DRL,DRR,DRS,Uitschrijfdatum,Locatieentree,Diplomaentree,Certificaten,DoorstroomMBO2A,OpleidingMBO2,Gemeldstartklaar,Extrabegeleiding,Arbeidscontract1okt,Hulpbijuitstroom,Instellinghulpverlening, Gebruiker, createDate, modDate)" .
    "VALUES ".
    "('','$voornaam','$achternaam', '$bsn', '$geboortedatum', '$geslacht','$postcode', '$woonsituatie' ,'$etnischeafkomst' , '$inschrijfdatum', '' ,'' , '' ,'' ,'' ,'' ,'' , '' ,
    '', '','', '' , '' , '' , '' , '' , '' , '' , '','' , '' , '' , '' , '' , '' , '$user','$date', ' ')";
                            
    //Check if SQL statement was succesfull 
    if ($conn->query($sql) == false)
    {
    trigger_error('Wrong SQL: ' . $sql . 'Error: '.$conn->error,E_USER_ERROR);
     }
    else
                    {
                        //Present the details on insert action
                        print("<br/>");
                        print("<br/><center>Student ".$voornaam ." " .$achternaam . " is succesvol opgeslagen.");
                    }
    //step f:
    $conn->close();
?> 
    <nav>
            <a href='monitor_Overview_ium.php'>In- en Uitstroommonitor :  Overzicht</a>
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
