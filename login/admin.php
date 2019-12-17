<?php
session_start();

$errmsg = "";

$key = sprintf('%04X%04X%04X%04X%04X%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));



if(($_SESSION["Role"]!=1)){
    header("Location:index.php");
}

if(isset($_POST["submit"])) {
    if (empty($_POST["txtFName"])) {
        $errmsg = "Name is Required";
    } else {
        $FName = $_POST["txtFName"];
    }

    if (empty($_POST["txtEmail"])) {
        $errmsg = "Email is Required";
    } else {
        $Email = $_POST["txtEmail"];
    }
    if (empty($_POST["txtPassword"])) {
        $errmsg = "Password is Required";
    } else {
        $Password = $_POST["txtPassword"];
    }
    if($Password != $_POST["txtPassword2"]){
        $errmsg = "Passwords do not match";
    }
    if (empty($_POST["txtRole"])) {
        $errmsg = "Role is Required";
    } else {
        $Role = $_POST["txtRole"];
    }

    if($errmsg == ""){

        //Database Stuff
        include '../includes/dbcon.php';
        try{
            $db = new PDO($dsn, $username, $password, $options);
            $sql = $db->prepare("insert into memberLogin(memberName,memberEmail,memberPassword,roleID,memberKey) VALUE (:Name,:Email,:Password, :RID,:Key)");
            $sql->bindValue(":Name",$FName);
            $sql->bindValue(":Email",$Email);
            $sql->bindValue(":Password",md5($Password.$key));
            $sql->bindValue(":RID",$Role);
            $sql->bindValue(":Key",$key);
            $sql->execute();

        }
        catch (PDOException $e){
            $error = $e->getMessage();
            echo"Error: $error";
        }
        $FName = "";
        $Email = "";
        $Role = "";
        $Password = "";
        $errmsg="Member added to database";
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
    <h1>Admin Page</h1>
    <h3 id="error"><?=$errmsg?> </h3>
    <form method="post">
        <table border="1" width="80%" align="center">
            <tr height="60">
                <th colspan="2"><h3>Add New Member</h3></th>
            </tr>
            <tr height="60">
                <th>Full Name</th>
                <td><input id="txtFName" name="txtFName" type="text" size="50" value="<?=$FName?>" required> </td>
            </tr>
            <tr height="60">
                <th>Email</th>
                <td><input name="txtEmail" id="txtEmail" type="text" value="<?=$Email?>" size="50"> </td>
            </tr>
            <tr height="60">
                <th>Password</th>
                <td><input name="txtPassword" id="txtPassword" type="password" size="50"> </td>
            </tr>
            <tr height="60">
                <th>Retype Password</th>
                <td><input name="txtPassword2" id="txtPassword2" type="password" size="50"> </td>
            </tr>
            <tr height="60">
                <th>Role</th>
                <td>
                    <select id="txtRole" name="txtRole">
                        <option value="1">Admin</option>
                        <option value="2">Operator</option>
                        <option value="3">Member</option>
                    </select>
                </td>
            </tr>

            <tr height="60">
                <td colspan="2"><input type="submit" value="Add New Member" name="submit">
                </td> </td>
            </tr>

        </table>
    </form>
    <br>
</main>
<footer><?php include '../includes/footer.php' ?></footer>
</body>
</html>

