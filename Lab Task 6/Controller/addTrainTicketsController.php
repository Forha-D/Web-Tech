<?php
session_start();
$msg = $trainIdErr = $trainNameErr = $ticketIdErr = $trainLocationErr = $fromErr = $toErr = '';
$valid = 1;
if (isset($_POST["submit"])) {

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
        $trainNameErr = "Train name must be a single word";
        $valid = 0;
    } else if (!preg_match("/^[A-Za-z]*$/", $_POST["trainName"])) {
        $trainNameErr = "*For train name only upper/lower case alphabets are allowed";
        $valid = 0;
    }

    if (empty($_POST["trainLocation"])) {
        $trainLocationErr = "*Please select a location";
        $valid = 0;
    }

    if (empty($_POST["ticketId"])) {
        $ticketIdErr = "*Please enter ticket ID";
        $valid = 0;
    } else if (!preg_match('/^[0-9]{8}$/', $_POST["ticketId"])) {
        $ticketIdErr = "*Ticket ID must be eight (8) digits";
        $valid = 0;
    }

    if (empty($_POST["trainFrom"])) {
        $fromErr = "*Please select a location";
        $valid = 0;
    }

    if (empty($_POST["trainTo"])) {
        $toErr = "*Please select a location";
        $valid = 0;
    }

    if ($valid) {
        if (file_exists('Train_Ticket_Data.json')) {
            $current_data = file_get_contents('Train_Ticket_Data.json');
            $array_data = json_decode($current_data, true);
            $extra = array(
                'T_ID'                  =>        test_input($_POST["trainId"]),
                'T_Name'                =>        test_input($_POST["trainName"]),
                'T_Location'            =>        test_input($_POST["trainLocation"]),
                'Ticket_ID'             =>        test_input($_POST["ticketId"]),
                'From'                  =>        test_input($_POST["trainFrom"]),
                'To'                    =>        test_input($_POST["trainTo"]),
                'Price'                 =>        test_input($_POST["price"]),
                'Date'                  =>        test_input($_POST["date"]),
                'Time'                  =>        test_input($_POST["time"]),
                'Booked_By'             =>        "",
            );
            $array_data[] = $extra;
            $final_data = json_encode($array_data);
            if (file_put_contents('Train_Ticket_Data.json', $final_data)) {
                $msg = '<span class="green">Train ticket added successfully</span>';
            } else {
                $msg = '<span class="red">Adding train ticket failed</span>';
            }
        } else {
            $msg = '<span class="red">JSON file does not exit</span>';
        }
    } else {
        $msg = '<span class="red">Adding train ticket failed</span>';
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
