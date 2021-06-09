<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Fórum</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/icon/icon1.png"/>

</head>

<?php
  session_start();
?>

<body>
<nav id="navigation">
    <ul id="menu">
        <li><a href="index.html">Főoldal</a></li>
        <li><a href="scifi.html">Sci-fi</a></li>
        <li><a href="vigjatek.html">Vígjáték</a></li>
        <li><a href="horror.html">Horror</a></li>
        <li><a href="drama.html">Dráma</a></li>
        <li><a id="menu-active" href="forum.php">Fórum</a></li>
    </ul>
</nav>

<img id="cicagif" src="img/gif/cat.gif" alt="">



<div class="split baloldal">
    <br><br><br>
    <form action="signup.php" method="POST">
        <fieldset class="vonal">
            <h2 class="regisztracio-cim">Regisztráció</h2>
            <label>Felhasználónév: <input type="text" name="username-reg" required/></label> <br/>
            <label>Jelszó: <input type="password" name="passwd-reg" minlength="5" required/></label> <br/>
            <label>Jelszó ismét: <input type="password" name="passwd-check-reg" minlength="5" required/></label> <br/>
            <label>Születési dátum: <input type="date" name="date-of-birth" max="2007-01-01" /></label> <br/>
            <label>E-mail: <input type="email" name="email-reg" required/></label> <br/>
            <label>Azonosító kód: <input type="number" name="id-reg" value="62431" disabled/></label> <br/>

            Nem:
            <input type="radio" id="op1" name="sex-reg" value="m"/>
            <label for="op1">Férfi</label>
            <input type="radio" id="op2" name="sex-reg" value="f"/>
            <label for="op2">Nő</label>
            <input type="reset"  value="Visszaállít"/>
            <input type="submit"  value="Regisztráció" name="regisztracio"/>
        </fieldset>
    </form>




    <p id="warning"><mark><strong>A fórumunk fejlesztés alatt áll</strong>, kérjük nézzen vissza április 18. után!</mark></p>
</div>

<div class="split jobboldal">
    <p id="regisztralt"><i>Ha már regisztráltál, bejelntkezhetsz!</i></p>
    <form action="login.php" method="POST">
        <fieldset class="vonal2">
            <h2 class="regisztracio-cim">Bejelentkezés</h2>
            <label for="felhasznalonev">Felhasználónév:</label>
            <input type="text" id="felhasznalonev" name="felhasznalonev" /> <br/><br/>
            <label for="passwd">Jelszó:</label>
            <input type="password" id="passwd" name="passwd"/><br/><br/>
            <input type="submit" name="login"/>
        </fieldset>
    </form>
</div>


</body>
</html>
