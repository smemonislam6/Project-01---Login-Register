<?php
include __DIR__ . '/../src/helpers.php';
session_start();
$name = input_sanitize($_POST['name']);
$email = input_sanitize($_POST['email']);
$password = input_sanitize($_POST['password']);
$confirmPassword = input_sanitize($_POST['confirm_password']);

$errors = [];

$nameError = validate_name($name);
if ($nameError) {
    $errors[] = $nameError;
}

$emailError = validate_email($email);
if ($emailError) {
    $errors[] = $emailError;
}

$passwordError = validate_password($password);
if ($passwordError) {
    $errors[] = $passwordError;
}

if ($password !== $confirmPassword) {
    $errors[] = "Passwords do not match.";
}

if(count($errors) > 0) {
    $_SESSION['errors'] = $errors;
    header('Location: ../public/register.php');
    exit();
}
