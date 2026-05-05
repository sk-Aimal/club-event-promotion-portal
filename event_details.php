<?php
require_once __DIR__ . "/includes/db.php";
include("includes/header.php");

$id = $_GET['id'];
$row = $conn->query("SELECT * FROM events WHERE id='$id'")->fetch_assoc();
?>

<section class="events-grid" style="width:80%;margin:60px auto;">
    <div class="event-card reveal">
        <img src="assets/images/uploads/<?php echo $row['image']; ?>">
    </div>

    <div class="event-card reveal">
        <h2><?php echo $row['title']; ?></h2>
        <p style="line-height:1.8;"><?php echo $row['description']; ?></p>
        <p><strong>Category:</strong> <?php echo $row['category']; ?></p>
        <p><strong>Date:</strong> <?php echo $row['event_date']; ?></p>
        <p><strong>Location:</strong> <?php echo $row['location']; ?></p>
        <br>
        <a href="payment.php?id=<?php echo $row['id']; ?>" class="btn">Book & Pay</a>
    </div>
</section>

<?php include("includes/footer.php"); ?>