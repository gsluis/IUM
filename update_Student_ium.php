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
    <title>Inzien / Wijzigen studentgegevens</title>
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
            In- en Uitstroommonitor :  Inzien / Wijzigen studentgegevens
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
  
    <form name = "form1" action="update_Student_Process_ium.php" onsubmit="return validateForm()" method="post">
        <br>
        <fieldset>
	<legend>Student gegevens</legend>
		  
        
        <label><input type ="hidden" name="id" value ="<?php print($id);?>"></label>
        
        <label for ="Voornaam">Voornaam: </label><input type ="text" value ="<?php print($arr['Voornaam']) ?>" required="required" size ="30" maxlength="40" class="large" name = "Voornaam" id = "Voornaam"> *
        <label for ="Achternaam">Achternaam: </label><input type ="text" value ="<?php print($arr['Achternaam']) ?>" required="required" size ="30" maxlength="40" class="large" name = "Achternaam" id = "Achternaam"> *
        <label for ="BSN">Burgerservicenummer (BSN):</label><input type ="text" value ="<?php print($arr['BSN']) ?>" required="required" size ="9" maxlength="9" name = "BSN" id = "BSN"> *
        <label for ="Postcode">Postcode: </label><input type ="text" value ="<?php print($arr['Postcode']) ?>" required="required" size ="4" maxlength="4" name = "Postcode" id = "Postcode"> *
        <label for ="Geslacht">Geslacht: </label><select name="Geslacht" id="Geslacht">
            <option value="M"<?php if ( $arr['Geslacht'] == 'M' ): ?> selected="selected"<?php endif; ?>>Man</option>
            <option value="V"<?php if ( $arr['Geslacht']  == 'V' ): ?> selected="selected"<?php endif; ?>>Vrouw</option> </select>
        <label for ="Geboortedatum">Geboortedatum: </label><input type ="date" value ="<?php print($arr['Geboortedatum']) ?>" name = "Geboortedatum" id = "Geboortedatum">
        <label for ="Inschrijfdatum">Inschrijfdatum: </label><input type ="date" value ="<?php print($arr['Inschrijfdatum']) ?>" name = "Inschrijfdatum" id = "Inschrijfdatum">
        <label for ="Woonsituatie">Woonsituatie: </label><select name="Woonsituatie" id="Woonsituatie">
			<option value="Thuiswonend (1 ouder)" <?php if ( $arr['Woonsituatie'] == 'Thuiswonend (1 ouder)' ): ?> selected="selected"<?php endif; ?>>Thuiswonend (1 ouder)</option>
			<option value="Thuiswonend" <?php if ( $arr['Woonsituatie'] == 'Thuiswonend' ): ?> selected="selected"<?php endif; ?>>Thuiswonend</option>
			<option value="Zelfstandig" <?php if ( $arr['Woonsituatie'] == 'Zelfstandig'): ?> selected="selected"<?php endif; ?>>Zelfstandig</option>
			<option value="Zelfst. met kind" <?php if ( $arr['Woonsituatie'] == 'Zelfst. met kind'): ?> selected="selected"<?php endif; ?>>Zelfst. met kinderen</option>
			<option value="Begeleid" <?php if ( $arr['Woonsituatie'] == 'Begeleid'): ?> selected="selected"<?php endif; ?>>Begeleid</option></select> *
        <label for ="Etnischeafkomst">Etnische Afkomst: </label><select name="Etnischeafkomst" id="Etnischeafkomst">
			<option value="Nederland" <?php if ( $arr['Etnischeafkomst'] == 'Nederland' ): ?> selected="selected"<?php endif; ?> >Nederland</option>
			<option value="Turkije" <?php if ( $arr['Etnischeafkomst'] == 'Turkije' ): ?> selected="selected"<?php endif; ?> >Turkije</option>
			<option value="Marokko" <?php if ( $arr['Etnischeafkomst'] == 'Marokko' ): ?> selected="selected"<?php endif; ?> >Marokko</option>
			<option value="Suriname" <?php if ( $arr['Etnischeafkomst'] == 'Suriname' ): ?> selected="selected"<?php endif; ?> >Suriname</option>
			<option value="Antillen"<?php if ( $arr['Etnischeafkomst'] == 'Antillen' ): ?> selected="selected"<?php endif; ?>  >Antillen</option>
			<option value="Anders" <?php if ( $arr['Etnischeafkomst'] == 'Anders' ): ?> selected="selected"<?php endif; ?> >Anders</option></select> *
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
