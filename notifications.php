<?php
session_start();
include("includes/header.php");
include("includes/db.php");

$user = $_SESSION['user'] ?? null;

if(!$user){
    echo "<p>Please login to view notifications.</p>";
    include("includes/footer.php");
    exit;
}

echo "<h2 class='section-title'>Notifications</h2>";

$sql = "SELECT * FROM bookings WHERE user_email='$user'";
$result = $conn->query($sql);

if($result && $result->num_rows > 0){
    
    while($row = $result->fetch_assoc()){
        echo "<div class='event-card'>
                <p>✔ Booking confirmed for Event ID: {$row['event_id']}</p>
              </div>";
    }
    
}else{
    echo "<p style='text-align:center;'>No notifications yet</p>";
}

include("includes/footer.php");
?>