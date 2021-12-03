<?php

require_once 'db_connect.php';

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function addBusmanager($data)
{
    $conn = db_conn();
    $selectQuery = "INSERT into bus_manager (bm_email, bm_password) VALUES (:email,  :password)";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            
             ':email'            =>      test_input($data['email']),
             ':password'         =>      test_input($data['password']),
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    
    $conn = null;
    return '<span class="green">Registered successfully</span>';
   }
}
 function addTickets($data)
  {
    $conn = db_conn();
    $selectQuery = "INSERT into tickets (location_to, location_from, date, time,price,transport_type,booked_by) VALUES (:busTo, :busFrom, :date , :time, :price, :tType, :bookedBy)";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
             ':busTo'                 =>        test_input($data["busTo"]),
             ':busFrom'               =>        test_input($data["busFrom"]),
             ':date'                  =>        test_input($data["date"]),
             ':time'                  =>        test_input($data["time"]),
             ':price'                 =>        test_input($data["price"]),
             ':tType'                 =>        "Bus", 
             ':bookedBy'              =>        ""
        ]);          
             
    } catch (PDOException $e) {
        echo $e->getMessage();

    $conn = null;
}

    $conn = db_conn();
    $selectQuery = "INSERT into bus (b_name, b_location) VALUES (:busName,  :busLocation)";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            
             ':busName'             =>      test_input($data['busName']),
             ':busLocation'         =>      test_input($data['busLocation']),
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    
    $conn = null;
    return '<span class="green">Ticket added successfully</span>';
   }
}


function updateTicketsinfo($data)
{
    $conn = db_conn();
    

    $selectQuery = "UPDATE tickets set location_to   = ?, location_from = ?, date= ?, time = ?, price = ? ,transport_type=? ,booked_by = ? where ticket_id =?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            test_input($data['to']), test_input($data['from']), test_input($data['date']), test_input($data['time']),test_input($data['price']),test_input($data['transport_type']), test_input($data['booked_by']),$_SESSION['ticketId']
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;
    return '<span class="green">Updated successfully</span>';
 }

// function updateProfileInfo($data)

// {

//     $conn = db_conn();

//     $selectQuery = "UPDATE customer_info set C_Name = ?, C_PhoneNumber = ?, C_Gender = ?, C_DOB = ? where C_Email = ?";

//     try {

//         $stmt = $conn->prepare($selectQuery);

//         $stmt->execute([

//             test_input($data['name']), test_input($data['phoneNo']), test_input($data['gender']), test_input($data['dateOfBirth']), $_SESSION['email']

//         ]);

//     } catch (PDOException $e) {

//         echo $e->getMessage();

//     }

//     $conn = null;

//     return '<span class="green">Updated successfully</span>';

// }
?>

