<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Rest of the code remains the same.

require_once 'funciones.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $item = isset($shoppingList[$id]) ? $shoppingList[$id] : null;

    if (!$item) {
        header('Location: index.php');
        exit();
    }

    if (isset($_POST['modify'])) {
        $name = $_POST['name'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];

        if (!empty($name)) {
            modifyShoppingList($id, $name, $quantity, $price);
            header('Location: index.php');
        } else {
            echo "<p class='error'>Product name is mandatory.</p>";
        }
    }
} else {
    // Redirect to index.php or display an error if the item ID is not provided.
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<h1>Modify Item</h1>

<form method="post">
    <label for="name">Product Name:</label>
    <input type="text" name="name" value="<?= $item['name'] ?>" required>
    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" value="<?= $item['quantity'] ?>" required>
    <label for="price">Price:</label>
    <input type="number" name="price" value="<?= $item['price'] ?>" required>
    <button type="submit" name="modify">Modify Item</button>
</form>

</body>
</html>