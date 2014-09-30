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
    <title>Delete </title>
    <link rel="stylesheet" type="text/css" href="styles/grades.css"
	media="screen" />
</head>

<body>
<header>     
            In- en Uitstroommonitor :  Verwijderen Student
</header>
    
<div class="menu">
        <?php
        // To be used in screens where it makes sence to have a menu.
        ?>
</div>
           
<div class="content">  	
    
<?php
    //Make connection to database
    require_once("inc_Connection_DB_ium.php");
    
    $id = $_REQUEST['id'];
    
    //Perform MYSQL update 
    $sql = "DELETE FROM Students WHERE Id = '" .$id . "'";
    
    //Check if SQL statement was succesfull 
    if ($conn->query($sql) ===false)
        {
            trigger_error('Wrong SQL: ' . $sql . 'Error: '.$conn->error,E_USER_ERROR);
        }
    else
        {
            //Present the details on delete action
            /*$affected_rows = $conn->affected_rows;
            print("<br/>Affected rows: " .$affected_rows);
            */
           
            print("<br/><center>Student ".$id . " is succesvol verwijderd.");
            print("<br/>");
            print("<br/>");
        }
    $conn->close();
?>    
    <form action="delete_Student_ium.php" method ="post">
        <nav>
             <a href='monitor_Overview_ium.php'>In- en Uitstroommonitor :  Overzicht</a>
            <a href='logout_ium.php'>Uitloggen</a>
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

  
