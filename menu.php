<?php
include 'config.php';

$sql = "SELECT name, image_url FROM menu_items";
$result = $conn->query($sql);

$menu_items = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $menu_items[] = $row;
    }
}

$conn->close();
?>
