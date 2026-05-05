<?php
session_start();
require_once __DIR__ . "/includes/db.php";

if(isset($_POST['register'])) {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO users (name, email, password)
            VALUES ('$name', '$email', '$password')";
    
    if($conn->query($sql)) {
        
        $_SESSION['success'] = "🎉 You are successfully registered!";
        header("Location: login.php");
        exit();
        
    } else {
        $_SESSION['error'] = "❌ Registration failed!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register - Eventora</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<!-- NAVBAR -->
<header class="navbar">
    <div class="logo-area">
        <div class="logo-icon">E</div>
        <h1>Eventora</h1>
    </div>

    <nav class="main-nav">
        <a href="index.php" class="nav-btn">Home</a>
        <a href="login.php" class="nav-btn">Login</a>
    </nav>
</header>

<!-- REGISTER -->
<div class="auth-wrapper">

    <div class="auth-container">

        <h2>Create Account</h2>

        <form method="POST">

            <input type="text" name="name" placeholder="Full Name" required>

            <input type="email" name="email" placeholder="Email" required>

            <input type="password" name="password" placeholder="Password" required>

            <button class="btn" name="register">Register</button>

        </form>

        <p>Already have an account? <a href="login.php">Login</a></p>

    </div>

</div>

</body>
</html>