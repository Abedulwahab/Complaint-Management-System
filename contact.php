<?php
include "db.php";

$message_status = "";

if(isset($_POST['send'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "insert into contact_messages (name, email, message)
            values ('$name', '$email', '$message')";

    if(mysqli_query($conn, $sql)){
        $message_status = "Message sent successfully";
    } else {
        $message_status = "Error sending message";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contact</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="site-body">

<nav class="navbar">
    <h2>Complaint System</h2>
    <div>
        <a href="index.php">Home</a>
        <a href="about.php">About</a>
        <a href="services.php">Services</a>
        <a href="contact.php">Contact</a>
        <a class="nav-btn" href="login.php">Login</a>
    </div>
</nav>

<div class="contact-wrapper">
    <div class="form-box">
        <h2>Contact Us</h2>

        <p><?php echo $message_status; ?></p>

        <form method="post">
            <input type="text" name="name" placeholder="Your Name" required>

            <input type="email" name="email" placeholder="Your Email" required>

            <textarea name="message" placeholder="Your Message" required></textarea>

            <button type="submit" name="send">Send Message</button>
        </form>
    </div>
</div>

</body>
</html>