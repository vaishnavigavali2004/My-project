<?php
session_start();
include 'includes/db.php'; // Make sure this file has $conn = new mysqli(...);

// Add to cart logic
if (isset($_GET['action']) && $_GET['action'] == 'add') {
  $product_id = $_POST['product_id'];
  $quantity = $_POST['quantity'];

  // Fetch product details from database
  $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
  $stmt->bind_param("i", $product_id);
  $stmt->execute();
  $result = $stmt->get_result();
  $product = $result->fetch_assoc();

  if ($product) {
    $_SESSION['cart'][$product_id] = [
      'name' => $product['name'],
      'price' => $product['price'],
      'quantity' => $quantity
    ];
  }

  header("Location: cart.php");
  exit;
}

// Remove item logic
if (isset($_GET['action']) && $_GET['action'] == 'remove') {
  $id = $_GET['id'];
  unset($_SESSION['cart'][$id]);
  header("Location: cart.php");
  exit;
}
?>

<?php include 'includes/header.php'; ?>

<div class="wrapper">

  <div class="container">
    <h2>Your Shopping Cart</h2>

    <table>
      <thead>
        <tr>
          <th>Product</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Total</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $grand_total = 0;
        if (!empty($_SESSION['cart'])) {
          foreach ($_SESSION['cart'] as $id => $item) {
            $total = $item['price'] * $item['quantity'];
            $grand_total += $total;
            echo "<tr>
                    <td>{$item['name']}</td>
                    <td>{$item['quantity']}</td>
                    <td>₹{$item['price']}</td>
                    <td>₹$total</td>
                    <td><a href='cart.php?action=remove&id=$id' class='btn' onclick='return confirmRemove()'>Remove</a></td>
                  </tr>";
          }
        } else {
          echo "<tr><td colspan='5'>Your cart is empty.</td></tr>";
        }
        ?>
      </tbody>
    </table>

    <div style="text-align: right; margin-top: 20px;">
      <strong id="grand-total">Total: ₹<?php echo $grand_total; ?></strong><br><br>
      <?php if ($grand_total > 0): ?>
        <a href="checkout.php" class="btn">Proceed to Checkout</a>
      <?php endif; ?>
    </div>
  </div>

</div>

<script>
  function confirmRemove() {
    return confirm("Are you sure you want to remove this item from your cart?");
  }
</script>

<?php include 'includes/footer.php'; ?>
