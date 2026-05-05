<?php
session_start();
require_once __DIR__ . "/includes/db.php";

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

if(!isset($_SESSION['event_id'])){
    header("Location: index.php");
    exit();
}

$event_id = $_SESSION['event_id'];
$user_id = $_SESSION['user']['id'];

// GET EVENT
$event = $conn->query("SELECT * FROM events WHERE id='$event_id'")->fetch_assoc();

if(isset($_POST['pay'])){
    
    $payment_method = "Card"; // or Cash / JazzCash etc.
    
    $sql = "INSERT INTO bookings (user_id, event_id, payment_method)
            VALUES ('$user_id', '$event_id', '$payment_method')";
    
    if($conn->query($sql)){
        
        unset($_SESSION['event_id']);
        
        $_SESSION['success'] = "🎉 Booking Successful!";
        header("Location: my_bookings.php");
        exit();
        
    } else {
        $_SESSION['error'] = "Payment failed!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<div class="payment-container">

    <h2>Payment Page</h2>

    <h3><?php echo $event['title']; ?></h3>

    <form method="POST">
        <button class="btn" name="pay">Pay & Confirm Booking</button>
    </form>

</div>

</body>
</html>