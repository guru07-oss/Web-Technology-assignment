<?php
include 'config.php';

$success = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        $success = "Thanks for your message, $name!";
    } else {
        $success = "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form by Guru</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Contact Form by Guru</h1>
    </header>

    <section class="form-section">
        <?php if($success) echo "<p class='success'>$success</p>"; ?>
        <form method="POST" action="">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" placeholder="Your Message" rows="5" required></textarea>
            <input type="submit" value="Send Message">
        </form>
    </section>

    <footer>
        Made with ❤️ by Guru
    </footer>
</body>
</html>
