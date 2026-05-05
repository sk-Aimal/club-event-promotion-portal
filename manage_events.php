<?php
include("../db.php");
include("../includes/admin_header.php");

$result = $conn->query("SELECT * FROM events ORDER BY id DESC");
?>

<section class="hero" style="min-height:35vh;">
    <div class="hero-content reveal">
        <h2>Manage Published Events</h2>
        <p>Edit, monitor or remove any existing event records.</p>
    </div>
</section>

<section class="events-grid">
<?php while($row = $result->fetch_assoc()){ ?>
    <div class="event-card reveal">
        <img src="../assets/images/uploads/<?php echo $row['image']; ?>">
        <div class="event-content">
            <h3><?php echo $row['title']; ?></h3>
            <p><?php echo substr($row['description'],0,80); ?>...</p>
            <p><strong><?php echo $row['event_date']; ?></strong></p>
            <br>
            <a href="edit_event.php?id=<?php echo $row['id']; ?>" class="btn">Edit</a>
            <a href="delete_event.php?id=<?php echo $row['id']; ?>" class="mini-btn" onclick="return confirmDelete()">Delete</a>
        </div>
    </div>
<?php } ?>
</section>

<?php include("../includes/admin_footer.php"); ?>