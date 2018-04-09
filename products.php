<!DOCTYPE html>
<html>
    <head>
        <title>All Products</title>
        <link href="css/products.css" rel="stylesheet" type="text/css"/>
        <?php
        include("header.php");
        ?>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row justify-content-center">
    <?php
    $connect = mysqli_connect('localhost', 'root', '', 'fd');
    $query = 'SELECT * FROM products ORDER by id ASC';
    $result = mysqli_query($connect, $query);

    if ($result)
    {
        if(mysqli_num_rows($result) > 0)
        {
            while($product = mysqli_fetch_assoc($result))
            { ?>
                <div class="col-sm-4">
                    <div style="" class="product-card">
                        <img id="product-image" src="<?php echo $product['image'];?>" class="img-responsive" />
                        <a id="product-name" class="text-info" href="item.php?id=<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a>
                        <h4 class="">$ <?php echo $product['price']; ?></h4>
                    </div>
                </div>
            <?php
            }
        }
    }
    ?>
            </div>
        </div>
    </body>
</html>
