<?php include 'includes/header.php'; ?>

<?php
session_start();
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $stmt = $conn->prepare("SELECT id, name, password FROM users WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows > 0) {
    $stmt->bind_result($id, $name, $hashed_password);
    $stmt->fetch();

    if (password_verify($password, $hashed_password)) {
      $_SESSION['user_id'] = $id;
      $_SESSION['user_name'] = $name;
      header("Location: index.php");  // Redirect to homepage
      exit();
    } else {
      echo "<script>alert('Incorrect password');</script>";
    }
  } else {
    echo "<script>alert('No user found with this email');</script>";
  }

  $stmt->close();
  $conn->close();
}
?>


<style>
  /* === Global Reset and Overflow Fix === */
  *,
  *::before,
  *::after {
    box-sizing: border-box;
  }

  html, body {
    margin: 0;
    padding: 0;
    overflow-x: hidden;
    max-width: 100vw;
    height: 100%;
  }

  /* === Login Page Styling === */
  .wrapper {
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 40px 20px;
    background: #fdf6f8;
  }

  .login-box {
    background: white;
    padding: 40px 30px;
    border-radius: 12px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }

  .login-box h2 {
    font-size: 28px;
    margin-bottom: 30px;
    color: #ff69b4;
  }

  .login-box input[type="email"],
  .login-box input[type="password"] {
    width: 100%;
    padding: 12px 15px;
    margin: 12px 0;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 16px;
  }

  .login-box button {
    width: 100%;
    background-color: #ff69b4;
    color: white;
    padding: 12px;
    font-size: 16px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.3s ease;
  }

  .login-box button:hover {
    background-color: #ff69b4;
  }

  .login-box p {
    margin-top: 15px;
    font-size: 16px;
  }

  .login-box a {
    color: #ff69b4;
    text-decoration: none;
  }

  .login-box a:hover {
    text-decoration: underline;
  }

  /* Responsive */
  @media (max-width: 768px) {
    .login-box {
      padding: 30px 20px;
    }
  }
</style>

<div class="wrapper">
  <div class="login-box">
    <h2>Login</h2>
    <form action="login.php" method="POST">
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="register.php">Register here</a></p>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
