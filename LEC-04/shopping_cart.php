<?php
session_start();

// Sample product list
$products = [
    1 => ["name" => "T-Shirt", "price" => 500],
    2 => ["name" => "Cap", "price" => 200],
    3 => ["name" => "Shoes", "price" => 1200]
];

// Add to cart
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];

    // If already in cart, increase qty
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['qty'] += 1;
    } else {
        $_SESSION['cart'][$product_id] = [
            'name' => $products[$product_id]['name'],
            'price' => $products[$product_id]['price'],
            'qty' => 1
        ];
    }
}

// Remove item
if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    unset($_SESSION['cart'][$remove_id]);
}

// Clear cart
if (isset($_GET['clear'])) {
    session_destroy();
    header("Location: cart.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple PHP Shopping Cart</title>
    <style>
        body { font-family: Arial; margin: 30px; }
        .product, .cart { margin-bottom: 30px; }
        table { border-collapse: collapse; width: 60%; }
        th, td { border: 1px solid #888; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
        .btn { padding: 5px 10px; background: #28a745; color: white; border: none; cursor: pointer; }
        .btn-remove { background: #dc3545; }
        .btn-clear { background: #6c757d; }
    </style>
</head>
<body>

<h2>🛍️ Available Products</h2>
<div class="product">
    <form method="post">
        <table>
            <tr><th>Name</th><th>Price (৳)</th><th>Action</th></tr>
            <?php foreach ($products as $id => $prod): ?>
                <tr>
                    <td><?= $prod['name'] ?></td>
                    <td><?= $prod['price'] ?></td>
                    <td>
                        <button class="btn" name="add_to_cart" value="1">Add to Cart</button>
                        <input type="hidden" name="product_id" value="<?= $id ?>">
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </form>
</div>

<h2>🛒 Your Cart</h2>
<div class="cart">
    <?php if (!empty($_SESSION['cart'])): ?>
        <table>
            <tr><th>Name</th><th>Price</th><th>Qty</th><th>Subtotal</th><th>Action</th></tr>
            <?php
            $total = 0;
            foreach ($_SESSION['cart'] as $id => $item):
                $subtotal = $item['price'] * $item['qty'];
                $total += $subtotal;
            ?>
                <tr>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['price'] ?></td>
                    <td><?= $item['qty'] ?></td>
                    <td><?= $subtotal ?></td>
                    <td><a class="btn btn-remove" href="?remove=<?= $id ?>">Remove</a></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <th colspan="3">Total</th>
                <th colspan="2"><?= $total ?> ৳</th>
            </tr>
        </table>
        <br>
        <a class="btn btn-clear" href="?clear=1">Clear Cart</a>
    <?php else: ?>
        <p>Your cart is empty.</p>
    <?php endif; ?>
</div>

</body>
</html>
