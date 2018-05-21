<?php
include("header.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>All Products</title>
    <link href="css/item.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<?php
include("navbar.php");
//
//if (isset($_GET['outOfStock']) & !empty($_GET['outOfStock'])) {
//    if ($_GET['outOfStock'] == 'true') {
//        echo '<script type="text/javascript">';
//        echo 'alert("Sorry, this item in the size you requested is out of stock, please select a different size or
//         product");';
//        echo '</script>';
//    }
//}
$selectedItem = $_GET['id'];
$connect = mysqli_connect('localhost', 'root', '', 'fd');
$query = "SELECT * FROM products WHERE productId = '$selectedItem'";
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

<?php
//$query = "SELECT size FROM product_variations WHERE productId = '$selectedItem'";
//$connect = mysqli_connect('localhost', 'root', '', 'fd');
//$result = mysqli_query($connect, $query);
//$sizes = mysqli_fetch_assoc($result);
//
//if ($result)
//{
//    if (mysqli_num_rows($result) > 0){

?>

<form id="addToCart" method="post" action="addToCart.php?id=<?php echo $product['productId'] ?>" style="text-align: center;
    display: block;
    margin-left: auto;
    margin-right: auto;">
<?php
$query = "SELECT size FROM product_variations WHERE productId = '$selectedItem'";
$result = mysqli_query($connect, $query);
$size = mysqli_fetch_assoc($result);
if ($size['size'] == "xl" || $size['size'] == "l" || $size['size'] == "m" || $size['size'] == "s" || $size['size'] == "xs") {
    echo '
    <select id="size" name="size" title="Size">
        <option value="xl">XL</option>
        <option value="l">L</option>
        <option value="m">M</option>
        <option value="s">S</option>
        <option value="xs">XS</option>
    </select>';
} else if ($size['size'] <= 38 & $size['size'] >= 28) {
    echo '
    <select id="size" name="size" title="Size">
        <option value="38">38</option>
        <option value="36">36</option>
        <option value="34">34</option>
        <option value="32">32</option>
        <option value="30">30</option>
        <option value="28">28</option>
    </select>';
} else if ($size['size'] <= 12 & $size['size'] >= 3) {
    echo '
    <select id="size" name="size" title="Size">
        <option value="12">12</option>
        <option value="11">11</option>
        <option value="10">10</option>
        <option value="9">9</option>
        <option value="8">8</option>
        <option value="7">7</option>
        <option value="6">6</option>
        <option value="5">5</option>
        <option value="4">4</option>
        <option value="3">3</option>
    </select>';
}
?>

    <select id="quantity" name="quantity" title="Quantity">
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
    <button form="addToCart" type="submit">
        Add to cart
    </button>
</form>
<?php include("footer.php")?>
</body>
</html>