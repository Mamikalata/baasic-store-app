<?php

include "db_connection.php";
include "products.php";
include "categories.php";

$db = DBConnection::getConnection();
$products_obj = new Products($db);
$categories_obj = new Categories($db);

if ($_POST) {
    $db->beginTransaction();
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $category_id = $_POST['category_id'];

    $newProduct_id = $products_obj->createProduct($product_name, $product_price, $category_id);
    $db->commit();
    header('Location: view_product.php?product_id='.$newProduct_id);
    exit;
}

include 'header.php';
include 'create_product_form.php';
include 'footer.php';