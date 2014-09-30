<!DOCTYPE html>

<html lang='en'>
<head>
    <meta charset="UTF-8">
    <title>Register</title>
     <link rel="stylesheet" type="text/css" href="styles/ium.css"
	media="screen" />
</head>

<body>
<header>     
            In- en Uitstroommonitor : Meld je aan
</header>
<div class="menu">
        <?php
        // To be used in screens where it makes sense to have a menu.
        ?>
</div>

<div class="content">  	        
<?php
        if (!empty($_POST))
            {
             //check whether email already exists in database
             
             $email=$_POST['email'];
             $password=$_POST['password'];
             
    
            //Make connection to database
            require_once("inc_Connection_DB_ium.php");
            
            //Perform SQL statement
            $sql= "SELECT * FROM Users WHERE email='$email';";
            $rs = $conn->query($sql);
            
            
            //Check if SQL statement on check existing email was succesfull 
            If ($rs === false)
                {
                   trigger_error('Wrong SQL: ' .$sql . 'Error: ' . $conn->error, E_USER_ERROR);
                    die();
                } ;
            If (Mysqli_num_rows($rs)>0)
                {            
                    //email is already existing in database
                    $text = "Dit email adres  (<b>$email</b>) bestaat al.\n<br/> 
                           <a href=\"" . $_SERVER["PHP_SELF"] ."\">Meld je aan</a>\n";
                    print("<br>");
                    print("<center>" . $text);
                  
                    die();
                    
                }
            else
                    //Check password strength function 
                {
                        $error = "";
                        include("password_Check_ium.php");

                    if ($error=="")
                        {
                    
                       //email to be added in table Users 
                        $sql= "INSERT INTO Users (email, password, approved) VALUES ('$email','$password', 'N');";
                        $rs = $conn->query($sql);
                   
                        //Check if SQL statement to insert succesfull 
                        If ($rs === false)
                            {
                               trigger_error('Wrong SQL: ' .$sql . 'Error: ' . $conn->error, E_USER_ERROR);
                                die();
                            }
                        //email is added into database
                        print("<br/>");
                        $text = "Dank je wel voor de aanmelding,<br>je kan inloggen nodat de webmaster je account heeft goegekeurd<a href=\"login.php\"><br>Inloggen<a/>";
                        print("<center>" . $text);
                        die();
                    }
                }
            
            $conn->close();

            }
        else{
            
            }
            
?>
        <form name="form1" method="post" action="<?php echo($_SERVER["PHP_SELF"]);?>">
        
            <nav>Emailadres: <input type= "text" name ="email" id ="email" size ="30" maxlength="40" required="required" class="large" placeholder="vul je emailadres in">
            <nav>Wachtwoord: <input type= "text" name ="password" id ="password" size ="12" maxlength="12" required="required" class="large" placeholder="vul wachtwoord"/>
            <nav>
                <input type= "submit" value ="Register"/>
               
                <input type="reset" name="Reset" value="Clear">
               
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
