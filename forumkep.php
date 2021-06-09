<?php
  if (isset($_FILES["pic"])) {
	  //engedelyezett kiterjesztese a fajloknak
    $engedelyezett = ["jpg", "jpeg", "png"];
    $kiterjesztes = strtolower(pathinfo($_FILES["pic"]["name"], PATHINFO_EXTENSION));

	//ha a feltolteni valo szerepel a engedelyezett tombunkben
    if (in_array($kiterjesztes, $engedelyezett)) {
        // max 5MB
        if ($_FILES["pic"]["size"] <= 5000000) {
          // a cél útvonal összeállítása

          // ha már létezik ilyen nevű fájl a cél útvonalon, figyelmeztetést írunk ki
          if (file_exists("images/" . $_FILES["pic"]["name"])) {
            echo "<strong>Figyelem:</strong> A régebbi fájl felülírásra kerül! <br/>";
          }

          // a fájl átmozgatása a cél útvonalra
          if (move_uploaded_file($_FILES["pic"]["tmp_name"], "images/" . $_FILES["pic"]["name"])) {
            echo "Sikeres fájlfeltöltés! <br/>";
			echo "<a href=\"forum.php\">Vissza a fórumra...</a>";
          } else {
            echo "<strong>Hiba:</strong> A fájl átmozgatása nem sikerült! <br/>";
			echo "<a href=\"forum.php\">Vissza a fórumra...</a>";
          }
        } else {
          echo "<strong>Hiba:</strong>Max 5MB<br/>";
		  echo "<a href=\"forum.php\">Vissza a fórumra...</a>";
        }
    } else {
      echo "<strong>Hiba!</strong> Csak JPG, JPEG és PNG kiterjesztésű fájlokat lehet feltölteni!<br/>";
	  echo "<a href=\"forum.php\">Vissza a fórumra...</a>";
    }
  }
?>