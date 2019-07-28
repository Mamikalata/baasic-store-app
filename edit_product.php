<?php

include "db_connection.php";
include "products.php";
include "categories.php";

$db = DBConnection::getConnection();
$products_obj = new Products($db);
$categories_obj = new Categories($db);
$product_id = $_GET['product_id']??null;

$isValid = $products_obj->isValidId($product_id);

if ($isValid == false) {
    header('Location: invalid_id_error.php');
    exit;
}

$product_name = null;
$product_price = null;
$category_name = null;

foreach ($products_obj->getOne($product_id) as $product_key => $product_value) {
    if ($product_key == "product_name") {
        $product_name = $product_value;
    }

    if ($product_key == "product_price") {
        $product_price = $product_value;
    }

    if ($product_key == "category_name") {
        $category_name = $product_value;
    }
}

if ($_POST) {
    $db->beginTransaction();
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $category_id = $_POST['category_id'];

    $product_id = $products_obj->updateProduct($product_id, $product_name, $product_price, $category_id);
    $db->commit();
    header('Location: view_product.php?product_id='.$product_id);
    exit;
}

include 'header.php';
include 'edit_product_form.php';
include 'footer.php';