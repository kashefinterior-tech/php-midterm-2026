<?php
$query = $db->query("SELECT * FROM person");
$students = $query->fetchAll();
?>

<form method="POST">
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
</form>