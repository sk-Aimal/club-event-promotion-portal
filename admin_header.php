<?php
if(session_status()==PHP_SESSION_NONE){
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<header>
    <div class="logo-area">
        <img src="../assets/images/logo.png">
        <h1>Admin Control Panel</h1>
    </div>

    <nav class="main-nav">
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="add_event.php">Add Event</a></li>
            <li><a href="manage_events.php">Manage Events</a></li>
            <li><a href="../events.php">View Site Events</a></li>
        </ul>
    </nav>

    <div class="right-tools">
        <a href="../index.php" class="mini-btn">Main Site</a>
        <a href="../logout.php" class="mini-btn">Logout</a>
    </div>
</header>