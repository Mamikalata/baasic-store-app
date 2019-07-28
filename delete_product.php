<?php

include "db_connection.php";
include "products.php";
include "categories.php";

$db = DBConnection::getConnection();
$products_obj = new Products($db);
$product_id = $_GET['product_id'];

$isValid = $products_obj->isValidId($product_id);

if ($isValid == false) {
    header('Location: invalid_id_error.php');
    exit;
}

if ($_POST) {
    if (isset($_POST['yes'])) {
        $products_obj->deleteProduct($product_id);
        header('Location: index.php');
        exit;
    } else if (isset($_POST['no'])) {
        header('Location: index.php');
        exit;
    }
}

include 'delete_product_form.php';