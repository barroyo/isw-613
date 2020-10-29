<?php

  if ($argc <= 1)
  {
    echo "Arguments missing...\n";
    echo "Use:\n\n\tphp sendmail recipient@email.com subject\n\n";
    exit;
  }
  $recipient = $argv[1];
  $subject = $argv[2];
  $message = "Sending email to $recipient with subject $subject\n";

  echo $message;
  mail($recipient, $subject, $message);
