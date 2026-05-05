<?php
require_once __DIR__ . "/includes/db.php";
include("includes/header.php");

$result = $conn->query("SELECT * FROM events");
?>

<h2 class="section-title">All Events</h2>

<section class="events-grid">

<?php if($result && $result->num_rows > 0){ ?>

<?php while($row = $result->fetch_assoc()){ ?>

<div class="event-card reveal">
    <img src="assets/images/uploads/<?php echo $row['image']; ?>" alt="event">
    
    <div class="event-content">
        <span style="color:#22c55e;font-size:12px;"><?php echo $row['category']; ?></span>
        <h3><?php echo $row['title']; ?></h3>
        <p><?php echo substr($row['description'],0,90); ?>...</p>
        <p><strong><?php echo $row['event_date']; ?></strong></p>
        <a href="event_details.php?id=<?php echo $row['id']; ?>" class="btn">View Details</a>
    </div>
</div>

<?php } ?>

<?php } else { ?>
    <p style="text-align:center;">No events found in database.</p>
<?php } ?>

</section>

<?php include("includes/footer.php"); ?>