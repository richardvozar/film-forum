<?php

  session_start();
  
  include "kozos.php";
  
  $fiokok = loadUsers("users.txt");

  $bejelentkezett = FALSE;
  

  if (isset($_POST["login"])) {
    if (!isset($_POST["felhasznalonev"]) || trim($_POST["felhasznalonev"]) === "" || !isset($_POST["passwd"]) || trim($_POST["passwd"]) === "") {
      $uzenet = "<strong>Hiba:</strong> Adj meg minden adatot!";
    } else {
      $felhasznalonev = $_POST["felhasznalonev"];
	  $jelszo = $_POST["passwd"];
	
	  // alap, hogy sikertelen a belepes, azonban ha sikeres lesz, ez az uzenet at lesz irva (koszi a tippet CservZ <3)
      $uzenet = "Sikertelen belépés! A belépési adatok nem megfelelők!";

      foreach ($fiokok as $fiok) {
        if ($fiok["username"] === $felhasznalonev && $fiok["passwd"] === $jelszo) {
		  $bejelentkezett = TRUE;
		  $_SESSION["user"] = ["username" => $fiok["username"], "szdatum" => $fiok["date"]];
		  header("Location: sikereslogin.php");
        }
      }
	  if ($bejelentkezett === FALSE){
		header("Location: sikertelenlogin.php");
	  }
    }
  }

?>