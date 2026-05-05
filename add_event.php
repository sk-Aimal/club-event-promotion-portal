<?php
require_once __DIR__ . "/includes/db.php";
include("../includes/admin_header.php");

if(isset($_POST['add'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $date = $_POST['event_date'];
    $location = $_POST['location'];

    $image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'],"../assets/images/uploads/".$image);

    $conn->query("INSERT INTO events(title,description,category,event_date,location,image)
    VALUES('$title','$description','$category','$date','$location','$image')");

    $conn->query("INSERT INTO notifications(message) VALUES('A new event: $title has been published.')");

    echo "<script>alert('New Event Added Successfully'); window.location='manage_events.php';</script>";
}
?>

<section class="hero" style="min-height:35vh;">
    <div class="hero-content reveal">
        <h2>Publish New Event</h2>
        <p>Create fresh activities and instantly notify all users.</p>
    </div>
</section>

<div class="form-container reveal">
    <form method="POST" enctype="multipart/form-data">
        <input name="title" placeholder="Event Title" required>
        <textarea name="description" placeholder="Event Description" rows="5" required></textarea>
        <input name="category" placeholder="Category" required>
        <input type="date" name="event_date" required>
        <input name="location" placeholder="Event Location" required>
        <input type="file" name="image" required>
        <button type="submit" name="add">Publish Event</button>
    </form>
</div>

<?php include("../includes/admin_footer.php"); ?>