<?php
include 'config.php';
$sql = "SELECT name, image_url FROM menu_items";
$result = $conn->query($sql);

$menu_items = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $menu_items[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Madurai Poratta Kadai</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Madurai Poratta Kadai</h1>
            <nav>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#menu">Menu Items </a></li>
                    <li><a href="#about">About Us </a></li>
                    <li><a href="#contact">Contact Us </a></li>
                    <li><a href="loginindex.php">Login/SignUp</a></li>

                </ul>
            </nav>
        </div>
    </header>

    <section id="home" class="hero">
        <div class="container">
            <h2>Welcome to Madurai Poratta Kadai</h2>
            <p>Enjoy delicious meals served with passion.</p>
        </div>
    </section>

    <section id="menu" class="menu">
        <div class="container">
            <h2>Our Menu</h2>
            <div class="menu-grid">
                <?php foreach ($menu_items as $item): ?>
                    <div class="menu-item">
                        <div class="image-wrapper">
                            <img src="<?php echo $item['image_url']; ?>" alt="<?php echo $item['name']; ?>">
                        </div>
                        <p><?php echo $item['name']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="about" class="about">
    <div class="container">
        <h2>About Us</h2>
        <p>Learn about our history and commitment to quality.</p>
        
        <!-- Founder Section -->
        <div class="founder">
            <div class="founder-img">
                <img src="founder.jpg" alt="Founder">
                <div class="founder-name">Mr. Muni aka Muniyandi</div>
            </div>
            <div class="founder-content">
                <h3>About Our Founder</h3>
                <p> Our founder, a culinary enthusiast with a deep-rooted love for traditional Madurai cuisine, envisioned a place where people could savor authentic porattas and other local delicacies. With a background in hospitality and a passion for cooking, they dedicated themselves to creating a warm and welcoming environment at Madurai Poratta Kadai. Their commitment to quality and innovation has been the driving force behind our success. Today, their vision continues to inspire our team to deliver an exceptional dining experience to every guest.</p>
                <h3>About Madurai Poratta Kadai</h3>
                <p>Madurai Poratta Kadai specializes in crafting the finest porattas, each one a testament to our dedication to excellence. Located conveniently opposite The American College, we offer a range of delicious options from traditional porattas to innovative variations like Bun Poratta and Ellai Poratta. Our menu also features a variety of fried rice and noodles, ensuring there's something for everyone. Whether you're looking for a quick bite or a hearty meal, Madurai Poratta Kadai promises a culinary delight that will leave you craving more.</p>
        </div>
    </div>
</section>



    <section id="contact" class="contact">
    <div class="container">
        <h2>Contact Us</h2>
        <div class="contact-info">
            <h3>Visit Us:</h3>
            <p>Madurai Poratta Kadai,<br>
            Opposite The American College,<br>
            Talakkulam Bus Stand,<br>
            Tallakullam 625002</p>
            
            <h3>Contact Number:</h3>
            <p>+91 70100 57944</p>
            
            <h3>Email:</h3>
            <p><a href="mailto:contact@mduprottakadai.in">contact@mduprottakadai.in</a></p>
            
            <h3>Restaurant Hours:</h3>
            <p>Mon - Sun: 11am - 11pm</p>
        </div>
    </div>
</section>

    <footer>
        <div class="container">
            <p>&copy; 2024 Madurai Poratta Kadai. All rights reserved.</p>
        </div>
    </footer>

    <script src="animations.js"></script>
</body>
</html>
