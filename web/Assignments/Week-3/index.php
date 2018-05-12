<?php

//Function to initialize the session and the cart
//Will only execute if a cart doesn't exist
//The shopping cart is set as an array, so it can hold multiple items.
function initializeCart() {
    session_start();

    if (empty($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
}

//Function to check if there is a certain item in the cart.
//If there is, it adds 1 to the quantity.
//If there isn't, it adds the item and sets the quantity to 1. 
function addToCart($id) {
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id] += 1;
    }
    else {
        $_SESSION['cart'][$id] = 1;
    }
}

//Function to get the product catalog from a json file
//Returns an array of objects
function getCatalog() {
    $json = file_get_contents('catalog.json');
    return json_decode($json);
}

//Function that determines how many items are in the cart
function getCartQuantity() {
    $quantity = 0;
    foreach($_SESSION['cart'] as $item) {
        $quantity +=$item;
    }
    return $quantity;
}

initializeCart();

if (isset($_GET['id'])) {
    addToCart($_GET['id']);
}

$cartQuantity = getCartQuantity();

$catalog = getCatalog();

?>
<!DOCTYPE html>
<html lang="en-us">
    <head>
        <meta charset="UTF-8">
        <title>Pet Store</title>
        <meta name="description" content="This is a fake web store to practice creating a shopping cart.">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="js/script.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
        <link rel="stylesheet" href="css/styles.css">
    </head>
    
    <body>
        <div id="header" class="row">
            <div class="col ninety">
                <h1>more<span class="bold">pets</span></h1>
            </div>
            
            <div id="cart-button" class="col ten center">
                <a id="cart-icon" href="cart.php">
<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 19.25 19.25" style="enable-background:new 0 0 19.25 19.25;" xml:space="preserve">
<g>
	<g id="Layer_1_107_">
		<g>
			<path style="fill:#030104;" d="M19.006,2.97c-0.191-0.219-0.466-0.345-0.756-0.345H4.431L4.236,1.461
				C4.156,0.979,3.739,0.625,3.25,0.625H1c-0.553,0-1,0.447-1,1s0.447,1,1,1h1.403l1.86,11.164c0.008,0.045,0.031,0.082,0.045,0.124
				c0.016,0.053,0.029,0.103,0.054,0.151c0.032,0.066,0.075,0.122,0.12,0.179c0.031,0.039,0.059,0.078,0.095,0.112
				c0.058,0.054,0.125,0.092,0.193,0.13c0.038,0.021,0.071,0.049,0.112,0.065c0.116,0.047,0.238,0.075,0.367,0.075
				c0.001,0,11.001,0,11.001,0c0.553,0,1-0.447,1-1s-0.447-1-1-1H6.097l-0.166-1H17.25c0.498,0,0.92-0.366,0.99-0.858l1-7
				C19.281,3.479,19.195,3.188,19.006,2.97z M17.097,4.625l-0.285,2H13.25v-2H17.097z M12.25,4.625v2h-3v-2H12.25z M12.25,7.625v2
				h-3v-2H12.25z M8.25,4.625v2h-3c-0.053,0-0.101,0.015-0.148,0.03l-0.338-2.03H8.25z M5.264,7.625H8.25v2H5.597L5.264,7.625z
				 M13.25,9.625v-2h3.418l-0.285,2H13.25z"/>
			<circle style="fill:#030104;" cx="6.75" cy="17.125" r="1.5"/>
			<circle style="fill:#030104;" cx="15.75" cy="17.125" r="1.5"/>
		</g>
	</g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>
</a><br>
                <a id="cart-text" href="cart.php">Cart (<?php echo $cartQuantity ?>)</a>
            </div>
        </div>
        
        <div class="top-nav" id="con-top-nav">
            <a id="nav-home" href="index.php">Home</a>
            <a id="nav-cart" href="cart.php">Cart</a>
            <a href="javascript:void(0);" class="icon" onclick="navResponsive()">&#9776;</a>
        </div>
        
        <main>
            <?php 
                foreach($catalog as $item) {
                    echo "<div class='pet row'><div class='col forty'><img src='$item->Picture' alt='$item->Name'></div>";
                    echo "<div class='col fifty'><h3>$item->Name</h3><p>$item->Description</p>";
                    echo "<h3>$$item->Price<h3><a href='index.php?id=$item->PetID'>Add to Cart</a></div></div><hr>";
                }
            ?>
        </main>
        <footer>
            <p class="center">Ryan Montgomery || &copy;2018</p>
        </footer>
    </body>
</html>