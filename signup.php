<?php
include "db.php";

$message = "";

if(isset($_POST['signup'])){
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "insert into users (full_name, email, password)
            values ('$full_name', '$email', '$password')";

    if(mysqli_query($conn, $sql)){
        $message = "Account created successfully";
    } else {
        $message = "Error: Email may already exist";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-box">
   <h2>Complaint System</h2>

    <p><?php echo $message; ?></p>

    <form method="post">
        <input type="text" name="full_name" placeholder="Full Name" required>

        <input type="email" name="email" placeholder="Email" required>

        <input type="password" name="password" placeholder="Password" required>

        <button type="submit" name="signup">Sign Up</button>
    </form>

    <p>Already have an account? <a href="login.php">Login</a></p>
</div>

</body>
</html>