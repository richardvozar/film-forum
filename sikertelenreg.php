<?php
	session_start();

	$file = fopen("sikertelenreg.txt", "r");
	if ($file === FALSE)
      die("HIBA: A fájl megnyitása nem sikerült!");
    
	$hibak = [];
	
	while (($line = fgets($file)) !== FALSE) {
      $hibak[] = $line;
    }
	
	foreach ($hibak as $hiba) {
	  echo "<p>" . $hiba . "</p>";
	}
	
	echo "<a href=\"reglog.php\">Vissza a regisztrációhoz...</a>";

?>