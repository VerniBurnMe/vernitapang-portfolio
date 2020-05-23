<?php
$headers = 'From: <test@test.com>' . "\r\n" .
'Reply-To: <test@test.com>';

mail('<myEmail@gmail.com>', 'the subject', 'the message', $headers,
  '-fwebmaster@example.com');
?>
