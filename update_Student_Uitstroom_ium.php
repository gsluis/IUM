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
<title>Inzien / Wijzigen Uitstroomgegevens Student</title>
<link rel="stylesheet" type="text/css" href="styles/ium.css"
	media="screen" />
<script type="text/javascript">
        function validateForm()
        {
            var z = document.forms["form1"]["Geslacht"].value;
            if (z!=  "M" && z!="V")
                {
                    alert("Geslacht moet M (Man) of V (Vrouw) zijn");
                    return false;
                }
        }    
        
</script>
</head>
<body>
<header>     
            Inzien / Wijzigen Uitstroomgegevens Student
</header>
    
<div class="menu">
        <?php
        // To be used in screens where it makes sence to have a menu.
        ?>
</div>
        
    
<div class="content">  	        
                
<?php
//Fill screen only is a user is logged into session
    include("inc_logged_in_ium.php");
   
    //Make connection to database
    require_once("inc_Connection_DB_ium.php");
    
    //Retrieve selected Id from monitor_Overview.php
    $id = $_REQUEST['id'];
    
    //Perform MYSQL select 
    $sql = "SELECT * FROM Students WHERE Id = '".$id. "';";
    $rs= $conn->query($sql);
    
    //Check if SQL statement was succesfull 
    if ( $rs === false)
        {
            trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error,E_USER_ERROR);
            die("Select Error:" . $sql);
        } 
    else
        {
            //Retrieve record values          
            $arr=$rs->fetch_array(MYSQLI_ASSOC);
            
        }
    $conn->close();
    ?>
  
    <form name = "form1" action="update_Student_Process_Uitstroom_ium.php" onsubmit="return validateForm()" method="post">
        <br>
        <fieldset>
	<legend>Uitstroomgegevens van student <?php print($arr['Voornaam'] . " " . $arr['Achternaam']) ?></legend>
		  
        
        <label><input type ="hidden" name="id" value ="<?php print($id);?>"></label>
        
        <label for ="Uitschrijfdatum">Uitschrijfdatum: <input type= "date" value ="<?php print($arr['Uitschrijfdatum']) ?>" name ="Uitschrijfdatum" id ="Uitschrijfdatum"> </label>
        <label for ="Locatieentree">Locatie Entreeopleiding:  <select name="Locatieentree" id="Locatieentree">
			      <option value="vul in"<?php if ( $arr['Locatieentree'] == 'vul in' ): ?> selected="selected"<?php endif; ?>>vul in</option>
        		      <option value="Almeerkans"<?php if ( $arr['Locatieentree'] == 'Almeerkans' ): ?> selected="selected"<?php endif; ?>>Almeerkans</option>
        		      <option value="Eduvier"<?php if ( $arr['Locatieentree'] == 'Eduvier' ): ?> selected="selected"<?php endif; ?> >Eduvier</option>
			      <option value="MBO College"<?php if ( $arr['Locatieentree'] == 'MBO College' ): ?> selected="selected"<?php endif; ?>>MBO College</option>
                              <option value="Praktijkonderwijs"<?php if ( $arr['Locatieentree'] == 'Praktijkonderwijs' ): ?> selected="selected"<?php endif; ?>>Praktijkonderwijs</option>
                              <option value="Anders"<?php if ( $arr['Locatieentree'] == 'Anders' ): ?> selected="selected"<?php endif; ?>>Anders</option></select></label>
        <label for ="Diplomaentree">Diploma Entree Opleiding:  <select name="Diplomaentree" id="Diplomaentree">
			      <option value="vul in"<?php if ( $arr['Diplomaentree'] == 'vul in' ): ?> selected="selected"<?php endif; ?>>vul in</option>
                              <option value="Nee" <?php if ( $arr['Diplomaentree'] == 'Nee' ): ?> selected="selected"<?php endif; ?>>Nee</option>
			      <option value="Ja" <?php if ( $arr['Diplomaentree'] == 'Ja' ): ?> selected="selected"<?php endif; ?>>Ja</option></select></label>
        <label for ="Certificaten">Certificaten:<input type= "text" required="required" value ="<?php print($arr['Certificaten']) ?>" size ="40" maxlength="40" class="large" name ="Certificaten" id ="Certificaten"> </label> 
        <label for ="DoorstroomMBO2A">Doorstroom:  <select name="DoorstroomMBO2A" id="DoorstroomMBO2A">
			      <option value="vul in"<?php if ( $arr['DoorstroomMBO2A'] == 'vul in' ): ?> selected="selected"<?php endif; ?>>vul in</option>
                              <option value="MBO2" <?php if ( $arr['DoorstroomMBO2A'] == 'MBO2' ): ?> selected="selected"<?php endif; ?>>MBO2</option>
			      <option value="Arbeidsmarkt"<?php if ( $arr['DoorstroomMBO2A'] == 'Arbeidsmarkt' ): ?> selected="selected"<?php endif; ?> >Arbeidsmarkt</option></select></label>         
        <label for ="OpleidingMBO2">Opleiding MBO 2:<input type= "text" required="required" value ="<?php print($arr['OpleidingMBO2']) ?>" size ="40" maxlength="40" class="large" name ="OpleidingMBO2" id ="OpleidingMBO2"> </label> 
        <label for ="Gemeldstartklaar">Gemeld voor Startklaar:  <select name="Gemeldstartklaar" id="Gemeldstartklaar">
			      <option value="vul in"<?php if ( $arr['Gemeldstartklaar'] == 'vul in' ): ?> selected="selected"<?php endif; ?>>vul in</option>
                              <option value="Nee" <?php if ( $arr['Gemeldstartklaar'] == 'Nee' ): ?> selected="selected"<?php endif; ?>>Nee</option>
			      <option value="Ja" <?php if ( $arr['Gemeldstartklaar'] == 'Ja' ): ?> selected="selected"<?php endif; ?>>Ja</option></select></label>
        <label for ="Extrabegeleiding">Extra begeleiding geregeld: <select name="Extrabegeleiding" id="Extrabegeleiding">
			      <option value="vul in"<?php if ( $arr['Extrabegeleiding'] == 'vul in' ): ?> selected="selected"<?php endif; ?>>vul in</option>
                              <option value="Nee" <?php if ( $arr['Extrabegeleiding'] == 'Nee' ): ?> selected="selected"<?php endif; ?>>Nee</option>
			      <option value="Ja" <?php if ( $arr['Extrabegeleiding'] == 'Ja' ): ?> selected="selected"<?php endif; ?>>Ja</option></select></label> 
        <label for ="Arbeidscontract1okt">Arbeidscontract 1 oktober: <select name="Arbeidscontract1okt" id="Arbeidscontract1okt">
			      <option value="vul in"<?php if ( $arr['Arbeidscontract1okt'] == 'vul in' ): ?> selected="selected"<?php endif; ?>>vul in</option>
                              <option value="Nee" <?php if ( $arr['Arbeidscontract1okt'] == 'Nee' ): ?> selected="selected"<?php endif; ?>>Nee</option>
			      <option value="Ja" <?php if ( $arr['Arbeidscontract1okt'] == 'Ja' ): ?> selected="selected"<?php endif; ?>>Ja</option></select></label> 
        <label for ="Hulpbijuitstroom">Hulpverlening bij uitstroom: <select name="Hulpbijuitstroom" id="Hulpbijuitstroom">
			      <option value="vul in"<?php if ( $arr['Hulpbijuitstroom'] == 'vul in' ): ?> selected="selected"<?php endif; ?>>vul in</option>
                              <option value="Nee" <?php if ( $arr['Hulpbijuitstroom'] == 'Nee' ): ?> selected="selected"<?php endif; ?>>Nee</option>
			      <option value="Ja" <?php if ( $arr['Hulpbijuitstroom'] == 'Ja' ): ?> selected="selected"<?php endif; ?>>Ja</option></select></label> 
        <label for ="Instellinghulpverlening">Instelling Hulpverlening: <input type= "text" required="required" value ="<?php print($arr['Instellinghulpverlening']) ?>" size ="40" maxlength="40" class="large" name ="Instellinghulpverlening" id ="Instellinghulpverlening"> </label>
        
        
        
        <nav>
            <input type= "submit" value ="Sla op">
             <a href='monitor_Overview_ium.php'>In- en Uitstroommonitor Overzicht</a>
            <a href='logout_ium.php'>Uitloggen</a>
        </nav>
        
        </fieldset>
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
