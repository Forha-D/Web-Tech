<<<<<<< HEAD
<?php if(!empty($_GET['id'])){ ?>
<?php 

require_once '../model/model.php';
$tableName = 'product';
//echo $_GET['id'];
if (deleteProduct($tableName, $_GET['id'])) {
    header('Location: ../display.php');
}
else{
	echo '<p>Product Not Deleted!!</p>';
}
 ?>
<?php }
else{
	echo "You are not allowed to visit this page";
=======
<?php if(!empty($_GET['id'])){ ?>
<?php 

require_once '../model/model.php';
$tableName = 'product';
//echo $_GET['id'];
if (deleteProduct($tableName, $_GET['id'])) {
    header('Location: ../display.php');
}
else{
	echo '<p>Product Not Deleted!!</p>';
}
 ?>
<?php }
else{
	echo "You are not allowed to visit this page";
>>>>>>> 8f96f5c78296d17c5f888c561cd5ad60a92be0f2
} ?>