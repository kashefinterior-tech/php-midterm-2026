<?php 

//require
require 'db.php'; 

// we are creating the logic by asking the server 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

//we asking user to enter the input (first name, last name, email, and phone). we first filter and  sanitize them from any wrong inputs and characters

    $first_name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $last_name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS));


//when we receive the inputs we then prepare the sql, and for create query, we use Insert into. and then we excute them.

    if ($name && $email) {
        $stmt = $db->prepare("INSERT INTO registration (fist_name, last_name, email, phone) VALUES (:first_name, :last_name,:email, :phone)");
        $stmt->execute([
            ':firt_name' => $firts_name,
            ':last_name'=> $last_name,
             ':email' => $email,
             ':phone'=> $phone
            ]);
    }
}
