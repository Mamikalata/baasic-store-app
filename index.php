<?php



include 'db_connection.php';
include 'products.php';

$db = DBConnection::getConnection();
$products_obj = new Products($db);

include 'header.php';
echo "<div>";
echo "<center>";
echo "<table border='1'>";
echo "<tr>";
echo "<th>Id</th>";
echo "<th>Name</th>";
echo "<th>Price</th>";
echo "<th>Category</th>";
echo "</tr>";
foreach ($products_obj->getAll() as $product) {
    echo "<tr>";
    echo '<td>' . $product['product_id'] . '</td>';
    echo '<td>' . $product['product_name'] . '</td>';
    echo '<td>' . $product['product_price'] . '</td>';
    echo '<td>' . $product['category_name'] . '</td>';
    echo '<td><a href="view_product.php?product_id=' . $product['product_id'] . '">View</a></td>';
    echo '<td><a href="edit_product.php?product_id=' . $product['product_id'] . '">Edit</a></td>';
    echo '<td><a href="delete_product.php?product_id=' . $product['product_id'] . '">Delete</a></td>';
    echo '</tr>';
}
echo '</table>';
echo "</center>";
echo "</div>";

include 'footer.php';
