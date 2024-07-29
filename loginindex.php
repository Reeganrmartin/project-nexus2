<?php
include 'config.php';

$signupMessage = '';
$loginMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $username = $_POST['signupUsername'];
    $email = $_POST['signupEmail'];
    $password = password_hash($_POST['signupPassword'], PASSWORD_BCRYPT);


    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
        $signupMessage = "Signup successful!";
    } else {
        $signupMessage = "Error: " . $stmt->error;
    }

    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = $_POST['loginUsername'];
    $password = $_POST['loginPassword'];

    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($hashed_password);

    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        if (password_verify($password, $hashed_password)) {
            session_start();
            $_SESSION['username'] = $username;
            $loginMessage = "Login successful!";
        } else {
            $loginMessage = "Invalid password!";
        }
    } else {
        $loginMessage = "No user found with that username!";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Signup</title>
    <link rel="stylesheet" href="styleslogin.css">
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form method="post">
                <h2>Create Account</h2>
                <input type="text" name="signupUsername" placeholder="Username" required>
                <input type="email" name="signupEmail" placeholder="Email" required>
                <input type="password" name="signupPassword" placeholder="Password" required>
                <button type="submit" name="signup">Signup</button>
                <?php if ($signupMessage) echo "<p>$signupMessage</p>"; ?>
            </form>
        </div>

        <div class="form-container sign-in-container">
            <form method="post">
                <h2>Sign in</h2>
                <input type="text" name="loginUsername" placeholder="Username" required>
                <input type="password" name="loginPassword" placeholder="Password" required>
                <button type="submit" name="login">Login</button>
                <?php if ($loginMessage) echo "<p>$loginMessage</p>"; ?>
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h2>Welcome Back!</h2>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Login</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h2>Hello, Friend!</h2>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Signup</button>
                </div>
            </div>
        </div>
    </div>
    <script src="validation.js"></script>
</body>
</html>
