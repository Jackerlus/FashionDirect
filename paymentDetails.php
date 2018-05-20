<html>
<head>
<?php
include("header.php");
include("navbar.php");
?>
    <script src="https://www.paypalobjects.com/api/checkout.js" type="text/javascript">
    </script>
</head>
<body>
<div class="container-fluid justify-content-center" style="width: 50%">
    <?php
    $items = $_SESSION['cart'];
    $quants = $_SESSION['quants'];
    $sizes = $_SESSION['sizes'];
    $cartItems = explode(",", $items);
    $cartQuants = explode(",", $quants);
    $cartSizes = explode(",", $sizes);
    ?>
    <strong>
        <div class="row">
            <div class="col-sm-2">Image</div>
            <div class="col-sm-2">Item</div>
            <div class="col-sm-2">Size</div>
            <div class="col-sm-2">Price</div>
            <div class="col-sm-2">Quantity</div>
        </div>
    </strong>
    <?php
    $connect = mysqli_connect('localhost', 'root', '', 'fd');

    $total = 0;
    $i = 1;
    $j = 0;

    foreach ($cartItems as $key=>$id) {;
        $query = "SELECT a.productId, a.image, a.name, a.price FROM products a INNER JOIN product_variations b ON a.productId=b.productId WHERE b.varIndex = '$id';";
        $result = mysqli_query($connect, $query);
        $r = mysqli_fetch_assoc($result);
        ?>
        <div class="row border">
            <div class="col-sm-2"><img style="height: 50px;margin-top:5px;margin-bottom:5px;" src="<?php echo $r['image']?>"/></div>
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
        <div class="row" style="margin-top: 5px; margin-bottom: 20px">
            <div class="col-sm-3"></div>
            <div class="col-sm-3"></div>
            <div class="col-sm-3">£<?php echo $total; ?></div>
            <div class="col-sm-3"></div>
        </div>
    </strong>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6" id="paypal-button" action="payment()"></div>
        <div class="col-sm-3"></div>
    </div>
</div>
    <script>
        paypal.Button.render({
            env: 'sandbox', // Or 'sandbox',

            client: {
                sandbox: 'AfT3hb3y9RUmKSXenSZqv6fvdhkeLJRUHV8-QzSk3u1sXZf_u-YwherV_FNutAmk0Ytc3fXn11vKKxLW'
            },

            commit: true, // Show a 'Pay Now' button

            style: {
                color: 'blue',
                size: 'medium'
            },

            payment: function(data, actions) {
                return actions.payment.create({
                    payment: {
                        transactions: [
                            {
                                amount: { total: '<?php echo $total; ?>', currency: 'GBP' }
                            }
                        ]
                    }
                });
            },

            onAuthorize: function(data, actions) {
                return actions.payment.execute().then(function() {
                    <?php

                    ?>
                });
            },

            onCancel: function(data, actions) {
                /*
                 * Buyer cancelled the payment
                 */
            },

            onError: function(err) {
                /*
                 * An error occurred during the transaction
                 */
            }
        }, '#paypal-button');
        </script>

<?php
include("footer.php");
?>
</body>
</html>