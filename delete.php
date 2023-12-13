<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Rest of the code remains the same.

require_once 'funciones.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    removeFromShoppingList($id);
}

// Redirect to index.php after deleting the item.
header('Location: index.php');
