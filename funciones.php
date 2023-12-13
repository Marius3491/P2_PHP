<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Rest of the code remains the same.


// Check if the shopping list array exists in the session, if not, initialize it
if (!isset($_SESSION['shoppingList'])) {
    $_SESSION['shoppingList'] = [];
}

$shoppingList = &$_SESSION['shoppingList'];

function addToShoppingList($name, $quantity, $price) {
    global $shoppingList;
    $shoppingList[] = [
        'name' => $name,
        'quantity' => $quantity,
        'price' => $price,
    ];
}

function modifyShoppingList($id, $name, $quantity, $price) {
    global $shoppingList;
    if (isset($shoppingList[$id])) {
        $shoppingList[$id]['name'] = $name;
        $shoppingList[$id]['quantity'] = $quantity;
        $shoppingList[$id]['price'] = $price;
    }
}

function removeFromShoppingList($id) {
    global $shoppingList;
    if (isset($shoppingList[$id])) {
        array_splice($shoppingList, $id, 1);
    }
}

function calculateTotalPriceProduct($quantity, $price) {
    return $quantity * $price;
}

function calculateTotalPurchasePrice() {
    global $shoppingList;
    $totalPurchasePrice = 0;
    foreach ($shoppingList as $item) {
        $totalPurchasePrice += calculateTotalPriceProduct($item['quantity'], $item['price']);
    }
    return $totalPurchasePrice;
}

function displayShoppingList() {
    global $shoppingList;

    if (count($shoppingList) > 0) {
        echo "<table>";
        echo "<tr><th>Name</th><th>Quantity</th><th>Price</th><th>Total</th><th>Action</th></tr>";
        foreach ($shoppingList as $id => $item) {
            $total = calculateTotalPriceProduct($item['quantity'], $item['price']);
            echo "<tr><td>{$item['name']}</td><td>{$item['quantity']}</td><td>{$item['price']}</td><td>{$total}</td><td><a href='modify.php?id={$id}'>Modify</a> | <a href='delete.php?id={$id}'>Delete</a></td></tr>";
        }
        $totalPurchasePrice = calculateTotalPurchasePrice();
        echo "<tr><td colspan='3' class='total-label'>Total Purchase Price:</td><td class='total-price'>{$totalPurchasePrice}</td><td></td></tr>";
        echo "</table>";
    } else {
        echo "<p class='error'>Nothing to show in the shopping list.</p>";
    }
}
