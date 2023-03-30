<?php


$file = "example.txt";

if ($handle = fopen($file, 'w')) {
    fclose($handle);
    echo $file . " was successfully accessed and closed";
} else {
    echo "The application was not able to write on the file";
}


?>