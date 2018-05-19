<?php
include("header.php");
include("navbar.php");
?>

<div class="container-fluid justify-content-center" style="width: 50%">
<?php
$items = $_SESSION['cart'];
$quants = $_SESSION['quants'];
$sizes = $_SESSION['sizes'];
$cartItems = explode(",", $items);
$cartQuants = explode(",", $quants);
$cartSizes = explode(",", $sizes);
?>
    <div class="row">
        <div class="col-sm-2">Image</div>
        <div class="col-sm-2">Item</div>
        <div class="col-sm-2">Size</div>
        <div class="col-sm-2">Price</div>
        <div class="col-sm-2">Quantity</div>
    </div>
            <?php
            $connect = mysqli_connect('localhost', 'root', '', 'fd');

            $total = 0;
            $i = 1;
            $j = 0;

            foreach ($cartItems as $key=>$id) {;
                $query = "SELECT a.id, a.image, a.name, a.price FROM products a INNER JOIN product_variations b ON a.id=b.productId WHERE b.varIndex = '$id';";
                $result = mysqli_query($connect, $query);
                $r = mysqli_fetch_assoc($result);
                ?>
                    <div class="row border">
                        <div class="col-sm-2"><img style="height: 100px;margin-top:10px;margin-bottom:10px;" src="<?php echo $r['image']?>"/></div>
                        <div class="col-sm-2"><?php echo $r['name']; ?></div>
                        <div class="col-sm-2"><?php echo $cartSizes[$j]?></div>
                        <div class="col-sm-2">£<?php echo $r['price']; ?></div>
                        <div class="col-sm-2"><?php echo $cartQuants[$j] ?></div>
                    </div>
                <?php

                $total += $r['price'] * $cartQuants[$j];
                $i++;
                $j++;
            }
            ?>
    <strong>
            <div class="row" style="margin:5px;">
                <div class="col-sm-3"></div>
                <div class="col-sm-3"></div>
                <div class="col-sm-3">£<?php echo $total; ?></div>
                <div class="col-sm-3"><a href="custDetails.php" class="btn btn-info">Checkout</a></div>
            </div>
    </strong>
</div>

<?php include("footer.php");
?>
