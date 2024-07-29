<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $image = $_FILES['image'];

    // Check if the image was uploaded
    if ($image['error'] == 0) {
        $imageName = basename($image['name']);
        $targetDir = "images/";
        $targetFilePath = $targetDir . $imageName;

        // Move the uploaded file to the images directory
        if (move_uploaded_file($image['tmp_name'], $targetFilePath)) {
            // Insert the new menu item into the database
            $sql = "INSERT INTO menu_items (name, image_url) VALUES ('$name', '$targetFilePath')";
            if ($conn->query($sql) === TRUE) {
                echo "New menu item added successfully.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Please upload an image.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Menu Item</title>
    <link rel="stylesheet" href="add_menu_item.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Add Menu Item</h1>
        </div>
    </header>

    <section id="add-item" class="add-item">
        <div class="container">
            <form action="add_menu_item.php" method="post" enctype="multipart/form-data">
                <label for="name">Item Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="image">Item Image:</label>
                <input type="file" id="image" name="image" accept="image/*" required>

                <input type="submit" value="Add Item">
            </form>
        </div>
    </section>
</body>
</html>
