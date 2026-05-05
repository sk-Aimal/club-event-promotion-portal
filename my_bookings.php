<?php
session_start();
require_once __DIR__ . "/includes/db.php";
include("includes/header.php");

$user_id = $_SESSION['user']['id'];

$sql = "SELECT b.*, e.title, e.image, e.event_date
        FROM bookings b
        JOIN events e ON b.event_id = e.id
        WHERE b.user_id='$user_id'";

$result = $conn->query($sql);
?>

<h2 class="section-title">My Bookings</h2>

<div class="event-container">

<?php while($row = $result->fetch_assoc()){ ?>

<div class="bookings-container">

<?php while($row = $result->fetch_assoc()){ ?>

<div class="booking-card">

    <img src="assets/images/uploads/<?php echo $row['image']; ?>">

    <h4><?php echo $row['title']; ?></h4>

    <p><?php echo $row['event_date']; ?></p>

</div>

<?php } ?>

</div>

<?php } ?>

</div>

<?php include("includes/footer.php"); ?>