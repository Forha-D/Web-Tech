<?php
require_once 'Model/Model.php';
require_once 'Model/db_connect.php';
session_start();
$ticketId = $busId = $busName = $busLocation = $from = $to = $price = $date = $time = '';
$msg = $busIdErr = $busNameErr = $ticketIdErr = $busLocationErr = $fromErr = $toErr = '';
$valid = 1;
if (isset($_POST['search'])) {
    if (empty($_POST["ticketId"])) {
        $ticketIdErr = "*Please enter ticket ID";
        $valid = 0;
    // } else if (!preg_match('/^[0-9]{8}$/', $_POST["ticketId"])) {
    //     $ticketIdErr = "*Ticket ID must be eight (8) digits";
    //     $valid = 0;
    }
    $ticketId = $_POST["ticketId"];
    // $data = file_get_contents("Bus_Ticket_Data.json");
    // $data = json_decode($data, true);
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `tickets` where ticket_id = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$_POST['ticketId']]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
            $from = $row["location_from"];
            $to = $row["location_to"];
            $price = $row["price"];
            $date = $row["date"];
            $time = $row["time"];
        
}
if (isset($_POST['submit'])) {
    // if (empty($_POST["busId"])) {
    //     $busIdErr = "*Please enter bus ID";
    //     $valid = 0;
    // } else if (!preg_match('/^[0-9]{5}$/', $_POST["busId"])) {
    //     $busIdErr = "Bus ID must be five (5) digits";
    //     $valid = 0;
    // }

    

    if (empty($_POST["from"])) {
        $fromErr = "*Please select a location";
        $valid = 0;
    }

    if (empty($_POST["to"])) {
        $toErr = "*Please select a location";
        $valid = 0;
    }



    if ($valid) {
        
       $msg = updateTicketsinfo($_POST);

    } else {
        $msg = '<span class="green">Update success</span>';
    }
   
    
    
}

// function test_input($data)
// {
//     $data = trim($data);
//     $data = stripslashes($data);
//     $data = htmlspecialchars($data);
//     return $data;
// }
