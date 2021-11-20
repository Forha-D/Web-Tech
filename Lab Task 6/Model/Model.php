<?php

require_once 'db_connect.php';

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function addTrainmaneger($data)
{
    $conn = db_conn();
    $selectQuery = "INSERT into maneger_info (T_Name, T_Email, T_Password) VALUES (:name, :email,  :password)";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':name'             =>      test_input($data['name']),
            ':email'            =>      test_input($data['email']),
            ':password'         =>      test_input($data['password']),   
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;
    return '<span class="green">Registered successfully</span>';
}



function updatePassword($data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE maneger_info set T_Password = ? where T_Email = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            test_input($data['newPassword']), $_SESSION['email']
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;
    return "Password successfully changed";
}


function addTrainTicket($data)
{
    $current_data = file_get_contents("Train_Tickets_Data.json");
    $current_data = json_decode($current_data, true);
    foreach ($current_data as $key => $entry) {
        if ($entry["Ticket_ID"] == $data['ticketId']) {
            $current_data[$key]['T_ID']             =   $current_data[$key]['T_ID'];
            $current_data[$key]['T_Name']           =   $current_data[$key]['T_Name'];
            $current_data[$key]['T_Location']       =   $current_data[$key]['T_Location'];
            $current_data[$key]['Ticket_ID']        =   $current_data[$key]['Ticket_ID'];
            $current_data[$key]['Transport_Type']   =   $current_data[$key]['Transport_Type'];
            $current_data[$key]['From']             =   $current_data[$key]['From'];
            $current_data[$key]['To']               =   $current_data[$key]['To'];
            $current_data[$key]['Price']            =   $current_data[$key]['Price'];
            $current_data[$key]['Date']             =   $current_data[$key]['Date'];
            $current_data[$key]['Time']             =   $current_data[$key]['Time'];
            $current_data[$key]['Booked_By']        =   test_input($data["email"]);

            $updated_data = json_encode($current_data);

            if (file_put_contents('Train_Tickets_Data.json', $updated_data)) {
                return '<span class="green">Ticket booked successfully and payment information is sent to your email address</span>';
            } else {
                return '<span class="red">Ticket booking failed</span>';
            }
        }
    }
}



function deletTrainTickets($data)
{
    

    $current_data = file_get_contents("Train_Tickets_Data.json");
    $current_data = json_decode($current_data, true);
    foreach ($current_data as $key => $entry) {
        if ($entry["Ticket_ID"] == $data['ticketId']) {
            $current_data[$key]['T_ID']             =   $current_data[$key]['T_ID'];
            $current_data[$key]['T_Name']           =   $current_data[$key]['T_Name'];
            $current_data[$key]['T_Location']       =   $current_data[$key]['T_Location'];
            $current_data[$key]['Ticket_ID']        =   $current_data[$key]['Ticket_ID'];
            $current_data[$key]['Transport_Type']   =   $current_data[$key]['Transport_Type'];
            $current_data[$key]['From']             =   $current_data[$key]['From'];
            $current_data[$key]['To']               =   $current_data[$key]['To'];
            $current_data[$key]['Price']            =   $current_data[$key]['Price'];
            $current_data[$key]['Date']             =   $current_data[$key]['Date'];
            $current_data[$key]['Time']             =   $current_data[$key]['Time'];
            $current_data[$key]['Booked_By']        =   "";

            $updated_data = json_encode($current_data);

            if (file_put_contents('Train_Tickets_Data.json', $updated_data)) {
                return '<span class="green">Ticket delet successfully</span>';
            } else {
                return '<span class="red">Ticket deletting failed</span>';
            }
        }
    }

    
   
