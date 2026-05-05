<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Eventora</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<!-- POPUP SYSTEM -->
<?php if(isset($_SESSION['success'])) { ?>
    <div class="popup success">
        <?php echo $_SESSION['success']; ?>
    </div>
<?php unset($_SESSION['success']); } ?>

<?php if(isset($_SESSION['error'])) { ?>
    <div class="popup error">
        <?php echo $_SESSION['error']; ?>
    </div>
<?php unset($_SESSION['error']); } ?>


<!-- NAVBAR -->
<header class="navbar">

    <div class="logo-area">
        <img src="assets/images/logo.png" alt="logo">
        <h1>Eventora</h1>
    </div>

    <nav class="main-nav">

        <ul>
            <li><a href="index.php" class="nav-btn">Home</a></li>
            <li><a href="about.php" class="nav-btn">About</a></li>
            <li><a href="contact.php" class="nav-btn">Contact</a></li>

            <?php if(isset($_SESSION['user'])) { ?>
                <li><a href="my_bookings.php" class="nav-btn">My Bookings</a></li>
                <li><a href="logout.php" class="nav-btn">Logout</a></li>
            <?php } else { ?>
                <li><a href="login.php" class="nav-btn">Login</a></li>
                <li><a href="register.php" class="nav-btn">Register</a></li>
            <?php } ?>
        </ul>

    </nav>

</header>

<main>