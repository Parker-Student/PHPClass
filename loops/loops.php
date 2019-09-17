<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Parker's Homepage</title>
    <link rel="stylesheet" type="text/css" href="../css/base.css">
</head>
<body>
<header><?php include '../includes/header.php' ?></header>
<nav><?php include '../includes/nav.php' ?></nav>

<main>
<?php
    $number1 = 100;
    $number2 = "60";
    $number = $number1 + $number2;

    echo '<h1>$number</h1>';

    $i = 1;
    while($i < 7){
        echo "<h$i>Hello World</h$i>";
        $i++;
    }
    $i = 6;
    do{
        echo "<h$i>Hello World</h$i>";
        $i--;
    }while ($i > 0);

    for($i=1; $i<7;$i++)
    {
        echo "<h$i>Hello World</h$i>";
    }
    $full_name = "Doug Smith";
    $position =strpos($full_name, ' ');

    echo $position;
    echo "<br /><br /><br /><br /><br />";

    echo $full_name;
    echo "<br />";

   $full_name =strtolower($full_name);
   echo $full_name;

   echo "<br /><br /><br /><br /><br />";

   $nameParts = explode(' ',$full_name);
   echo$nameParts[0];
   echo "<br />";
   echo $nameParts[1];
 ?>

</main>
<footer><?php include '../includes/footer.php' ?></footer>
</body>
</html>

