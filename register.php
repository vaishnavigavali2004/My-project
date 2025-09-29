<?php include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];

  if ($password === $confirm_password) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $hashed_password);

    if ($stmt->execute()) {
      echo "<script>alert('Registration successful!'); window.location='login.php';</script>";
    } else {
      echo "<script>alert('Error: Email already exists');</script>";
    }

    $stmt->close();
  } else {
    echo "<script>alert('Passwords do not match');</script>";
  }

  $conn->close();
}
?>

<?php include 'includes/header.php'; ?>

<style>
  * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }

  body, html {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #fdf6f8;
  }

  .wrapper {
    display: flex;
    justify-content: center;
    padding: 60px 20px;
  }

  .container {
    background: white;
    padding: 40px 30px;
    border-radius: 12px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
    text-align: center;
  }

  .container h2 {
    font-size: 28px;
    margin-bottom: 25px;
    color: #ff69b4;
  }

  form {
    width: 100%;
  }

  form input {
    width: 100%;
    padding: 12px 15px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 16px;
    transition: border 0.3s ease;
  }

  form input:focus {
    border-color: #ff69b4;
    outline: none;
  }

  form button {
    width: 100%;
    background-color: #ff69b4;
    color: white;
    padding: 12px;
    font-size: 16px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    margin-top: 10px;
    transition: background-color 0.3s ease;
  }

  form button:hover {
    background-color: #ff3c9e;
  }

  .container p {
    margin-top: 15px;
    font-size: 15px;
  }

  .container a {
    color: #ff69b4;
    text-decoration: none;
  }

  .container a:hover {
    text-decoration: underline;
  }

  @media (max-width: 768px) {
    .container {
      padding: 30px 20px;
    }
  }
</style>

<!-- Form Section Only -->
<div class="wrapper">
  <div class="container">
    <h2>Register</h2>

    <form action="register.php" method="POST">
      <input type="text" name="name" placeholder="Full Name" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="password" name="confirm_password" placeholder="Confirm Password" required>
      <button type="submit">Register</button>
    </form>

    <p>Already have an account? <a href="login.php">Login here</a></p>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
