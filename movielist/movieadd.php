<?php

if(isset($_POST["txtTitle"])){
    if(isset($_POST["txtRating"])){

        $title = $_POST["txtTitle"];
        $rating = $_POST["txtRating"];

        //Database Stuff
        include '../includes/dbcon.php';
        try{
            $db = new PDO($dsn, $username, $password, $options);
            $sql = $db->prepare("insert into movielist(movieTitle,movieRating) VALUE (:Title,:Rating)");
            $sql->bindValue(":Title",$title);
            $sql->bindValue(":Rating",$rating);

            $sql->execute();

        }
        catch (PDOException $e){
            $error = $e->getMessage();
            echo"Error: $error";
        }
      header("Location:movielist.php");

    }
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
    <form method="post">
    <table border="1" width="80%" align="center">
        <tr height="60">
            <th colspan="2"><h3>Add New Movie</h3></th>
        </tr>
        <tr height="60">
        <th>Movie Name</th>
        <td><input id="txtTitle" name="txtTitle" type="text" size="50"> </td>
        </tr>
        <tr height="60">
            <th>Movie Rating</th>
            <td><input name="txtRating" id="txtRating" type="text" size="50"> </td>
        </tr>
        <tr height="60">
            <td colspan="2"><input type="submit" value="Add New Movie"> </td>
        </tr>
    </table>
    </form>
</main>
<footer><?php include '../includes/footer.php' ?></footer>
</body>
</html>

