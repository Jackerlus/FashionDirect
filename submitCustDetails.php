<?php
include("header.php");
include("navbar.php");

if (isset($_POST['firstName']))
{
    $firstName = $_POST['firstName'];
}

if (isset($_POST['lastName']))
{
    $lastName = $_POST['lastName'];
}

if (isset($_POST['address1']) & isset($_POST['address2']))
{
    $address = $_POST['address1'] . ', ' . $_POST['address2'];
}

if (isset($_POST['address3'])) {
    if (!empty($_POST['address3'])) {
        $address = $address . ', ' . $_POST['address3'];
    }
}

$address = $address . ', ' . $_POST['town'] . ' ' . $_POST['postCode'];
if (isset($_POST['email'])) {
    $email = $_POST['email'];
}

if (isset($_POST['tel'])){
    $tel = $_POST['tel'];
}

echo $firstName;
echo $lastName;
echo $address;
echo $email;
echo $tel;

$connect = mysqli_connect('localhost', 'root', '', 'fd');
$query = "INSERT INTO customers (firstName, lastName, address, email, tel) VALUES
            (''$firstName'', ''$lastName'', ''$address'', ''$email'', ''$tel'')";
$result = mysqli_query($connect, $query);

$query = "";
?>

<?php
include("footer.php");
?>