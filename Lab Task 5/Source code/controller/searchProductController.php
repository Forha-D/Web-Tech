<<<<<<< HEAD
<<<<<<< HEAD
<?php

require_once 'model/model.php';

if (isset($_POST['findProduct'])) {
	
    try {
    	
    	$allSearchedProducts = searchProduct($_POST['Name']);
    	require_once 'searchedResult.php';

    } catch (Exception $ex) {
    	echo $ex->getMessage();
    }
=======
<?php

require_once 'model/model.php';

if (isset($_POST['findProduct'])) {
	
    try {
    	
    	$allSearchedProducts = searchProduct($_POST['Name']);
    	require_once 'searchedResult.php';

    } catch (Exception $ex) {
    	echo $ex->getMessage();
    }
>>>>>>> 8f96f5c78296d17c5f888c561cd5ad60a92be0f2
=======
<?php

require_once 'model/model.php';

if (isset($_POST['findProduct'])) {
	
    try {
    	
    	$allSearchedProducts = searchProduct($_POST['Name']);
    	require_once 'searchedResult.php';

    } catch (Exception $ex) {
    	echo $ex->getMessage();
    }
>>>>>>> 8f96f5c78296d17c5f888c561cd5ad60a92be0f2
}