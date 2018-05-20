<!-- The index page, first one that user will often come into contact with -->
<?php
//These statements are used to call in the various modules that make up a webpage
include("header.php");
include("navbar.php");
?>
<link href="css/products.css" rel="stylesheet" type="text/css"/>

<body>
<h1>Welcome to Fashion Direct</h1>
<p style="text-align: center">Fashion Direct an upcoming online retailer selling everything fashion. We have
    everything from t-shirts to jeans to jackets, browse our products to refresh your wardrobe today!</p>
<br>
<div id="items" class="container-fluid justify-content-center">
    <div class="row justify-content-center">
        <?php

        $connect = mysqli_connect('localhost', 'root', '', 'fd');
        $query = 'SELECT * FROM products ORDER by productId ASC';

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
<?php
include("footer.php");
?>
