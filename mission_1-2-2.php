<?php
    $hensu = "hello world";
    $filename = "mission_1-2.txt";
    $fp = fopen($filename, "w"); //Don't use the large character, "W".
    fwrite($fp, $hensu);
    fclose($fp);
?>