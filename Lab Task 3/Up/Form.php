<!DOCTYPE html>
<html>
<body>

<fieldset>
	<legend><b>Profile Picture </b></legend>
<form action="upload.php" method="post" enctype="multipart/form-data">
<img src ="upload.jpg" alt="profile pictur" width=150 heoght =180 >
  Select image to upload:<br>
  <input type="file" name="fileToUpload" id="fileToUpload"><br>
  <hr>
  <input type="submit" value="Upload Image" name="submit">
</form>
</fieldset>
</body>
</html>