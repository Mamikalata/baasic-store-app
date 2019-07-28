<?php

include 'db_connection.php';
include 'products.php';


$db = DBConnection::getConnection();
$products_obj = new Products($db);
$product_id = $_GET['product_id']??null;

$isValid = $products_obj->isValidId($product_id);

if ($isValid == false) {
    header('Location: invalid_id_error.php');
    exit;
}

include 'header.php';

foreach ($products_obj->getOne($product_id) as $product_key => $product_value) {
    echo "<div><center><h4>" . $product_key . "->" . $product_value . "</h4></center></div>";
}

include 'footer.php';