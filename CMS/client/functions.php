<?php
function connect_to_db()
{
    global $connection;
    $connection = mysqli_connect('localhost', 'root', '','tuitionplatform');
    if (!$connection) {
        echo "Failed to connect to database! 😥";
    }
    // else 
    // {
    //     echo "yea buddy";
    // }
}
function queryline($query_string)
{
    return $query_string . " ";
}

function echobr($string_var)
{
    echo $string_var;
    echo "<br>";
    echo PHP_EOL;
}
?>