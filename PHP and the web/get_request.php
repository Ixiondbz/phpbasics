<?php 
print_r($_GET);

$random_number=rand();
$button="click me 👆";


?>

<!DOCTYPE html>
<html>
<head>
    <title>Get</title>
</head>
<body>
    <a href="get_request.php?random_number=<?php echo $random_number;?>">

    <?php 
    echo $button;
    ?>

</a>
</body>
</html>