<?php include 'includes/header.php'; ?>

<div class="container">
  <h2>Checkout</h2>
  <form action="thankyou.php" method="POST">
    <input type="text" name="name" placeholder="Your Full Name" required><br><br>
    <input type="text" name="address" placeholder="Shipping Address" required><br><br>
    <input type="text" name="phone" placeholder="Phone Number" required><br><br>
    <button type="submit" class="btn">Place Order</button>
  </form>
</div>

<?php include 'includes/footer.php'; ?>
