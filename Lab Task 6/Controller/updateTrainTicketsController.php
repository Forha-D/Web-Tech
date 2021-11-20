<?php
session_start();
$ticketId = $trainId = $trainName = $trainLocation = $from = $to = $price = $date = $time = '';
$msg = $trainIdErr = $trainNameErr = $ticketIdErr = $trainLocationErr = $fromErr = $toErr = '';
$valid = 1;
if (isset($_POST['search'])) {
    if (empty($_POST["ticketId"])) {
        $ticketIdErr = "*Please enter ticket ID";
        $valid = 0;
    } else if (!preg_match('/^[0-9]{8}$/', $_POST["ticketId"])) {
        $ticketIdErr = "*Ticket ID must be eight (8) digits";
        $valid = 0;
    }
    $ticketId = $_POST["ticketId"];
    $data = file_get_contents("Train_Ticket_Data.json");
    $data = json_decode($data, true);
    foreach ($data as $row) {
        if ($row['Ticket_ID'] == $_POST['ticketId']) {
            $trainId = $row["T_ID"];
            $trainName = $row["T_Name"];
            $trainLocation = $row["T_Location"];
            $ticketId = $row["Ticket_ID"];
            $from = $row["From"];
            $to = $row["To"];
            $price = $row["Price"];
            $date = $row["Date"];
            $time = $row["Time"];
        } else {
            echo 'Error';
        }
    }
}
if (isset($_POST['submit'])) {
    if (empty($_POST["trainId"])) {
        $trainIdErr = "*Please enter train ID";
        $valid = 0;
    } else if (!preg_match('/^[0-9]{5}$/', $_POST["trainId"])) {
        $trainIdErr = "Train ID must be five (5) digits";
        $valid = 0;
    }

    if (empty($_POST["trainName"])) {
        $trainNameErr = "*Please enter train name";
        $valid = 0;
    } else if (str_word_count($_POST["trainName"]) != 1) {
        $trainNameErr = "*Train name must be a single word";
        $valid = 0;
    } else if (!preg_match("/^[A-Za-z]*$/", $_POST["trainName"])) {
        $trainNameErr = "*For train name only upper/lower case alphabets are allowed";
        $valid = 0;
    }

    if (empty($_POST["trainLocation"])) {
        $trainLocationErr = "*Please select a location";
        $valid = 0;
    }

    if (empty($_POST["from"])) {
        $fromErr = "*Please select a location";
        $valid = 0;
    }

    if (empty($_POST["to"])) {
        $toErr = "*Please select a location";
        $valid = 0;
    }

    if ($valid) {
        $current_data = file_get_contents("Train_Ticket_Data.json");
        $current_data = json_decode($current_data, true);
        foreach ($current_data as $key => $entry) {
            if ($entry["Ticket_ID"] == $_POST['ticketId']) {
                $current_data[$key]['T_ID']             =   test_input($_POST["trainId"]);
                $current_data[$key]['T_Name']           =   test_input($_POST["trainName"]);
                $current_data[$key]['T_Location']       =   test_input($_POST["trainLocation"]);
                $current_data[$key]['Ticket_ID']        =   $current_data[$key]['Ticket_ID'];
                $current_data[$key]['From']             =   test_input($_POST["from"]);
                $current_data[$key]['To']               =   test_input($_POST["to"]);
                $current_data[$key]['Price']            =   test_input($_POST["price"]);
                $current_data[$key]['Date']             =   test_input($_POST["date"]);
                $current_data[$key]['Time']             =   test_input($_POST["time"]);
                $current_data[$key]['Booked_By']        =   "";

                $updated_data = json_encode($current_data);

                if (file_put_contents('Train_Ticket_Data.json', $updated_data)) {
                    $msg = '<span class="green">Updated successfully</span>';
                } else {
                    $msg = '<span class="red">Update failed</span>';
                }
            } else {
                $msg = '<span class="red">Update failed</span>';
            }
        }
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
