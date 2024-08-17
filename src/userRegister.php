<?php
    include "C:\laragon\www\Class\Project 01\src/helpers.php";

    $name = input_sanitize($_POST['name']);
    $email = validate_email(input_sanitize($_POST['email']));
    $password = input_sanitize($_POST['password']);
    $confirmPassword = input_sanitize($_POST['confirm_password']);


    $errors = [];

    if(validate_name($name))
    {
        $errors[] = validate_name($name);
    }

    if(validate_email($email))
    {
        $errors[] = validate_email($email);
    }

    if(validate_password($password))
    {
        $errors[] = validate_password($password);
    }


    if(count($errors) > 0)
    {
        header('Location:../public/register.php');
    }




    




