<?php
session_start();
$searchId = $_GET['id'];
$searchSize = $_POST['size'];
$connect = mysqli_connect('localhost', 'root', '', 'fd');

$query = "SELECT varIndex FROM product_variations WHERE productId = '$searchId' AND size = '$searchSize'";
$result = mysqli_query($connect, $query);
$r = mysqli_fetch_assoc($result);

if (isset($_GET['id']) & !empty($_GET['id'])){
    if (isset($_SESSION['cart']) & !empty($_SESSION['cart'])) {

        $items = $_SESSION['cart'];
        $cartItems = explode(",", $items);
        if(in_array($r['varIndex'], $cartItems)) {
            header('location: index.php?status=incart');
        } else {
            $items .= "," . $r['varIndex'];
            $_SESSION['cart'] = $items;
            header('location: index.php?status=success');

        }

    } else {
        $_SESSION['cart'] = $r['varIndex'];
        header('location: index.php?status=success');
    }

    if (isset($_SESSION['quants']) & !empty($_SESSION['quants'])) {
        $quants = $_SESSION['quants'];
        $cartQuants = explode(",", $quants);
        if (in_array($r['varIndex'], $cartItems)) {
            header('location: index.php?status=incart');
        } else {
            $quants .= "," . $_POST['quantity'];
            $_SESSION['quants'] = $quants;
            header('location: index.php?status=success');
        }
    } else {
        $_SESSION['quants'] = $_POST['quantity'];
        header('location: index.php?status=success');
    }

    if (isset($_SESSION['sizes']) & !empty($_SESSION['sizes'])) {
        $sizes = $_SESSION['sizes'];
        $cartSizes = explode(",", $sizes);
        if (in_array($r['varIndex'], $cartItems)) {
            header('location: index.php?status=incart');
        } else {
            $sizes .= "," . $_POST['size'];
            $_SESSION['sizes'] = $sizes;
            header('location: index.php?status=success');
        }
    } else {
        $_SESSION['sizes'] = $_POST['size'];
        header('location: index.php?status=success');
    }

} else {
    header('location: index.php?status=failed');
}
?>