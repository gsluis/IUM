<?php

require_once("inc_Connection_DB_ium.php");

$items_per_page=30;
$date = date('Y-m-d H:i:s');

//function leeftijdbepaling
function leeftijdbepaling($birthdate)
		{$ageOfPerson=0;
			list($year, $month, $day) = explode('-', $birthdate);
			$ageOfPerson = date('Y') - $year;
			if ($month > date('m'))
			{
				$ageOfPerson--;
			}
			if ($month == date('m') && $day > date('d'))
			{
				$ageOfPerson--;
			}
			return $ageOfPerson;
		}

//sanitize post value
$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);

//validate page number is really numaric
if(!is_numeric($page_number)){die('Invalid page number!');}

//get current starting point of records
$position = ($page_number * $items_per_page);

//Limit our results within a specified range.

$sql = "SELECT * FROM Students order by Achternaam, Voornaam asc LIMIT $position, $items_per_page";
$rs = $conn->query($sql);
If ($rs === false)
    {
        trigger_error('Wrong SQL: ' .$sql . 'Error: ' . $conn->error, E_USER_ERROR);
        die();
    } ;


//output results from database
print("<br>");
echo '<ul class="page_result">';
?>
<table border="1" width="80%" align="center" bgcolor=white>
            <tr><th>Actie</th>
                <th>Nr</th>
                <th>Voornaam</th>
                <th>Achternaam</th>
		<th>Leeftijd</th>
		<th>Vooropleiding</th>
		<th>Uitschrijfdatum</th>
		<th>Locatie Entree</th>
		<th>Diploma </th>
		<th>Doorstroom</th>
		<th>Startklaar</th>
		<th>Begeleiding</th>
		<th>Contract 1 okt</th>
		<th>Alg.</th>
		<th>In</th>
		<th>Uit</th>
            </tr>
<?php
while ($arr=  $rs->fetch_array(MYSQLI_ASSOC))
            {
		//Bereken leeftijd op basis van geboortedatum uit array
		$birthdate=$arr['Geboortedatum'];
		
	        print("<tr>");
                print("<td align='center'><a href='delete_Student_ium.php?id=" . $arr['Id']. "'>Del</a></td>" .
                      "<td align='center'>" .$arr['Id']."</td>".
                      "<td align='center'>" .$arr['Voornaam']. "</td>" .
                      "<td align='center'>" .$arr['Achternaam']. "</td>" .
		      "<td align='center'>" .leeftijdbepaling($birthdate). "</td>" .
		      "<td align='center'>" .$arr['Vooropleiding']. "</td>" .
		      "<td align='center'>" .$arr['Uitschrijfdatum']. "</td>" .
		      "<td align='center'>" .$arr['Locatieentree']. "</td>" .
		      "<td align='center'>" .$arr['Diplomaentree']. "</td>" .
		      "<td align='center'>" .$arr['DoorstroomMBO2A']. "</td>" .
		      "<td align='center'>" .$arr['Gemeldstartklaar']. "</td>" .
		      "<td align='center'>" .$arr['Extrabegeleiding']. "</td>" .
		      "<td align='center'>" .$arr['Arbeidscontract1okt']. "</td>" .
                      "<td align='center'><a href='update_Student_ium.php?id=" . $arr['Id']. "'>Wijz</a></td>" .
		       "<td align='center'><a href='update_Student_Instroom_ium.php?id=" . $arr['Id']. "'>Wijz</a></td>" .
		      "<td align='center'><a href='update_Student_Uitstroom_ium.php?id=" . $arr['Id']. "'>Wijz</a></td>");
                print("<tr/>");
}

?>

