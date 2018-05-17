<?php
session_start();

if (isset($_GET['id']) & !empty($_GET['id'])){
    if (isset($_SESSION['cart']) & !empty($_SESSION['cart'])) {

        $items = $_SESSION['cart'];
        $cartItems = explode(",", $items);
        if(in_array($_GET['id'], $cartItems)) {
            header('location: index.php?status=incart');
        } else {
            $items .= "," . $_GET['id'];
            $_SESSION['cart'] = $items;
            header('location: index.php?status=success');

        }

    } else {
        $items = $_GET['id'];
        $_SESSION['cart'] = $items;
        header('location: index.php?status=success');
    }

    if (isset($_SESSION['quants']) & !empty($_SESSION['quants'])) {
        $quants = $_SESSION['quants'];
        $cartQuants = explode(",", $quants);
        if (in_array($_GET['id'], $cartItems)) {
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

} else {
    header('location: index.php?status=failed');
}
?>