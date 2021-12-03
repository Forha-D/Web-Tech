<!DOCTYPE html>
<html>

<head>
    <title>Update Train information</title>
    <style type="text/css">
        .red {
            color: red;
        }

        .green {
            color: green;
        }
    </style>
</head>

<body>
    <?php require_once 'Controller/updatetrainController.php'; ?>

    <?php include 'Header.php'; ?>

    <?php
    if (!isset($_SESSION['email'])) {
        header("location:Login.php");
    }
    ?>

    <form method="post">
        <?php
        if (isset($error)) {
            echo $error;
        }
        ?>

        Go back to : <a href="Train_Manager_Home.php">Home</a><br><br>

       
            <legend><b>UPDATE FOR TRAIN</b></legend><br>
             <label>Train ID : </label>
            <input type="text" name="trainId" value="<?php echo $trainId ?>"><span class="red">
                <?php
                if ($trainIdErr) {
                    echo $trainIdErr;
                }
                ?></span>
            <input type="submit" name="search" value="Search" class="btn btn-info" />
            <hr>
        <label>Train Name: </label>
            <input type="text" name="trainName" value="<?php echo $trainName ?>"><span class="red">
                <?php
                if ($trainNameErr) {
                    echo $trainNameErr;
                }
                ?></span>
      <br>

 
<label>Train Location: </label>
<select name="trainLocation">
<option value="<?php echo $trainLocation ?>"><?php echo $trainLocation ?></option>
<option value="Dhaka">Dhaka</option>
<option value="Barishal">Barishal</option>
<option value="Cumilla">Cumilla</option>
<option value="Sylet">Sylet</option>
<option value="Bagura">Bagura</option>
<option value="khulna">khulna</option>
<option value="Chittagong">Chittagong</option>
</select><span class="red">
<?php
if ($trainLocationErr) {
echo $trainLocationErr;
}
?></span>
<hr>
    <br>

            <input type="submit" name="submit" value="Submit" class="btn btn-info" />
            <input type="reset" name="reset" value="Reset" class="btn btn-info" /><br />
        </fieldset>

        <?php
        if (isset($msg)) {
            echo $msg;
        }
        ?>

        <?php include 'Footer.php'; ?>
    </form>
    </div>
    <br />

</body>

</html>