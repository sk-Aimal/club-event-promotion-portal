<?php
require_once __DIR__ . "/includes/db.php";
include("../includes/admin_header.php");

$id = $_GET['id'];
$row = $conn->query("SELECT * FROM events WHERE id='$id'")->fetch_assoc();

if(isset($_POST['update'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $date = $_POST['event_date'];
    $location = $_POST['location'];

    if($_FILES['image']['name']!=""){
        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'],"../assets/images/uploads/".$image);
        $conn->query("UPDATE events SET title='$title',description='$description',category='$category',
        event_date='$date',location='$location',image='$image' WHERE id='$id'");
    }else{
        $conn->query("UPDATE events SET title='$title',description='$description',category='$category',
        event_date='$date',location='$location' WHERE id='$id'");
    }

    echo "<script>alert('Event Updated Successfully'); window.location='manage_events.php';</script>";
}
?>

<section class="hero" style="min-height:35vh;">
    <div class="hero-content reveal">
        <h2>Edit Existing Event</h2>
        <p>Modify event information and keep platform records updated.</p>
    </div>
</section>

<div class="form-container reveal">
    <form method="POST" enctype="multipart/form-data">
        <input name="title" value="<?php echo $row['title']; ?>" required>
        <textarea name="description" rows="5" required><?php echo $row['description']; ?></textarea>
        <input name="category" value="<?php echo $row['category']; ?>" required>
        <input type="date" name="event_date" value="<?php echo $row['event_date']; ?>" required>
        <input name="location" value="<?php echo $row['location']; ?>" required>
        <input type="file" name="image">
        <button type="submit" name="update">Update Event</button>
    </form>
</div>

<?php include("../includes/admin_footer.php"); ?>