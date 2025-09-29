<?php
include 'includes/header.php';
include 'includes/db.php';




if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<p>Invalid product ID.</p>";
    include 'includes/footer.php';
    exit;
}

$product_id = (int)$_GET['id'];
$query = "SELECT * FROM products WHERE id = $product_id";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) === 1) {
    $product = mysqli_fetch_assoc($result);
} else {
    echo "<p>Product not found.</p>";
    include 'includes/footer.php';
    exit;
}
?>

<div class="wrapper">
  <div class="container">
    <div class="product-detail" style="display: flex; flex-wrap: wrap; gap: 40px; align-items: flex-start; padding: 40px 0;">
      
      <div class="product-image" style="flex: 1 1 45%; text-align: center;">
        <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" style="width: 100%; max-width: 450px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
      </div>

      <div class="details" style="flex: 1 1 45%; background-color: #fff0f5; padding: 30px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.05);">
        <h2 class="product-title" style="color: #e91e63; font-size: 32px; margin-bottom: 15px;"><?php echo $product['name']; ?></h2>
        <p class="product-description" style="font-size: 18px; color: #444; margin-bottom: 20px;"><?php echo $product['description']; ?></p>
        <p class="product-price" style="font-size: 20px; font-weight: bold; margin-bottom: 25px;"><strong>Price:</strong> ₹<?php echo $product['price']; ?></p>

        <form action="cart.php?action=add" method="POST">
          <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
          <label for="quantity" style="font-weight: 500;">Quantity:</label>
          <input type="number" id="quantity" name="quantity" value="1" min="1" style="width: 70px; padding: 8px; margin: 10px 0; border: 1px solid #ccc; border-radius: 4px;">
          <br>
          <button type="submit" class="btn">Add to Cart</button>
        </form>
      </div>

    </div>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
