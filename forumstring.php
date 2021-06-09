<?php
session_start();
//jelenlegi idő
$t=time();

//ha érkezett be feedback, akkor kiíratja egy fájlba a felhasználónévvel és a jelenlegi idővel együtt
if(isset($_GET['feedback'])) {
    $data = date("H:i:s").' <br>'. '<strong>'. $_SESSION["user"]["username"] . ':	' . '	' .'</strong>'.   $_GET['feedback'] .'	' . "\n";
    $filename = "forumdata.txt";
    if (!file_exists($filename)) {
        $fh = fopen($filename, 'w');
    }
    $ret = file_put_contents($filename, $data, FILE_APPEND | LOCK_EX);
    header("Location: forum.php");
}

?>
