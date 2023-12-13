<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Rest of the code remains the same.

require_once 'funciones.php';

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    if (!empty($name)) {
        addToShoppingList($name, $quantity, $price);
        header('Location: index.php');
    } else {
        echo "<p class='error'>Product name is mandatory.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<h1>Add New Item</h1>

<form method="post">
    <label for="name">Product Name:</label>
    <input type="text" name="name" required>
    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" required>
    <label for="price">Price:</label>
    <input type="number" name="price" required>
    <button type="submit" name="add">Add to List</button>
</form>

</body>
</html>
