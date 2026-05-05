<?php
session_start();
require_once('tcpdf/tcpdf.php');

$pdf = new TCPDF();
$pdf->AddPage();

$pdf->SetFont('helvetica', 'B', 22);
$pdf->Cell(0, 15, 'EVENTORA TICKET', 0, 1, 'C');

$pdf->Ln(5);

$pdf->SetFont('helvetica', '', 14);

$name = $_SESSION['user']['name'] ?? 'Guest';

$pdf->Cell(0, 10, 'Name: ' . $name, 0, 1);
$pdf->Cell(0, 10, 'Event: Club Event Booking', 0, 1);
$pdf->Cell(0, 10, 'Status: Confirmed', 0, 1);

$pdf->Ln(10);

$pdf->SetFont('helvetica', 'B', 12);
$pdf->Cell(0, 10, 'Thank you for booking with Eventora!', 0, 1, 'C');

$pdf->Output('ticket.pdf', 'I');
if($conn->query($sql)) {
    
    $_SESSION['success'] = "🎟️ Event booked successfully!";
    
    header("Location: my_bookings.php");
    exit();
}
?>