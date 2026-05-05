<?php
session_start();
require_once __DIR__ . "/includes/db.php";
include("includes/header.php");
?>

<!-- HERO -->
<section class="hero">

    <div class="hero-content">

        <h1 class="hero-title">WELCOME TO EVENTORA</h1>

        <p class="hero-slogan">
            Experience Events Beyond Limits<br>
            Discover, book, and enjoy premium events in one place
        </p>

        <a href="book_event.php" class="btn hero-btn">
            Explore Events
        </a>

    </div>

</section>
<section class="stats">

<div class="stat-box">
    <h2>120+</h2>
    <p>Events Hosted</p>
</div>

<div class="stat-box">
    <h2>500+</h2>
    <p>Users Registered</p>
</div>

<div class="stat-box">
    <h2>300+</h2>
    <p>Bookings Made</p>
</div>

<div class="stat-box">
    <h2>50+</h2>
    <p>Live Events</p>
</div>

</section>
<section class="reviews">

<h2 class="section-title">What People Say</h2>

<div class="review-container">

<div class="review-card">
    <p>"Amazing platform for booking events!"</p>
    <h4>- Ali</h4>
</div>

<div class="review-card">
    <p>"Very smooth and easy to use system."</p>
    <h4>- Sara</h4>
</div>

<div class="review-card">
    <p>"Loved the UI and fast booking process."</p>
    <h4>- Ahmed</h4>
</div>

</div>

</section>

<!-- EVENTS -->
<h2 class="section-title">Featured Events</h2>

<div class="event-container">

<?php
$sql = "SELECT * FROM events ORDER BY event_date DESC LIMIT 3";
$result = $conn->query($sql);

if($result && $result->num_rows > 0){

    while($row = $result->fetch_assoc()){

        // FIXED: safe web path (NO file_exists in URL logic)
        $imagePath = "assets/images/uploads/" . $row['image'];

        if(empty($row['image'])){
            $imagePath = "assets/images/logo.png";
        }
?>

<div class="event-card">

    <img src="<?php echo $imagePath; ?>" alt="event image">

    <div class="event-content">

        <h3><?php echo htmlspecialchars($row['title']); ?></h3>

        <p>
            <?php echo substr(htmlspecialchars($row['description']),0,110); ?>...
        </p>

        <p><strong>Date:</strong> <?php echo $row['event_date']; ?></p>

        <a href="event_details.php?id=<?php echo $row['id']; ?>" class="btn">
            View Details
        </a>

    </div>

</div>

<?php
    }

}else{
    echo "<p class='empty-state'>No events available at the moment</p>";
}
?>

</div>

<?php include("includes/footer.php"); ?>