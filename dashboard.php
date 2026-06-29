<?php
session_start();

include "db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "select * from complaints where user_id='$user_id' order by id desc";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="dashboard-box">

    <h2>My Complaints</h2>

    <p>Welcome <?php echo $_SESSION['full_name']; ?></p>

    <a class="btn" href="add.php">Add New Complaint</a>
      <a class="btn" href="admin_messages.php">Messages</a>
    <a class="btn logout" href="logout.php">Logout</a>


    <table>
        <tr>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Date</th>
            <th>Action</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)){ ?>
<tr>
    <td><?php echo $row['title']; ?></td>

    <td><?php echo $row['category']; ?></td>

    <td><?php echo $row['status']; ?></td>

    <td><?php echo $row['created_at']; ?></td>

    <td>
        <a class="edit-btn" href="edit.php?id=<?php echo $row['id']; ?>">
            Edit
        </a>
           <a class="delete-btn" 
       href="delete.php?id=<?php echo $row['id']; ?>"
       onclick="return confirm('Are you sure you want to delete this complaint?');">
       Delete
    </a>
    </td>
    
</tr>
        <?php } ?>

    </table>

</div>

</body>
</html>