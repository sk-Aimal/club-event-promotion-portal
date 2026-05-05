<?php
session_start();
require_once __DIR__ . "/includes/db.php";

if(isset($_POST['login'])) {
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);
    
    if($result && $result->num_rows > 0){
        
        $user = $result->fetch_assoc();
        
        if(password_verify($password, $user['password'])) {
            
            $_SESSION['user'] = $user;
            $_SESSION['success'] = "✅ You are successfully logged in!";
            header("Location: index.php");
            exit();
            
        } else {
            $_SESSION['error'] = "❌ Incorrect password!";
        }
        
    } else {
        $_SESSION['error'] = "❌ User not found!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Eventora</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<!-- GLOBAL HEADER (SAME ON ALL PAGES) -->
<?php include("includes/header.php"); ?>

<!-- LOGIN FORM -->
<div class="auth-wrapper">

    <div class="auth-container">

        <h2>Login to Eventora</h2>

        <form method="POST">

            <input type="email" name="email" placeholder="Enter Email" required>

            <input type="password" name="password" placeholder="Enter Password" required>

            <button class="btn" name="login">Login</button>

        </form>

        <p>Don't have an account? <a href="register.php">Register</a></p>

    </div>

</div>

<?php include("includes/footer.php"); ?>

</body>
</html>