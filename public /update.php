<?php
//require 
require 'db.php';

$id = $_GET['id'];

//we are fetching the data and we use select* from query for updating data
$stmt = $db->prepare("SELECT * FROM person WHERE id = :id");

$stmt->execute([':id' => $id]);

$student = $stmt->fetch();

// updating data by preparing and excuting the database
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'];

    $email = $_POST['email'];

    $update = $db->prepare("UPDATE person SET name = :name, email = :email WHERE id = :id");
    $update->execute([

        ':name' => $name, 
        ':email' => $email,
         ':id' => $id

        ]);
    //  we will redirect the header after update the database 
    header("Location: index.php");
    exit;
}
