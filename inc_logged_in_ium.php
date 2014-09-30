
<?php
        if (!isset($_SESSION["username"]))
            {
            //present screenheader
            $description="Geen toegang";
            print ("<font size=6><font color=blue><CENTER> $description</CENTER></font></font><br/>");
            ?>
            <hr>
            <?php
            print("<center>U hebt zich nog niet aangemeld;<br>u kunt zich
		<a href=\"login_ium.php\">hier registreren</a>");
            exit();
            }
?>
