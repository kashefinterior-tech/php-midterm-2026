<?php

// making error list, and add incorrect and unvalidated datas 
$errors = [];
$first_name = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1- we sanitizing the inputs. here we have first name and email. we make sure that email is in right input, and name was writen with correct charecters 
    $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    //validating first-name and email address. the email address and name cannot be empty or else it will add to the errors list.
    if (empty($first_name)) {
        $errors[] = "First name is required.";
    }

    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email.";
    }

    //Successful if no error detected 
    if (empty($errors)) {
        echo "valid!";
        //if error list empty, our inputs are correct and validated. then it will exit.
    }
}
?>