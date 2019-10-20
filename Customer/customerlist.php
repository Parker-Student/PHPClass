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
    <h3>My Customer List 2019</h3>
    <table border="1" width="80%" align="center">
        <tr>
            <th>Customer ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Zip Code</th>
            <th>Phone</th>
            <th>Email</th>
           </tr>
    <?php
    include '../includes/dbcon.php';
    try{
        $db = new PDO($dsn, $username, $password, $options);

        $sql = $db->prepare("select * from customerlist");
        $sql->execute();
        $row = $sql->fetch();
        while($row!=null){
            echo "<tr>";
            echo "<td>" . $row["customerID"] ."</td>";
            echo "<td>" . $row["FirstName"] ."</td>";
            echo "<td>" . $row["LastName"] ."</td>";
            echo "<td>" . $row["Address"] ."</td>";
            echo "<td>" . $row["City"] ."</td>";
            echo "<td>" . $row["State"] ."</td>";
            echo "<td>" . $row["Zip"] ."</td>";
            echo "<td>" . $row["Phone"] ."</td>";
            echo "<td>" . $row["Email"] ."</td>";
            echo "</tr>";


            $row = $sql->fetch();
        }

    }
    catch (PDOException $e){
        $error = $e->getMessage();
        echo"Error: $error";
    }

    ?>


    </table>
<br><br<br>
    <a href="customeradd.php">Create Account</a>

</main>
<footer><?php include '../includes/footer.php' ?></footer>
</body>
</html>

