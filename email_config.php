use PHPMailer\PHPMailer\PHPMailer;
function sendEmail($to,$subject,$message){
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'your_email@gmail.com';
    $mail->Password = 'your_app_password';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('your_email@gmail.com','Club Event Hub');
    $mail->addAddress($to);
    $mail->Subject = $subject;
    $mail->Body = $message;

    $mail->send();
}