<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Train Manager Home</title>
</head>

<body>
    <?php
    session_start();
    include 'Header.php';

    if (isset($_SESSION['email'])) {
        echo '<span style="display:inline-block; width:100%;text-align:left; height: 100%; padding:10px; border-right:2px solid black">';
        echo '*******WELLCOME TRAIN MANAGERS*******';
        echo '<hr>';
        echo '<ul>';
        echo '<li><a href="Add_Train.php">Add Train</a></li>';
        echo '<li><a href="Update_Train.php">Update Train</a></li>';
        echo '<li><a href="Remove_Train.php">Remove Train</a></li>';
        echo '<li><a href="Add_Train_Tickets.php">Add Train Tickets</a></li>';
        echo '<li><a href="Update_Train_Tickets.php">Update Train Tickets</a></li>';
        echo '<li><a href="Delete_Train_Tickets.php">Delete Train Tickets</a></li>';
       


        echo '</ul>';
        echo '</span>';

        echo '<span style="display:inline-block; width:100%; height:100%; text-align:center"><a href="Logout.php">Logout</a>
    </span>';
    } else {
        $msg = "Error";
        header("location:Login.php");
    }
    ?>

    <?php include 'Footer.php'; ?>

</body>

</html>