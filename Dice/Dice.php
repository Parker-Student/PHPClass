<?php
$rand1 = mt_rand(1,6);
$rand2 = mt_rand(1,6);
$rand3 = mt_rand(1,6);
$rand4 = mt_rand(1,6);
$rand5 = mt_rand(1,6);

$pscore = $rand1 + $rand2;
$cscore = $rand3 + $rand4 + $rand5;

if($pscore>$cscore)
{
    $result = "You Win!";
}else if($cscore>$pscore)
{
    $result = "You Lose";
} else if ($pscore = $cscore){
    $result = "Tie";
}


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
<h1> Dice Game</h1>
<p>Your score: <?=$pscore?></p>
<img src="../images/dice_<?php echo $rand1;?>.png" style="width: 100px;height: 100px;">
<img src="../images/dice_<?php echo $rand2;?>.png" style="width: 100px;height: 100px;">
<p>Computer's score: <?=$cscore?></p>
<img src="../images/dice_<?php echo $rand3;?>.png" style="width: 100px;height: 100px;">
<img src="../images/dice_<?php echo $rand4;?>.png" style="width: 100px;height: 100px;">
<img src="../images/dice_<?php echo $rand5;?>.png" style="width: 100px;height: 100px;">
<p>Result: <?=$result?> </p>
</main>
<footer><?php include '../includes/footer.php' ?></footer>
</body>
</html>

