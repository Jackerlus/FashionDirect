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

<form method="post" action="" style="text-align: center;
    display: block;
    margin-left: auto;
    margin-right: auto;">
    <select title="Size">
        <option value="XL">XL</option>
        <option value="L">L</option>
        <option value="M">M</option>
        <option value="S">S</option>
        <option value="XS">XS</option>
    </select>
    <select title="Quantity">
        <option value=10>10</option>
        <option value=9>9</option>
        <option value=8>8</option>
        <option value=7>7</option>
        <option value=6>6</option>
        <option value=5>5</option>
        <option value=4>4</option>
        <option value=3>3</option>
        <option value=2>2</option>
        <option value=1>1</option>
    </select>
    <button style="">
        Add to cart
    </button>
</form>
