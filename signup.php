<?php
	
	session_start();
	header("Cache-Control: no-cache, must-revalidate");
	include "kozos.php";
	
	$fiokok = loadUsers("users.txt");
	
	$hibak = [];
	
	if (isset($_POST["regisztracio"])) {
    if (!isset($_POST["username-reg"]) || trim($_POST["username-reg"]) === "")
      $hibak[] = "A felhasználónév megadása kötelező!";

    if (!isset($_POST["passwd-reg"]) || trim($_POST["passwd-reg"]) === "" ||
		!isset($_POST["passwd-check-reg"]) || trim($_POST["passwd-check-reg"]) === "")
      $hibak[] = "A jelszó és az ellenőrző jelszó megadása kötelező!";

    if (!isset($_POST["email-reg"]) || trim($_POST["email-reg"]) === "")
      $hibak[] = "Az emailcím megadása kötelező!";


    // űrlapadatok lementése
    $felhasznalonev = $_POST["username-reg"];
    $jelszo = $_POST["passwd-reg"];
    $jelszo2 = $_POST["passwd-check-reg"];
    $email = $_POST["email-reg"];
    $nem = NULL;
    $date = NULL;

    if (isset($_POST["sex-reg"]))
      $nem = $_POST["sex-reg"];
  
    if (isset($_POST["date-of-birth"])){
      $date = $_POST["date-of-birth"];
	}else {
      $date = "";
	}

    // foglalt felhasználónév ellenőrzése
    foreach ($fiokok as $fiok) {
      if ($fiok["username"] === $felhasznalonev)
        $hibak[] = "A felhasználónév már foglalt!";
    }

    // túl rövid jelszó
    if (strlen($jelszo) < 5)
      $hibak[] = "A jelszónak legalább 5 karakter hosszúnak kell lennie!";

    // a két jelszó nem egyezik
    if ($jelszo !== $jelszo2)
      $hibak[] = "A jelszó és az ellenőrző jelszó nem egyezik!";

    // regisztráció sikerességének ellenőrzése
    if (count($hibak) === 0) {
        $fiokok[] = ["username" => $felhasznalonev, "passwd" => $jelszo, "nem" => $nem, "email" => $email, "date" => $date];
	    saveUsers("users.txt", $fiokok);
        $siker = TRUE;
	    $GLOBALS["val"] = $felhasznalonev;
	    header("Location: sikeresreg.php");
    } else {
		// ha sikertelen, akkor kiirjuk egy fajlba a hibakat
		$siker = FALSE;
		$sikertelenfile = fopen("sikertelenreg.txt", "w");
		if ($sikertelenfile === FALSE) {
		  die("HIBA: A fájl megnyitása nem sikerült!");
		}
		foreach ($hibak as $hiba) {
			fwrite($sikertelenfile, $hiba . "\n");
		}
		fclose($sikertelenfile);  
		header("Location: sikertelenreg.php");
	}	
}
	

?>
