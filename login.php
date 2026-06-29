<?php
session_start();

include "db.php";

$message = "";

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "select * from users where email='$email'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){

        $user = mysqli_fetch_assoc($result);

        if(password_verify($password, $user['password'])){

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['full_name'] = $user['full_name'];

            header("Location: dashboard.php");
            exit();

        } else {
            $message = "Wrong Password";
        }

    } else {
        $message = "Email Not Found";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-box">

    <h2>Welcome Back</h2>

    <p><?php echo $message; ?></p>

    <form method="post">

        <input type="email" name="email" placeholder="Email" required>

        <input type="password" name="password" placeholder="Password" required>

        <button type="submit" name="login">Login</button>

    </form>

    <p>
        Don't have an account?
        <a href="signup.php">Sign Up</a>
    </p>

</div>

</body>
</html>