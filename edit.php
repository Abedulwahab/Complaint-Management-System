<?php
session_start();
include "db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
$user_id = $_SESSION['user_id'];

$sql = "select * from complaints where id='$id' and user_id='$user_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){
    $title = $_POST['title'];
    $category = $_POST['category'];
    $complaint_text = $_POST['complaint_text'];

    $update = "update complaints 
               set title='$title', category='$category', complaint_text='$complaint_text'
               where id='$id' and user_id='$user_id'";

    if(mysqli_query($conn, $update)){
        header("Location: dashboard.php?updated=1");
        exit();
    } else {
        echo "Update Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Complaint</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-box">
    <h2>Edit Complaint</h2>

    <form method="post">
        <input type="text" name="title" value="<?php echo $row['title']; ?>" required>

        <input type="text" name="category" value="<?php echo $row['category']; ?>" required>

        <textarea name="complaint_text" required><?php echo $row['complaint_text']; ?></textarea>

        <button type="submit" name="update">Update Complaint</button>
    </form>

    <p><a href="dashboard.php">Back</a></p>
</div>

</body>
</html>