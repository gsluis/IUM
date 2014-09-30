<?php

if( strlen($password) < 8 ) {
	$error .= "Wachtwoord is korter dan 8 posities!<br/>";
}

if( strlen($password) > 12 ) {
	$error .= "Wachtwoord is langer dan 12 posities!<br/>";
}


if( !preg_match("#[0-9]+#", $password) ) {
	$error .= "Wachtwoord moet een cijfer bevatten!<br/>";
}


if( !preg_match("#[a-z]+#", $password) ) {
	$error .= "Wachtwoord moet een kleine letter bevatten!<br/>";
}


if( !preg_match("#[A-Z]+#", $password) ) {
	$error .= "Wachtwoord moet een hoofdletter bevatten!!<br/>";
}


//if( !preg_match("#\W+#", $password) ) {
//	$error .= "Password must include at least one symbol!<br/>";
//}


if($error){
	print("<center>Wachtwoord validatie: je wachtwoord is te zwak:<br/>");
        print("$error");
        print("<br/>");
        print("<center>Probeer opnieuw:<br/>");
} else
{
	print("<center>Je wachtwoord is voldoende sterk!");
        print("<br/>");
}


?>
