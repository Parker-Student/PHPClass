<?php


if(isset($_GET["id"])){
    $id =$_GET["id"];
    try{ include '../includes/dbcon.php';
        $db = new PDO($dsn, $username, $password, $options);
        $sql = $db->prepare("Delete from customerlist where customerID = :id");
        $sql->bindValue(":id",$id);
        $sql->execute();
       }   catch (PDOException $e){
        $error = $e->getMessage();
        echo"Error: $error";
    }
}
header("Location:customerlist.php");

?>