<?php
session_start();
require_once __DIR__ . "/includes/db.php";

$event_id = $_GET['event_id'] ?? null;

if(!$event_id){
    die("Invalid Event");
}

$_SESSION['event_id'] = $event_id;

// STEP 1: NOT LOGGED IN → REGISTER FIRST
if(!isset($_SESSION['user'])){
    header("Location: register.php");
    exit();
}

// STEP 2: LOGGED IN → PAYMENT
header("Location: payment.php");
exit();
?>