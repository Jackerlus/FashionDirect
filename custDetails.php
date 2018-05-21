<html>
<head>
    <?php
    include("header.php");
    include("navbar.php");

    function sanitiseInput($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }

    ?>
    <link href="css/custDetails.css" type="text/css" />
</head>
<body>

<div class="container-fluid justify-content-center" style="width: 50%">
    <?php
    $items = sanitiseInput($_SESSION['cart']);
    $quants = sanitiseInput($_SESSION['quants']);
    $sizes = sanitiseInput($_SESSION['sizes']);
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

<div class="container form-container" style="width: 500px;">
    <form action="submitCustDetails.php" method="post">
        <div class="row col-sm-12 justify-content-center"><h2>Personal details</h2></div>

        <div class="row" style="margin: 10px;">
            <div class="col-sm-6">
                First name: <input type="text" name="firstName" id="first-name" title="First name" required maxlength="15" pattern="[A-Za-z]+">
            </div>
            <div class="col-sm-6">
                Last name: <input type="text" name="lastName" id="last-name" title="Last name" required maxlength="15" pattern="[A-Za-z]+">
            </div>
        </div>

        <div class="row" style="margin: 10px;">
            <div class="col-sm-6">
                Email address: <input type="email" name="email" id="email" title="Email" required maxlength="254">
            </div>
            <div class="col-sm-6">
                Phone number: <input type="tel" name="tel" id="tel" title="Phone number" required maxlength="11" pattern="[0][0-9]{10}">
            </div>
        </div>

        <div class="row" style="margin: 10px;">
            <div class="col-sm-6">
                Address line 1: <input type="text" name="address1" id="address1" title="Address line 1" required maxlength="25">
            </div>
            <div class="col-sm-6">
                Address line 2: <input type="text" name="address2" id="address2" title="Address line 2" maxlength="22">
            </div>
        </div>

        <div class="row" style="margin: 10px;">
            <div class="col-sm-6">
                Town/city: <input type="text" name="town" id="town" title="Town or city" required maxlength="15" pattern="[A-Za-z]+">
            </div>
            <div class="col-sm-6">
                Post code: <input type="text" name="postCode" id="post-code" title="Post code" required maxlength="8" pattern="([Gg][Ii][Rr] 0[Aa]{2})|((([A-Za-z][0-9]{1,2})|(([A-Za-z][A-Ha-hJ-Yj-y][0-9]{1,2})|(([A-Za-z][0-9][A-Za-z])|([A-Za-z][A-Ha-hJ-Yj-y][0-9]?[A-Za-z]))))\s?[0-9][A-Za-z]{2})">
            </div>
        </div>

        <div class="row" style="margin: 10px;">
            <div class="col-sm-6"></div>
            <div class="col-sm-6" style="margin: auto; top: 0; right: 0; bottom: 0;left: 0;">
                <button type="submit" class="btn btn-info" style="display: block;">Payment</button>
            </div>
        </div>
    </form>
</div>
</body>
<?php
include("footer.php");
?>
</html>
