<?php

session_start();

$errmsg = "";

$key = sprintf('%04X%04X%04X%04X%04X%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));


if(($_SESSION["Role"] != 2)){
    header("Location:index.php");
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
    <h1>Operator Page</h1>
       <form method="post">
        <table border="1" width="80%" align="center">
            <tr height="60">
                <th colspan="2" id="operate"><h3>Operate</h3></th>
            </tr>




            <tr height="60">
                <th>Role</th>
                <td>
                    <select id="operate" name="txtRole">
                       <option value="2">Operator</option>
                    </select>
                </td>
            </tr>

            <tr height="60">
                <td colspan="2"><input type="submit" value="Operate" name="submit">
                </td> </td>
            </tr>

        </table>
    </form>
    <br>
</main>
<footer><?php include '../includes/footer.php' ?></footer>
</body>
</html>

