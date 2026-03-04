<?php 

//require
require 'db.php'; 

// we are creating the logic by asking the server 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

//we asking user to enter the input (name and email). we first filter and  sanitize them from any wrong inputs and characters

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


//when we receive the inputs we then prepare the sql, and for create query, we use Insert into. and then we excute them.

    if ($name && $email) {
        $stmt = $db->prepare("INSERT INTO person (name, email) VALUES (:name, :email)");
        $stmt->execute([
            ':name' => $name,
             ':email' => $email
            ]);
    }
}
