<?php
$query = $db->query("SELECT * FROM registration");
$students = $query->fetchAll();
?>

<form method="POST">
    <input type="text" name="first_name" placeholder="Name" required>
    <input type="text" name="last_name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="phone" name="phone" placeholder="Phone" required>
</form>