<!DOCTYPE html>
<html>
<head>
    <title>All Products</title>
    <link href="css/item.css" rel="stylesheet" type="text/css"/>
    <?php
    include("header.php");
    ?>
</head>
<body>
<?php
include("navbar.php");

$selectedItem = $_GET['id'];
$connect = mysqli_connect('localhost', 'root', '', 'fd');
$query = "SELECT * from products WHERE id = '$selectedItem'";
$result = mysqli_query($connect, $query);
$product = mysqli_fetch_assoc($result);

if ($result)
{
    if(mysqli_num_rows($result) > 0)
    {
        ?>
        <div class="product-card">
            <img id="product-image" src="<?php echo $product['image'];?>" class="img-responsive" />
            <h3 id="product-name" class="text-info"><?php echo $product['name']; ?></h3>
            <h4>£<?php echo $product['price']; ?></h4>
            <p><?php echo $product['description']; ?></p>
        </div>
        <?php
        }
    }
?>
