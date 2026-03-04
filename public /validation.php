<?php

// making error list, and add incorrect and unvalidated datas 
$errors = [];
$first_name = "";
$last_name="";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1- we sanitizing the inputs. here we have first/last name, phone, and email. we make sure that email/phone is in right input, and name was writen with correct charecters. 
    $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
    $last_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS));

    //validating first-name, last-name,email address, and phone. the email address and name cannot be empty or else it will add to the errors list.
    if (empty($first_name)) {
        $errors[] = "First name is required.";
    }

    if (empty($last_name)) {
        $errors[] = "last name is required.";
    }

    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email.";
    }

    if (empty(trim($phone))) {
    $errors[] = "Phone number is required.";
   } elseif (!preg_match('/^[0-9]{10}$/', $phone)) {
    // we will use regex here.  phone number should be ten digits 
    $errors[] = "telephone number should be 10 digits.";

    //Successful if no error detected 
    if (empty($errors)) {
        echo "valid!";
        //if error list empty, our inputs are correct and validated. then it will exit.
    }
}
