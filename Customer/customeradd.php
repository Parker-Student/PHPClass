<?php
$key = sprintf('%04X%04X%04X%04X%04X%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));

    if (isset($_POST["firstName"])) {
        if (isset($_POST["lastName"])) {

            $fname = $_POST["firstName"];
            $lname = $_POST["lastName"];
            $address = $_POST["address"];
            $city = $_POST["city"];
            $state = $_POST["state"];
            $zip = $_POST["zipCode"];
            $phone = $_POST["phoneNumber"];
            $email = $_POST["email"];
            $customerPassword = $_POST["txtpassword"];



            //Database Stuff
            include '../includes/dbcon.php';
            try {
                $db = new PDO($dsn, $username, $password, $options);
                $sql = $db->prepare("insert into customerlist(FirstName, LastName, address, city, state, zip, phone, email, customerPassword)
            VALUE (:FName,:LName,:Address,:City,:State,:Zip,:Phone,:Email,:Password)");
                $sql->bindValue(":FName", $fname);
                $sql->bindValue(":LName", $lname);
                $sql->bindValue(":Address", $address);
                $sql->bindValue(":City", $city);
                $sql->bindValue(":State", $state);
                $sql->bindValue(":Zip", $zip);
                $sql->bindValue(":Phone", $phone);
                $sql->bindValue(":Email", $email);
                $sql->bindValue(":Password",md5($customerPassword.$key));



                $sql->execute();

            } catch (PDOException $e) {
                $error = $e->getMessage();
                echo "Error: $error";
            }
            header("Location:customerlist.php");
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
    <h3>Create Account</h3>
    <form method="post">
        <table border="1" width="60%" align="center">
            <tr height="15">
                <th colspan="2">Customer</th>
            </tr>
            <tr>
                <th>First Name</th>
                <td><input id="firstName" name="firstName" type="text" size="25" required> </td>
            </tr>
            <tr>
                <th>Last Name:</th>
                <td><input id="lastName" name="lastName" type="text" size="25" required> </td>
            </tr>
            <tr>
                <th>Phone Number:</th>
                <td><input id="phoneNumber" name="phoneNumber" type="tel" size="25" placeholder="(###)###-####" required> </td>
            </tr>
            <tr>
                <th>Email:</th>
                <td><input name="email" id="email" type="email" size="25" required> </td>
            </tr>
        </table>
        <br>
        <table border="1" width="60%" align="center" required>
            <tr height="15">
                <th colspan="2">Address</th>
            </tr>
            <tr>
                <th>Address:</th>
                <td><input id="address" name="address" type="text" size="25" required> </td>
            </tr>
            <tr>
                <th>City:</th>
                <td><input id="city" name="city" type="text" size="25" required> </td>
            </tr>
            <tr>
                <th>Zip Code:</th>
                <td><input id="zipCode" name="zipCode" type="text" size="25" required> </td>
            </tr>
            <tr>
                <th>State:</th>
                <td><select name="state" id="state" required>
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
<table border="1" width="60%" align="center" required>
        <tr height="60">
            <th>Password</th>
            <td><input name="txtPassword" id="txtPassword" type="password" size="25"> </td>
        </tr>
        <tr height="60">
            <th>Retype Password</th>
            <td><input name="txtPassword2" id="txtPassword2" type="password" size="25"> </td>
        </tr>

</table>
 <br>
        <tr>
            <td colspan="1"><input type="submit" value="Create Account"> </td>
        </tr>
            <td colspan="1"><input type="reset" value="Reset"> </td>

    </form>
</main>
<footer><?php include '../includes/footer.php' ?></footer>
</body>
</html>

