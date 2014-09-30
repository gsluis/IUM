<?php
      if(!isset($_SESSION)) 
        { 
            session_start();
        }
    //Make connection to database
    require_once("inc_Connection_DB_ium.php");
    
    //Max records to be presented per page
    $items_per_page=30;
    //Determining total number of rows
    $data = $conn->query("SELECT * FROM Students") or die(mysql_error()); 
    $get_total_rows = $data->num_rows;  
    //determining how many result pages there will be (given number results per page = 30)
    $pages = ceil($get_total_rows/$items_per_page);
    
    //Create pagination
    $pagination= ' ' ;
    if($pages > 1)
        {
            $pagination .= '<ul class="paginate">';
            for($i = 1; $i<=$pages; $i++)
                {
                
		$pagination .= '<li><a href="#" class="paginate_click" id="'.$i.'-page">'.$i.'</a></li>';
                }
                $pagination .= '</ul>';
             }
    //print("" . $get_total_rows);
    //print("" .$pages);
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="UTF-8">
    <title>In- en Uitstroommonitor :  Overzicht Studenten</title>
    <script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
<script type="text/javascript">
        $(document).ready(function()
        {
            $("#results").load("fetch_pages_ium.php", {'page':0}, function() {$("#1-page").addClass('active');});  //initial page number to load
            
            $(".paginate_click").click(function (e) {
		
            	$("#results").prepend('<div class="loading-indication"><img src="ajax-loader.gif" /> Loading...</div>');
		
		var clicked_id = $(this).attr("id").split("-"); //ID of clicked element, split() to get page number.
		var page_num = parseInt(clicked_id[0]); //clicked_id[0] holds the page number we need 
		
		$('.paginate_click').removeClass('active'); //remove any active class
		
                //post page number and load returned data into result element
                //notice (page_num-1), subtract 1 to get actual starting point
		$("#results").load("fetch_pages_ium.php", {'page':(page_num-1)}, function(){

		});

		$(this).addClass('active'); //add active class to currently clicked element (style purpose)
		
		return false; //prevent going to herf link
        	});	
        });
</script>

    <link rel="stylesheet" type="text/css" href="styles/ium.css"
	media="screen" />
<?php  
//Performing the sql statement with limitation searchresults
    if(isset ($_REQUEST['searchname'])) 
        { 
            $sql = "SELECT * FROM Students WHERE Achternaam like '%". $_REQUEST['searchname'] . "%' ORDER BY achternaam ASC";
        
        
    
   //Perform SQL statement
    $rs = $conn->query($sql);
    
    //Check if SQL statement was succesfull 
    If ($rs === false)
    {
        trigger_error('Wrong SQL: ' .$sql . 'Error: ' . $conn->error, E_USER_ERROR);
        die();
    } ;
    $conn->close();
    }
?>
    
</head>
<body>
<header>     
        In- en Uitstroommonitor :  Overzicht
</header>
<div class="menu">
        <?php
        // To be used in screens where it makes sense to have a menu.
        ?>
</div>    
<div class="contentoverview">  
<?php
//Fill screen only if a user is logged into session
    include("inc_logged_in_ium.php");
    
    
        
?>
            <form name="form1" method="post" action="<?php echo($_SERVER["PHP_SELF"]);?>">
                <nav>
                
                <a href="insert_Student_ium.php">Voeg een student toe</a>
                <a href='logout_ium.php'>Uitloggen</a>
                </nav>
            </form>
            
    <?php
            //search resultaten laten zien nog uitwerken, lijkt of $_REQUEST['searchname'] niet initialiseert / is set check werkt niet goed?
            // in Form voorlopig uitgehaald: <input type="text" name="searchname" value="" size="30" class="large" placeholder="Search on last name!"></label>
            //     <input type="submit" value="Search">
   ?>     
                <div id="results"></div>
         
            <?php
           
                print("</table>");
                print("<br>");
                print(" " .$pagination);
           
            ?>
           
            <?php
            
    ?>
</div>

<footer>
       powered by <a href='sluisitconsultancy.nl' title ="Homepage" id = "logo"><img src="img/Logo_gerton_FINAL.jpg" align="center" width="200" height="50"></a> 


</footer>           

</body>
</html>

  
