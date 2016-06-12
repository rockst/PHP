<?php
$email = 'rockst@gmail.com';
$email_sanitized = filter_var($email, FILTER_SANITIZE_EMAIL);
echo $email_sanitized . "\n";
$email_is_valid = filter_var($email, FILTER_VALIDATE_EMAIL);
echo $email_is_valid . "\n";

$input = 'rrr';
$is_alpha = ctype_alpha($input);
echo $is_alpha . "\n";
$input = 'rrr';
$is_integer = ctype_digit($input);
echo $is_integer . "\n";
$input = 'rrr';
$is_alphanumeric = ctype_alnum($input);
echo $is_alphanumeric . "\n";