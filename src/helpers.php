<?php 

include_once __DIR__ . "/../src/config.php";

function app_url(string $path)
{
    return BASE_URL . '/' . ltrim($path, '/');
}

function input_sanitize(string $data): string
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function validate_name(string $name): null|string
{
    if(empty($name))
    {
        return "Name field is required";
    }
    return null;
}

function validate_email(string $email): null|string
{
    if(empty($email))
    {
        return "Email field is required.";
    }

    return !filter_var($email, FILTER_VALIDATE_EMAIL) ? "Please Enter a Valid Email" : null;
}

function validate_password(string $password): null|string
{
    if(empty($password))
    {
        return "Password field is required.";
    }

    if(strlen($password) <= 6){
        return "Password must be at least 6 characters.";
    }

    if (!preg_match('/[A-Z]/', $password)) {
        return "Password must contain at least one uppercase letter.";
    }

    if (!preg_match('/[a-z]/', $password)) {
        return "Password must contain at least one lowercase letter.";
    }

    if (!preg_match('/[0-9]/', $password)) {
        return "Password must contain at least one number.";
    }

    if (!preg_match('/[\W_]/', $password)) {
        return "Password must contain at least one special character.";
    }

    return null;

}


