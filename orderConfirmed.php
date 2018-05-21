<?php
include("header.php");
include("navbar.php");

$items = $_SESSION['cart'];
$quants = $_SESSION['quants'];
$sizes = $_SESSION['sizes'];
$cust = $_SESSION['custId'];
$cartItems = explode(",", $items);
$cartQuants = explode(",", $quants);
$cartSizes = explode(",", $sizes);
$date = date("Y-m-d");
$time = date("H:i:s");

$connect = mysqli_connect('localhost', 'root', '', 'fd');

$query = "INSERT INTO orders (custID, orderDate, orderTime) VALUES ('$cust', '$date', '$time');";
$result = mysqli_query($connect, $query);

$query = "SELECT orderId FROM orders WHERE custId = '$cust' AND orderDate = '$date' AND orderTime = '$time';";
$result = mysqli_query($connect, $query);
$r = mysqli_fetch_assoc($result);
$o = $r['orderId'];

foreach ($cartItems as $key=>$id) {;
    $query = "INSERT INTO ordered_product (orderId, productId, quantity) VALUES ('$o', '$id', '$quants[$key]');";
    $result = mysqli_query($connect, $query);
}
?>

<h1>Order confirmed</h1>
<div id="para">
    <p>Thanks for your order. We aim to deliver our products within 3-5 days of ordering. Check for your confirmation email for more details.</p>
</div>

<?php
include("footer.php");
?>
