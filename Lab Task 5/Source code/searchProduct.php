<<<<<<< HEAD
<<<<<<< HEAD
<!DOCTYPE html>
<html>
  <body>
  	<fieldset>
	<legend><B>Search Product</B></legend>  
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
      <input type="text" name="Name" value="<?php if (!empty($_POST['Name'])) {echo $_POST['Name'];} ?>" required/>
      <input type="submit" name="findProduct" value="Search By Name"/>
    </form><br>
<?php require_once 'controller/searchProductController.php'; ?>
</fieldset>
  </body>
=======
<!DOCTYPE html>
<html>
  <body>
  	<fieldset>
	<legend><B>Search Product</B></legend>  
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
      <input type="text" name="Name" value="<?php if (!empty($_POST['Name'])) {echo $_POST['Name'];} ?>" required/>
      <input type="submit" name="findProduct" value="Search By Name"/>
    </form><br>
<?php require_once 'controller/searchProductController.php'; ?>
</fieldset>
  </body>
>>>>>>> 8f96f5c78296d17c5f888c561cd5ad60a92be0f2
=======
<!DOCTYPE html>
<html>
  <body>
  	<fieldset>
	<legend><B>Search Product</B></legend>  
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
      <input type="text" name="Name" value="<?php if (!empty($_POST['Name'])) {echo $_POST['Name'];} ?>" required/>
      <input type="submit" name="findProduct" value="Search By Name"/>
    </form><br>
<?php require_once 'controller/searchProductController.php'; ?>
</fieldset>
  </body>
>>>>>>> 8f96f5c78296d17c5f888c561cd5ad60a92be0f2
</html>