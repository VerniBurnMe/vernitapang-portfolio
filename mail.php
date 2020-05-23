<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$subject = $_POST['subject'];
$content="From: $name \n Email: $email \n Message: $message";
$recipient = "verni.tapang@gmail.com";
$mailheader = "From: $email \r\n";
$okMessage = 'Contact form successfully submitted. Thank you, I will get back to you soon!';
$errorMessage = 'There was an error while submitting the form. Please try again later';

try {
    $emailText = "You have new message from contact form\n=============================\n";
    foreach ($_POST as $key => $value) {
        if (isset($fields[$key])) {
            $emailText .= "$fields[$key]: $value\n";
        }
    }

    mail($recipient, $subject, $content, $mailheader);
    $responseArray = array('type' => 'success', 'message' => $okMessage);
}
catch (\Exception $e) {
    $responseArray = array('type' => 'danger', 'message' => $errorMessage);
}

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);

    header('Content-Type: application/json');
    echo $encoded;
} else {
    echo $responseArray['message'];
}
?>
