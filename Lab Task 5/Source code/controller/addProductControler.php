<<<<<<< HEAD
<<<<<<< HEAD
<?php 
require_once ('../model/model.php');

$tableName = 'product';

if(isset($_POST['submit'])) {
	$data['Name'] = $_POST['name'];
	$data['BuyingPrice'] = $_POST['bprice'];
	$data['SellingPrice'] = $_POST['sprice'];
	if(empty($_POST['display'])){
		$data['display'] = "No";
	}
	else{
		$data['display'] = $_POST['display'];
	}

  if (addProduct($tableName, $data)) {
  	echo '<p>Product Successfully added!!</p><br>';
  	echo "<a href='../display.php'>Display Product</a>";
  }
} 
else {
	echo '<p>You are not allowed to access this page</p>';
}

=======
<?php 
require_once ('../model/model.php');

$tableName = 'product';

if(isset($_POST['submit'])) {
	$data['Name'] = $_POST['name'];
	$data['BuyingPrice'] = $_POST['bprice'];
	$data['SellingPrice'] = $_POST['sprice'];
	if(empty($_POST['display'])){
		$data['display'] = "No";
	}
	else{
		$data['display'] = $_POST['display'];
	}

  if (addProduct($tableName, $data)) {
  	echo '<p>Product Successfully added!!</p><br>';
  	echo "<a href='../display.php'>Display Product</a>";
  }
} 
else {
	echo '<p>You are not allowed to access this page</p>';
}

>>>>>>> 8f96f5c78296d17c5f888c561cd5ad60a92be0f2
=======
<?php 
require_once ('../model/model.php');

$tableName = 'product';

if(isset($_POST['submit'])) {
	$data['Name'] = $_POST['name'];
	$data['BuyingPrice'] = $_POST['bprice'];
	$data['SellingPrice'] = $_POST['sprice'];
	if(empty($_POST['display'])){
		$data['display'] = "No";
	}
	else{
		$data['display'] = $_POST['display'];
	}

  if (addProduct($tableName, $data)) {
  	echo '<p>Product Successfully added!!</p><br>';
  	echo "<a href='../display.php'>Display Product</a>";
  }
} 
else {
	echo '<p>You are not allowed to access this page</p>';
}

>>>>>>> 8f96f5c78296d17c5f888c561cd5ad60a92be0f2
?>