<!-- This is the HTML code for the navigation bar, it appears at the top of the page and guides users to where they want to go. -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/navbar.js"></script>

<link href="css/navbar.css" rel="stylesheet" type="text/css"/>
<section class="navigation" style="font-family: Arial, sans-serif">
    <div class="nav-container">
        <div class="brand">
            <a href="http://localhost/test">Fashion Direct</a>
        </div>
        <nav>
            <div class="nav-mobile"><a id="nav-toggle" href="#!"><span></span></a></div>
            <ul class="nav-list">
                <li>
                    <a href="#!">Sale</a>
                </li>
                <li>
                    <a href="products.php?category=all">All Products</a>
                </li>
                <li>
                    <a href="#!">Clothing</a>
                    <ul class="nav-dropdown">
                        <li>
                            <a href="products.php?category=clothing">All Clothing</a>
                        </li>
                        <li>
                            <a href="products.php?category=tshirt">T-shirts</a>
                        </li>
                        <li>
                            <a href="products.php?category=jumper">Jumpers & Hoodies</a>
                        </li>
                        <li>
                            <a href="products.php?category=trousers">Trousers</a>
                        </li>
                        <li>
                            <a href="products.php?category=jacket">Coats & Jackets</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="products.php?category=shoes">Shoes</a>
                </li>
                <li>
                    <a href="products.php?category=accessory">Accessories</a>
                </li>
                <li>
                    <a href="about.php">About</a>
                </li>
                <li>
                    <a href="contact.php">Contact Us</a>
                </li>
                <li>
                    <a href="news.php">News and Announcements</a>
                </li>
            </ul>
        </nav>
    </div>
</section>