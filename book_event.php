<?php
session_start();
require_once __DIR__ . "/includes/db.php";
include("includes/header.php");
?>

<h2 class="section-title">All Events</h2>

<div class="event-container">

<?php
$sql = "SELECT * FROM events ORDER BY event_date DESC";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()){

    $imagePath = "assets/images/uploads/" . $row['image'];

    if(empty($row['image']) || !file_exists($imagePath)){
        $imagePath = "assets/images/logo.png";
    }
?>

<div class="event-card">

    <img src="<?php echo $imagePath; ?>" alt="event image">

    <h3><?php echo $row['title']; ?></h3>

    <p><?php echo $row['description']; ?></p>

    <p><strong>Date:</strong> <?php echo $row['event_date']; ?></p>

    <a href="book_flow.php?event_id=<?php echo $row['id']; ?>" class="btn">
    Book Now
</a>

</div>

<?php } ?>

</div>

<?php include("includes/footer.php"); ?>