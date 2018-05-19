<!-- This is the HTML code for the navigation bar, it appears at the top of the page and guides users to where they want to go. -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/navbar.js"></script>

<link href="css/navbar.css" rel="stylesheet" type="text/css"/>
<section class="navigation" style="font-family: Arial, sans-serif">
    <div class="nav-container">
        <div class="brand">
            <a href="http://localhost/FashionDirect">Fashion Direct</a>
        </div>
        <nav>
            <div class="nav-mobile"><a id="nav-toggle" href="#!" style="text-decoration: none;"><span></span></a></div>
            <ul class="nav-list">
                <li>
                    <a href="products.php?category=all" style="text-decoration: none;">All Products</a>
                </li>
                <li>
                    <a href="#!" style="text-decoration: none;">Clothing</a>
                    <ul class="nav-dropdown">
                        <li>
                            <a href="products.php?category=clothing" style="text-decoration: none;"> All Clothing</a>
                        </li>
                        <li>
                            <a href="products.php?category=tshirt" style="text-decoration: none;">T-shirts</a>
                        </li>
                        <li>
                            <a href="products.php?category=jumper" style="text-decoration: none;">Jumpers & Hoodies</a>
                        </li>
                        <li>
                            <a href="products.php?category=trousers" style="text-decoration: none;">Trousers</a>
                        </li>
                        <li>
                            <a href="products.php?category=jacket" style="text-decoration: none;">Coats & Jackets</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="products.php?category=shoes" style="text-decoration: none;">Shoes</a>
                </li>
                <li>
                    <a href="products.php?category=accessory" style="text-decoration: none;">Accessories</a>
                </li>
                <li>
                    <a href="contact.php" style="text-decoration: none;">Contact Us</a>
                </li>
                <li>
                    <a href="cart.php" style="text-decoration: none;>Coats & Jackets">Your Basket</a>
                </li>
            </ul>
        </nav>
    </div>
</section>