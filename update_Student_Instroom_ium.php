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
<title>Inzien / Wijzigen Instroomgegevens Student</title>
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
            Inzien / Wijzigen Instroomgegevens Student
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
  
    <form name = "form1" action="update_Student_Process_Instroom_ium.php" onsubmit="return validateForm()" method="post">
        <br>
        <fieldset>
	<legend>Instroomgegevens van student <?php print($arr['Voornaam'] . " " . $arr['Achternaam']) ?></legend>
		  
        
        <label><input type ="hidden" name="id" value ="<?php print($id);?>"></label>
        
        <label for ="Hulpverlening">Hulpverlening:  <select name="Hulpverlening" id="Hulpverlening">
			      <option value="vul in"<?php if ( $arr['Hulpverlening'] == 'vul in' ): ?> selected="selected"<?php endif; ?>>vul in</option>
                              <option value="Nee" <?php if ( $arr['Hulpverlening'] == 'Nee' ): ?> selected="selected"<?php endif; ?>>Nee</option>
			      <option value="Ja" <?php if ( $arr['Hulpverlening'] == 'Ja' ): ?> selected="selected"<?php endif; ?>>Ja</option></select></label>
        <label for ="Hulpverleningverleden">Hulpverlening in verleden:  <select name="Hulpverleningverleden" id="Hulpverleningverleden">
			      <option value="vul in"<?php if ( $arr['Hulpverleningverleden'] == 'vul in' ): ?> selected="selected"<?php endif; ?>>vul in</option>
                              <option value="Nee" <?php if ( $arr['Hulpverleningverleden'] == 'Nee' ): ?> selected="selected"<?php endif; ?>>Nee</option>
			      <option value="Ja" <?php if ( $arr['Hulpverleningverleden'] == 'Ja' ): ?> selected="selected"<?php endif; ?>>Ja</option></select></label>
        <label for ="Hulpverleninginstelling">Instelling Hulpverlening: <input type= "text" required="required" value ="<?php print($arr['Hulpverleninginstelling']) ?>" size ="40" maxlength="40" class="large" name ="Hulpverleninginstelling" id ="Hulpverleninginstelling"> </label>
        <label for ="Medischeinfo">Medische informatie:  <select name="Medischeinfo" id="Medischeinfo">
			      <option value="vul in"<?php if ( $arr['Medischeinfo'] == 'vul in' ): ?> selected="selected"<?php endif; ?>>vul in</option>
                              <option value="Nee" <?php if ( $arr['Medischeinfo'] == 'Nee' ): ?> selected="selected"<?php endif; ?>>Nee</option>
			      <option value="Ja" <?php if ( $arr['Medischeinfo'] == 'Ja' ): ?> selected="selected"<?php endif; ?>>Ja</option></select></label>
        <label for ="Vooropleiding">Vooropleiding:  <select name="Vooropleiding" id="Vooropleiding">
			      <option value="vul in"<?php if ( $arr['Vooropleiding'] == 'vul in' ): ?> selected="selected"<?php endif; ?>>vul in</option>
                              <option value="LWOO" <?php if ( $arr['Vooropleiding'] == 'LWOO' ): ?> selected="selected"<?php endif; ?>>LWOO</option>
			      <option value="PRO" <?php if ( $arr['Vooropleiding'] == 'PRO' ): ?> selected="selected"<?php endif; ?>>PRO</option>
                              <option value="VSO" <?php if ( $arr['Vooropleiding'] == 'VSO' ): ?> selected="selected"<?php endif; ?>>VSO</option>
                              <option value="BBL" <?php if ( $arr['Vooropleiding'] == 'BBL' ): ?> selected="selected"<?php endif; ?>>BBL</option>
                              <option value="GL" <?php if ( $arr['Vooropleiding'] == 'GL' ): ?> selected="selected"<?php endif; ?>>GL</option>
                              <option value="TL" <?php if ( $arr['Vooropleiding'] == 'TL' ): ?> selected="selected"<?php endif; ?>>TL</option>
                              <option value="HAVO" <?php if ( $arr['Vooropleiding'] == 'HAVO' ): ?> selected="selected"<?php endif; ?>>HAVO</option>
                              <option value="VWO" <?php if ( $arr['Vooropleiding'] == 'VWO' ): ?> selected="selected"<?php endif; ?>>VWO</option></select></label>
        <label for ="Diplomavooropleiding">Diploma Vooropleiding:  <select name="Diplomavooropleiding" id="Diplomavooropleiding">
			      <option value="vul in"<?php if ( $arr['Diplomavooropleiding'] == 'vul in' ): ?> selected="selected"<?php endif; ?>>vul in</option>
                              <option value="Nee" <?php if ( $arr['Diplomavooropleiding'] == 'Nee' ): ?> selected="selected"<?php endif; ?>>Nee</option>
			      <option value="Ja" <?php if ( $arr['Diplomavooropleiding'] == 'Ja' ): ?> selected="selected"<?php endif; ?>>Ja</option></select></label>
        <label for ="Onderwijstotgroep">Onderwijs tot groep/klas:  <select name="Onderwijstotgroep" id="Onderwijstotgroep">
			      <option value="vul in"<?php if ( $arr['Onderwijstotgroep'] == 'vul in' ): ?> selected="selected"<?php endif; ?>>vul in</option>
                              <option value="2" <?php if ( $arr['Onderwijstotgroep'] == '2' ): ?> selected="selected"<?php endif; ?>>2</option>
			      <option value="3" <?php if ( $arr['Onderwijstotgroep'] == '3' ): ?> selected="selected"<?php endif; ?>>3</option>
                              <option value="4" <?php if ( $arr['Onderwijstotgroep'] == '4' ): ?> selected="selected"<?php endif; ?>>4</option>
                              <option value="5" <?php if ( $arr['Onderwijstotgroep'] == '5' ): ?> selected="selected"<?php endif; ?>>5</option>
                              <option value="6" <?php if ( $arr['Onderwijstotgroep'] == '6' ): ?> selected="selected"<?php endif; ?>>6</option></select></label>
        <label for ="Leerstoornis">Leerstoornis:  <select name="Leerstoornis" id="Leerstoornis">
			      <option value="vul in"<?php if ( $arr['Leerstoornis'] == 'vul in' ): ?> selected="selected"<?php endif; ?>>vul in</option>
                              <option value="Dyslexie" <?php if ( $arr['Leerstoornis'] == 'Dyslexie' ): ?> selected="selected"<?php endif; ?>>Dyslexie</option>
			      <option value="Dyscalculie" <?php if ( $arr['Leerstoornis'] == 'Dyscalculie' ): ?> selected="selected"<?php endif; ?>>Dyscalculie</option>
                              <option value="Geen" <?php if ( $arr['Leerstoornis'] == 'Geen' ): ?> selected="selected"<?php endif; ?>>Geen</option>
                              <option value="Anders" <?php if ( $arr['Leerstoornis'] == 'Anders' ): ?> selected="selected"<?php endif; ?>>Anders</option></select></label>
        <label for ="TIQ">TIQ:  <select name="TIQ" id="TIQ">
			      <option value="vul in"<?php if ( $arr['TIQ'] == 'vul in' ): ?> selected="selected"<?php endif; ?>>vul in</option>
                              <option value="50-70" <?php if ( $arr['TIQ'] == '50-70' ): ?> selected="selected"<?php endif; ?>>50-70</option>
			      <option value="70-85" <?php if ( $arr['TIQ'] == '70-85' ): ?> selected="selected"<?php endif; ?>>70-85</option>
                              <option value="85-100" <?php if ( $arr['TIQ'] == '85-100' ): ?> selected="selected"<?php endif; ?>>85-100</option>
                              <option value="100-115" <?php if ( $arr['TIQ'] == '100-115' ): ?> selected="selected"<?php endif; ?>>100-115</option>
                              <option value="115-130" <?php if ( $arr['TIQ'] == '115-130' ): ?> selected="selected"<?php endif; ?>>115-130</option></select></label>                      
        <label for ="VIQ">VIQ:  <select name="VIQ" id="VIQ">
			      <option value="vul in"<?php if ( $arr['VIQ'] == 'vul in' ): ?> selected="selected"<?php endif; ?>>vul in</option>
                              <option value="50-70" <?php if ( $arr['VIQ'] == '50-70' ): ?> selected="selected"<?php endif; ?>>50-70</option>
			      <option value="70-85" <?php if ( $arr['VIQ'] == '70-85' ): ?> selected="selected"<?php endif; ?>>70-85</option>
                              <option value="85-100" <?php if ( $arr['VIQ'] == '85-100' ): ?> selected="selected"<?php endif; ?>>85-100</option>
                              <option value="100-115" <?php if ( $arr['VIQ'] == '100-115' ): ?> selected="selected"<?php endif; ?>>100-115</option>
                              <option value="115-130" <?php if ( $arr['VIQ'] == '115-130' ): ?> selected="selected"<?php endif; ?>>115-130</option></select></label>                      
         <label for ="PIQ">PIQ:  <select name="PIQ" id="PIQ">
			      <option value="vul in"<?php if ( $arr['PIQ'] == 'vul in' ): ?> selected="selected"<?php endif; ?>>vul in</option>
                              <option value="50-70" <?php if ( $arr['PIQ'] == '50-70' ): ?> selected="selected"<?php endif; ?>>50-70</option>
			      <option value="70-85" <?php if ( $arr['PIQ'] == '70-85' ): ?> selected="selected"<?php endif; ?>>70-85</option>
                              <option value="85-100" <?php if ( $arr['PIQ'] == '85-100' ): ?> selected="selected"<?php endif; ?>>85-100</option>
                              <option value="100-115" <?php if ( $arr['PIQ'] == '100-115' ): ?> selected="selected"<?php endif; ?>>100-115</option>
                              <option value="115-130" <?php if ( $arr['PIQ'] == '115-130' ): ?> selected="selected"<?php endif; ?>>115-130</option></select></label>                      
        <label for ="DRL">Did. resultaat lezen: <input type= "text" required="required" value ="<?php print($arr['DRL']) ?>" size ="40" maxlength="40" class="large" name ="DRL" id ="DRL"> </label>
        <label for ="DRR">Did. resultaat rekenen: <input type= "text" required="required" value ="<?php print($arr['DRR']) ?>" size ="40" maxlength="40" class="large" name ="DRR" id ="DRR"> </label>
        <label for ="DRS">Did. resultaat spellen: <input type= "text" required="required" value ="<?php print($arr['DRS']) ?>" size ="40" maxlength="40" class="large" name ="DRS" id ="DRS"> </label>
        
      
        
        
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
