<?php

$name = "ixion";
$value = 58;
$expiration = time() + (60 * 60 * 24 * 7);

setcookie($name, $value, $expiration);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Cookie</title>
</head>

<body>
    <h1>Cookie</h1>
</body>

</html>