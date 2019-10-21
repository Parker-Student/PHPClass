<?php
//Database Stuff
include '../includes/dbcon.php';
    if (isset($_POST["firstName"])) {
        if (isset($_POST["lastName"])) {

            $FirstName = $_POST["firstName"];
            $LastName = $_POST["lastName"];
            $Address = $_POST["address"];
            $City = $_POST["city"];
            $State = $_POST["state"];
            $Zip = $_POST["zipCode"];
            $Phone = $_POST["phoneNumber"];
            $Email = $_POST["email"];
            $id = $_POST["txtID"];


            //Database Stuff
            include '../includes/dbcon.php';
            try {
                $db = new PDO($dsn, $username, $password, $options);
                $sql = $db->prepare("update customerlist set
                FirstName = :FN, LastName = :LN, address = :AD , city = :CITY, 
                        state = :STATE, zip = :ZIP, phone = :PHONE, email = :EMAIL where customerID = :ID");
                $sql->bindValue(":FN", $FirstName);
                $sql->bindValue(":LN", $LastName);
                $sql->bindValue(":AD", $Address);
                $sql->bindValue(":CITY", $City);
                $sql->bindValue(":STATE", $State);
                $sql->bindValue(":ZIP", $Zip);
                $sql->bindValue(":PHONE", $Phone);
                $sql->bindValue(":EMAIL", $Email);
                $sql->bindValue(":ID",$id);



                $sql->execute();

            } catch (PDOException $e) {
                $error = $e->getMessage();
                echo "Error: $error";
            }
            header("Location:customerlist.php");
        }

}
if(isset($_GET["id"])){
    $id =$_GET["id"];
    try{
        $db = new PDO($dsn, $username, $password, $options);
        $sql = $db->prepare("select * from customerlist where customerID = :id");
        $sql->bindValue(":id",$id);
        $sql->execute();
        $row = $sql->fetch();
        $FirstName = $row["FirstName"];
        $LastName = $row["LastName"];
        $Address = $row["Address"];
        $City = $row["City"];
        $State = $row["State"];
        $Zip = $row["Zip"];
        $Phone = $row["Phone"];
        $Email = $row["Email"];


    }   catch (PDOException $e){
        $error = $e->getMessage();
        echo"Error: $error";
    }

} else{
    header("Location:customerlist.php");
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Parker's Homepage</title>
    <link rel="stylesheet" type="text/css" href="../css/base.css">
    <script type="text/javascript">
        function DeleteMovie(firstName, id){
            if(confirm("Do you want to delete? " + firstName)){

                document.location.href = "customerdelete.php?id= " + id;

            }
        }
    </script>
</head>

<body>
<header><?php include '../includes/header.php' ?></header>
<nav><?php include '../includes/nav.php' ?></nav>

<main>
    <h3>Create Account</h3>
    <form method="post">
        <table border="1" width="60%" align="center">
            <tr height="15">
                <th colspan="2">Customer</th>
            </tr>
            <tr>
                <th>First Name</th>
                <td><input id="firstName" name="firstName" type="text" size="25" required value="<?=$FirstName?>"> </td>
            </tr>
            <tr>
                <th>Last Name:</th>
                <td><input id="lastName" name="lastName" type="text" size="25" required value="<?=$LastName?>"> </td>
            </tr>
            <tr>
                <th>Phone Number:</th>
                <td><input id="phoneNumber" name="phoneNumber" type="tel" size="25" placeholder="(###)###-####" required value="<?=$Phone?>"> </td>
            </tr>
            <tr>
                <th>Email:</th>
                <td><input name="email" id="email" type="email" size="25" required value="<?=$Email?>"> </td>
            </tr>
        </table>
        <br>
        <table border="1" width="60%" align="center" required>
            <tr height="15">
                <th colspan="2">Address</th>
            </tr>
            <tr>
                <th>Address:</th>
                <td><input id="address" name="address" type="text" size="25" required value="<?=$Address?>"> </td>
            </tr>
            <tr>
                <th>City:</th>
                <td><input id="city" name="city" type="text" size="25" required value="<?=$City?>"> </td>
            </tr>
            <tr>
                <th>Zip Code:</th>
                <td><input id="zipCode" name="zipCode" type="text" size="25" required value="<?=$Zip?>"> </td>
            </tr>
            <tr>
                <th>State:</th>
                <td><select name="state" id="state" required value="<?=$State?>">
                        <option value="" selected="selected" >Select a State</option>
                        <option value="AL">Alabama</option>
                        <option value="AK">Alaska</option>
                        <option value="AZ">Arizona</option>
                        <option value="AR">Arkansas</option>
                        <option value="CA">California</option>
                        <option value="CO">Colorado</option>
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="DC">District Of Columbia</option>
                        <option value="FL">Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="HI">Hawaii</option>
                        <option value="ID">Idaho</option>
                        <option value="IL">Illinois</option>
                        <option value="IN">Indiana</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="ME">Maine</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI">Michigan</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="MT">Montana</option>
                        <option value="NE">Nebraska</option>
                        <option value="NV">Nevada</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NM">New Mexico</option>
                        <option value="NY">New York</option>
                        <option value="NC">North Carolina</option>
                        <option value="ND">North Dakota</option>
                        <option value="OH">Ohio</option>
                        <option value="OK">Oklahoma</option>
                        <option value="OR">Oregon</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="SD">South Dakota</option>
                        <option value="TN">Tennessee</option>
                        <option value="TX">Texas</option>
                        <option value="UT">Utah</option>
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WA">Washington</option>
                        <option value="WV">West Virginia</option>
                        <option value="WI">Wisconsin</option>
                        <option value="WY">Wyoming</option>
                    </select></td>
            </tr>
        </table>
 <br>
        <tr>
            <td colspan="1"><input type="submit" value="Update Account"> </td>
        </tr>
            <td colspan="1"><input type="reset" value="Reset"> </td>
        |
        <input type="button" value="Delete" onclick="DeleteMovie('<?=$FirstName?>',<?=$id?>)"> </td>
        <input type="hidden" id="txtID" name="txtID" value="<?=$id?>">
    </form>
</main>
<footer><?php include '../includes/footer.php' ?></footer>
</body>
</html>

