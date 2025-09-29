<?php include 'includes/header.php'; ?>

<link rel="stylesheet" href="css/style.css">
<style>

.bestseller {
  margin-bottom: 40px;
  text-align: center;
}

  .bestseller-list {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 20px;
    background: white; /* Debug visual */
  }

  .bestseller-item {
  flex: 1 1 30%;
  background-color: #fff0f5;
  padding: 20px;
  border-radius: 10px;
  text-align: center;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.bestseller-item:hover {
  transform: translateY(-5px);
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
}

.bestseller-item img {
  width: 250px;
  height: 200px;
  object-fit: cover;
  margin-bottom: 15px;
  border-radius: 8px;
}

.bestseller-item h4 {
  margin-bottom: 10px;
  color: #e91e63;
}
</style>

<!-- HERO SECTION -->
<header class="hero" id="home">
  <div class="hero-overlay">
    <div class="hero-content">
      <h1>Make Every Moment Bloom 🌺</h1>
      <p>Bloomscart delivers fresh flowers and curated gifts right to your doorstep</p>
      <a href="shop.php" class="cta-button">Shop Now</a>
    </div>
  </div>
</header>

<!-- ABOUT SECTION -->
<section class="about" id="about">
  <div class="container">
    <h2>Why Choose BloomsCart?</h2>

    <!-- About Features -->
    <div class="about-wrapper">
      <div class="about-features">
        <div class="about-box">
          <img src="images/image1.jpeg" alt="Fresh Flowers Icon">
          <h3>Fresh Flowers</h3>
          <p>Our flowers are hand-picked and delivered fresh, always.</p>
        </div>
        <div class="about-box">
          <img src="images/image2.jpeg" alt="Unique Gifts Icon">
          <h3>Unique Gifts</h3>
          <p>Perfect gift combos for birthdays, anniversaries & surprises.</p>
        </div>
        <div class="about-box">
          <img src="images/image3.jpg" alt="Fast Delivery Icon">
          <h3>Fast Delivery</h3>
          <p>Same-day delivery in major cities. Always on time!</p>
        </div>
      </div>
    </div>

    <!-- Bestsellers -->
    <div class="bestsellers">
      <h2>Our Bestsellers</h2>
      <div class="bestseller-list">
        <div class="bestseller-item">
          <img src="images/rose2.jpg" alt="Rose Bouquet">
          <h4>Rose Bouquet</h4>
          <p>₹500</p>
          <a href="product.php?id=1" class="btn">View</a>
        </div>

        <div class="bestseller-item">
          <img src="images/gift.jpg" alt="Gift Box">
          <h4>Luxury Gift Box</h4>
          <p>₹950</p>
          <a href="product.php?id=6" class="btn">View</a>
        </div>

        <div class="bestseller-item">
          <img src="images/tulip.jpg" alt="Tulip">
          <h4>Tulip Bundle</h4>
          <p>₹700</p>
          <a href="product.php?id=4" class="btn">View</a>
        </div>
      </div>
    </div>

    <!-- Contact Info -->
    <div class="contact-info" id="contact">
      <h3>Contact Us</h3>
      <p><strong>Email:</strong> contact@bloomscart.com</p>
      <p><strong>Phone:</strong> +91 98765 43210</p>
      <p><strong>Address:</strong> 123 Flower Street, Pune, India</p>
    </div>

  </div>
</section>

<?php include 'includes/footer.php'; ?>
