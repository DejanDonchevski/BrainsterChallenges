<?php

require_once __DIR__ . "/classes/bench.php";
require_once __DIR__ . "/classes/chair.php";
require_once __DIR__ . "/classes/furniture.php";
require_once __DIR__ . "/classes/sofa.php";

echo "<h2>Furniture</h2>";
$f1 = new Furniture(15, 10, 5);
$f1->setIs_for_sitting(true)->setIs_for_sleeping(false);
echo $f1->area();
echo "<br>";
echo $f1->volume();

echo "<hr>";

echo "<h2>Sofa1</h2>";
$s1 = new Sofa(2,3,4);
$s1->setIs_for_sitting(true)->setIs_for_sleeping(false)->setSeats(2)->setArmrests(4)->setLength_opened(10);
echo $s1->area();
echo "<br>";
echo $s1->volume();
echo "<br>";
echo $s1->area_opened();
echo "<br>";
$s1->print();
echo "<br>";
$s1->sneakpeek();
echo "<br>";
$s1->fullinfo();

echo "<hr>";

echo "<h2>Sofa2</h2>";
$s2 = new Sofa(3,4,5);
$s2->setIs_for_sitting(true)->setIs_for_sleeping(true)->setSeats(4)->setArmrests(2)->setLength_opened(12);
echo $s2->area();
echo "<br>";
echo $s2->volume();
echo "<br>";
echo $s2->area_opened();
echo "<br>";
$s2->print();
echo "<br>";
$s2->sneakpeek();
echo "<br>";
$s2->fullinfo();

echo "<hr>";

echo "<h2>Bench</h2>";
$b1 = new Bench(2, 3, 4);
$b1->setSeats(3)->setArmrests(2)->setLength_opened(8)->setIs_for_sitting(true)->setIs_for_sleeping(false)->print();
echo "<br>";
$b1->sneakpeek();
echo "<br>";
$b1->fullinfo();

echo "<hr>";

echo "<h2>Chair</h2>";
$c1 = new Chair(2, 2, 5);
$c1->setIs_for_sitting(true)->setIs_for_sleeping(false)->print();
echo "<br>";
$c1->sneakpeek();
echo "<br>";
$c1->fullinfo();