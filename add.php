<?php
session_start();

include "db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$message = "";

if(isset($_POST['add'])){

    $user_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $category = $_POST['category'];
    $complaint_text = $_POST['complaint_text'];

    $sql = "insert into complaints (user_id, title, category, complaint_text)
            values ('$user_id', '$title', '$category', '$complaint_text')";

    if(mysqli_query($conn, $sql)){
        $message = "Complaint added successfully";
    } else {
        $message = "Error adding complaint";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add Complaint</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-box">

    <h2>Add Complaint</h2>

    <p><?php echo $message; ?></p>

    <form method="post">

        <input type="text" name="title" placeholder="Complaint Title" required>

        <input type="text" name="category" placeholder="Category" required>

        <textarea name="complaint_text" placeholder="Write your complaint..." required></textarea>

        <button type="submit" name="add">Submit Complaint</button>

    </form>

    <p><a href="dashboard.php">Back to Dashboard</a></p>

</div>

</body>
</html>