<?php 

require_once __DIR__ . "/classes/Product.php";
require_once __DIR__ . "/classes/MarketStall.php";
require_once __DIR__ . "/classes/Cart.php";


use MyApp\MarketStall;
use MyApp\Product;
use MyApp\Cart;

$orange = new Product('Orange', 35, true);
$potato = new Product('Potato', 240, false);
$nuts = new Product('Nuts', 850, true);
$kiwi = new Product('Kiwi', 670, false);
$pepper = new Product('Pepper', 330, true);
$raspberry = new Product('Raspberry', 555, false);

$m1 = new MarketStall([$orange, $potato, $nuts]);
$m2 = new MarketStall([$kiwi, $pepper, $raspberry]);

$c1 = new Cart();
$c1->addToCart($m1->getItem($orange, 2));
$c1->addToCart($m2->getItem($pepper, 6));
$c1->addToCart($m1->getItem($nuts, 2));

$c1->printReceipt();