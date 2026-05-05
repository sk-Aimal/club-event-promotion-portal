<?php
$conn = new mysqli("localhost", "root", "", "club_event_promotion");

if ($conn->connect_error) {
    die("DB Connection Failed: " . $conn->connect_error);
}
?>