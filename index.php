<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Rest of the code remains the same.

require_once 'funciones.php';
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<h1>Shopping List</h1>
<a href="add.php">Add New Item</a>

<?php
displayShoppingList();
?>

</body>
</html>

