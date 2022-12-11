<html>
<head> <title> PAYMENT SUMMARY PAGE</title></html>
<body>


<?php

$mail = $_GET["mail"];
echo "E-mail: " . $mail;
echo "<br>";


$password = $_GET["password"];
echo "Password: " . $password;
echo "<br><br><br>";

$fullname = $_GET["fullname"];
echo "Full Name: " . $fullname;
echo "<br>";

$email = $_GET["email"];
echo"Email: " . $email;
echo "<br>";

$address = $_GET["address"];
echo"Address: " . $address;
echo "<br>";

$city = $_GET["city"];
echo"City: " . $city;
echo "<br>";

$country = $_GET["country"];
echo"Country: " . $country;
echo "<br>";

$zipcode = $_GET["zipcode"];
echo"Zip Code: " . $zipcode;
echo "<br>";

$namecard = $_GET["namecard"];
echo"Name on Card: " . $namecard;
echo "<br>";

$creditnumber = $_GET["creditnumber"];
echo"Credit Card Number: " . $creditnumber;
echo "<br>";

$month = $_GET["month"];
echo"Exp Month: " . $month;
echo "<br>";

$year = $_GET["year"];
echo"Exp Year: " . $year;
echo "<br>";

$cvv = $_GET["cvv"];
echo"Cvv: " . $cvv;
echo "<br>";

echo"<a href=\"javascript:history.go(-1)\">GO BACK</a>";


?>

</body>
</html>