<?php
// require 
require_once('db.php');

$id = $_GET['id'];

// delete the form from sql database. first we prepare the database, and then we will excute it. we cant directly delete the form
if ($id) {
    $sql = "DELETE FROM person WHERE id = :id";

    $stmt = $db->prepare($sql);

    $stmt->execute([
        ':id' => $id
    ]);
}

// we will redirect the header after deleted the database 
header("Location: index.php");
exit;