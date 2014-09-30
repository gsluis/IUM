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
    <script>
        function validateForm()
        {
            var y = document.forms["form1"]["Postcode"].value;
            if (y==null || y=="")
                {
                    alert("Postcode moet gevuld zijn");
                    return false;
                }
            var z = document.forms["form1"]["BSN"].value;
            if (z!=numeric)
                {
                    alert("BSN moet numeriek zijn, geen letters");
                    return false;
                }
        }
</script>
</head>

<body>
<header>     
        In- en Uitstroommonitor :  Voeg een student toe
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
?>
                <form name ="form1" action = "insert_Student_Process_ium.php" 
                    onsubmit="return validateForm()" method="post">
                  <br>
		  <fieldset>
		  <legend>Stap 1: Student gegevens</legend>
		        <label for ="Voornaam">Voornaam: </label><input type= "text" required="required" size ="30" maxlength="40" placeholder="vul voornaam" name ="Voornaam" id ="Voornaam">  *
			<label for ="Achternaam">Achternaam:</label> <input type= "text" required="required" size ="30" maxlength="40" class="large" placeholder="vul achternaam" name ="Achternaam" id ="Achternaam"> * 
		  	<label for ="BSN">Burgerservicenummer (BSN):</label> <input type= "text" required="required" size ="9" maxlength="9" class="large" placeholder="vul BSN" name ="BSN" id ="BSN"> *  
                        <label for ="Postcode">Postcodegebied:</label> <input type= "text" required="required" size ="15" maxlength="4" class="large" placeholder="bv 1100" name ="Postcode" id ="Postcode"> *
                        <label for ="Geslacht">Geslacht: </label> <select name="Geslacht" id="Geslacht">
			      <option value="M" selected>Man</option>
			      <option value="V" >Vrouw</option></select>
                        <label for ="Geboortedatum">Geboortedatum: </label><input type= "date" required="required" name ="Geboortedatum" id ="Geboortedatum"> *
                        <label for ="Inschrijfdatum">Inschrijfdatum: </label><input type= "date" required="required" name ="Inschrijfdatum" id ="Inschrijfdatum"> *
                        <label for ="Woonsituatie">Woonsituatie:</label> <select name="Woonsituatie" id="Woonsituatie">
			      <option value="Thuiswonend (1 ouder)" >Thuiswonend (1 ouder)</option>
			      <option value="Thuiswonend" selected>Thuiswonend</option>
			      <option value="Zelfstandig" >Zelfstandig</option>
			      <option value="Zelfst. met kind" >Zelfst. met kinderen</option>
			      <option value="Begeleid wonen" >Begeleid</option></select> 
			<label for ="Etnischeafkomst">Etnische afkomst:</label> <select name="Etnischeafkomst" id="Etnischeafkomst">
			      <option value="Nederland" selected >Nederland</option>
			      <option value="Turkije" >Turkije</option>
			      <option value="Marokko" >Marokko</option>
			      <option value="Suriname" >Suriname</option>
			      <option value="Antillen" >Antillen</option>
		  	      <option value="Anders" >Anders</option></select> 
                        
                    <nav>
                        <input type= "submit" value ="Sla op">
                        <a href='monitor_Overview_ium.php'>In- en Uitstroommonitor Overzicht</a>
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
