<?php
session_start();
function sanitiseInput($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

if (isset($_POST['firstName']))
{
    $firstName = sanitiseInput($_POST['firstName']);
}

if (isset($_POST['lastName']))
{
    $lastName = sanitiseInput($_POST['lastName']);
}

if (isset($_POST['address1']))
{
    $address = sanitiseInput($_POST['address1'] . ', ' . $_POST['address2']);
}

if (isset($_POST['address2']))
{
    $address = $address . ', ' . sanitiseInput($_POST['address2']);
}

if (isset($_POST['town'])) {
    if (!empty($_POST['town'])) {
        $address = sanitiseInput($address . ', ' . $_POST['town']);
    }
}

$address = sanitiseInput($address . ', ' . $_POST['town'] . ' ' . $_POST['postCode']);
if (isset($_POST['email'])) {
    $email = sanitiseInput($_POST['email']);
}

if (isset($_POST['tel'])){
    $tel = sanitiseInput($_POST['tel']);
}

$connect = mysqli_connect('localhost', 'root', '', 'fd');
$query = "INSERT INTO customers (firstName, lastName, address, email, tel) VALUES ('$firstName', '$lastName', '$address', '$email', '$tel')";
$result = mysqli_query($connect, $query);
$query = "SELECT custId FROM customers WHERE firstName = '$firstName' AND lastName = '$lastName' AND address = '$address' AND email = '$email' AND tel = '$tel';";
$result = mysqli_query($connect, $query);
$custId = mysqli_fetch_assoc($result);

$_SESSION['custId'] = $custId['custId'];

echo '
<script type="text/javascript">location.href = \'paymentDetails.php\';</script>
';


?>