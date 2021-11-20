<<<<<<< HEAD
<?php 
function db_conn()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mariadb";

    try {
        $conn = new PDO('mysql:host='.$servername.';dbname='.$dbname.';charset=utf8', $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        // var_dump($conn) ;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $conn;
=======
<?php 
function db_conn()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mariadb";

    try {
        $conn = new PDO('mysql:host='.$servername.';dbname='.$dbname.';charset=utf8', $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        // var_dump($conn) ;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $conn;
>>>>>>> 8f96f5c78296d17c5f888c561cd5ad60a92be0f2
}