<?php
include "db.php";

$sql = "select * from contact_messages order by id desc";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Messages</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="site-body">

<nav class="navbar">
    <h2>Admin Panel</h2>
    <div>
        <a href="index.php">Home</a>
        <a href="dashboard.php">Dashboard</a>
        <a href="admin_messages.php">Messages</a>
    </div>
</nav>

<div class="dashboard-box">
    <h2>Contact Messages</h2>

    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Date</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['message']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
        </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>