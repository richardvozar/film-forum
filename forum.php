<?php
  session_start();

?>

    <?php if (isset($_SESSION["user"]) === FALSE) { 
       header("Location: reglog.php"); 
	}
	?>
<html lang="hu">
	<head>
		<meta charset="UTF-8">
		<title>Fórum</title>
		<link rel="stylesheet" href="css/style.css">
		<link rel="icon" href="img/icon/icon1.png"/>
	</head>
	
<body>
	<nav id="navigation">
		<ul id="menu">
			<li><a href="index.html">Főoldal</a></li>
			<li><a href="scifi.html">Sci-fi</a></li>
			<li><a href="vigjatek.html">Vígjáték</a></li>
			<li><a href="horror.html">Horror</a></li>
			<li><a href="drama.html">Dráma</a></li>
			<li><a id="menu-active" href="forum.php">Fórum</a></li>
			<li><a href="logout.php">Kijelentkezés</a></li>
		</ul>
	</nav>


<div id="index-div">
    Ha beszélgetni szeretnél a filmekről, akkor itt megteheted!
</div>

<p id="forum_udvozlet">
	Üdv a fórumon, <strong> <?php echo $_SESSION["user"]["username"]; ?></strong>! <br> 
	<?php
		if (strlen($_SESSION["user"]["szdatum"]) > 0) {
			echo "Te épp a " . substr($_SESSION["user"]["szdatum"], -2, 2) . ". napján születtél a(z) " .
			substr($_SESSION["user"]["szdatum"], 0, 4) . ". év " . substr($_SESSION["user"]["szdatum"], 5, 2) . ". hónapjának.";
		}
	?>
</p>

<div class="forumdoboz">
    <form action="forumstring.php" method="GET">
        <fieldset class="forumclass">   
		   <textarea name="feedback" rows="5" cols="40" maxlength="200"
      	   placeholder="Mit üzensz?"></textarea>
		  <input type="submit"  value="Küldés" name="kuldes"/>
		  </fieldset>
    </form>


</div>
<div id="forumjobbra">
Kép javaslat a készítőknek:
<form action="forumkep.php" method="POST" enctype="multipart/form-data">
      <label for="file-upload"></label>
      <input type="file" id="file-upload" name="pic" accept="image/*"/> <br/>
      <input type="submit" name="upload-btn" value="Feltöltés"/>
    </form>
	</div>

<div id="phpforum">
<?php
$file = fopen("forumdata.txt","r");

while(! feof($file)){
  echo fgets($file). "<br /><br /><br /><br />";
  }
fclose($file);
?>
</div>



</body>
</html>