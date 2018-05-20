<?php
include("header.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>All Products</title>
        <link href="css/products.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
    <?php
    include("navbar.php");
    ?>

        <div id="items" class="container-fluid justify-content-center">
            <div class="row justify-content-center">
    <?php

    $category = $_GET['category'];
    $connect = mysqli_connect('localhost', 'root', '', 'fd');
    if ($category == 'all') {
        $query = 'SELECT * FROM products ORDER by productId ASC';
    } else if ($category == 'clothing') {
        $query = "SELECT * FROM products WHERE category = 'tshirt' OR category = 'trousers' OR category = 'jumper' OR
                  category = 'jacket'";
    } else {
        $query = "SELECT * FROM products WHERE category = '$category'";
    }

    $result = mysqli_query($connect, $query);

    if ($result)
    {
        if(mysqli_num_rows($result) > 0)
        {
            while($product = mysqli_fetch_assoc($result))
            { ?>
                <div class="col-sm-4">
                    <div style="" class="product-card">
                        <a href="item.php?id=<?php echo $product['productId']; ?>">
                            <img id="product-image"  src="<?php echo $product['image'];?>" class="img-responsive" />
                        </a>
                        <a id="product-name" class="text-info" href="item.php?id=<?php echo $product['productId']; ?>"><?php echo $product['name']; ?></a>
                        <h4 class="">£<?php echo $product['price']; ?></h4>
                    </div>
                </div>
                <?php
            }
        }
    }
    ?>
            </div>
        </div>
    <?php
    include("footer.php");
    ?>
    </body>
</html>
