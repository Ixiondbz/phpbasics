<?php


$file = "example.txt";

if ($handle = fopen($file, 'w')) {

    echo $content = fwrite($handle, "I don't like using $ sign to create and use variables") . " characters written to ". $file;

    fclose($handle);

} else {
    echo "The application was not able to write on the file";
}


?>