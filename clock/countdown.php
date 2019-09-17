<?php
$secPerMin = 60;
$secPerHour = 60 * $secPerMin;
$secPerDay = 24 * $secPerHour;
$secPerYear = 365 * $secPerDay;

$now = time();

$semester = mktime(23,59,59,12,21,2019);

$seconds = $semester - $now;

$Years = floor($seconds/$secPerYear);
$seconds = $seconds - ($Years * $secPerYear);

$Days = floor($seconds/$secPerDay);
$seconds = $seconds - ($Days * $secPerDay);

$Hour = floor($seconds/$secPerHour);
$seconds = $seconds - ($Hour * $secPerHour);

$Min = floor($seconds/$secPerMin);
$seconds = $seconds - ($Min * $secPerMin);


?>
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
<h3>Semester Countdown</h3>
<p>Years:<?=$Years ?> | Days: <?=$Days ?> | Hours: <?=$Hour ?> | Min: <?=$Min ?> | Seconds: <?=$seconds ?> |</p>


</main>
<footer><?php include '../includes/footer.php' ?></footer>
</body>
</html>
