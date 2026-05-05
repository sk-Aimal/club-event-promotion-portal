<?php
require_once __DIR__ . "/includes/db.php";

$id = $_GET['id'];

$conn->query("DELETE FROM events WHERE id='$id'");

echo "<script>alert('Event Deleted'); window.location='manage_events.php';</script>";
?>