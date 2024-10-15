<?php
$recipient = $argv[1] ?? 'noreply@gmail.com';
$subject = $argv[2] ?? 'Default Subject';

echo "Sending email to $recipient with subject $subject \n";

mail($recipient,$subject,"Body");
echo "Email sent! \n";