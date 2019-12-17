<?php
session_start();
//Database Stuff

    if(isset($_POST["txtEmail"])){
        if(isset($_POST["txtPassword"])){
            $email = $_POST["txtEmail"];
            $pwd = $_POST["txtPassword"];
            $errmsg = "";

            include '../includes/dbcon.php';
            try{
                $db = new PDO($dsn, $username, $password, $options);

                $sql = $db->prepare("select memberID, memberPassword, memberKey, roleID from memberLogin where memberEmail = :Email");
                $sql->bindValue(":Email",$email);
                $sql->execute();
                $row = $sql->fetch();

                if($row!=null){
                    $hashedPassword = md5($pwd.$row["memberKey"]);

                    if($hashedPassword == $row["memberPassword"]){
                        $_SESSION["UID"] = $row["memberID"];
                        $_SESSION["Role"] = $row["roleID"];
                        if($row["roleID"] == 1){
                            header("Location:admin.php");

                        }
                        elseif($row["roleID"] == 2){
                            header("Location:operator.php");

                        }

                        else{
                            header("Location:member.php");
                        }
                    }else{
                        $errmsg = "Wrong Username or Password";
                    }
                }else{
                    $errmsg = "Wrong Username or Password";
                }
            }catch (PDOException $e){
                $error = $e->getMessage();
                echo"Error: $error";
            }
}}

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
    <h3 id="error"><?=$errmsg?></h3>
    <form method="post">
    <table border="1" width="80%" align="center">
        <tr height="60">
            <th colspan="2"><h3>User Login</h3></th>
        </tr>
        <tr height="60">
        <th>Email</th>
        <td><input id="txtEmail" name="txtEmail" type="text" size="50" > </td>
        </tr>
        <tr height="60">
            <th>Password</th>
            <td><input name="txtPassword" id="txtPassword" type="password" size="50"> </td>
        </tr>
        <tr height="60">
            <td colspan="2"><input type="submit" value="Login">
               </td> </td>


        </tr>
    </table>
    </form>
</main>
<footer><?php include '../includes/footer.php' ?></footer>
</body>
</html>

