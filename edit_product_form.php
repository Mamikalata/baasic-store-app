<?php
echo '<form method="post">';
echo "<div style='border-left: 20px solid red; background: lightgray'><center>";
echo "Name: <input type='text' name='product_name' value='$product_name'><br>";
echo "Price: <input type='text' name='product_price' value='$product_price'><br>";
echo "<select name='category_id'>";
foreach ($categories_obj->getAll() as $category) {
    if ($category['category_name'] == $category_name) {
        echo "<option value='" . $category['category_id'] . "' selected='selected'>" . $category['category_name'] . "</option>";
    } else {
        echo "<option value='" . $category['category_id'] . "'>" . $category['category_name'] . "</option>";
    }
}
echo "</select>";
echo "<input type='submit' value='Submit!' name='submit'>";
echo "</center></div>";
echo "</form>";