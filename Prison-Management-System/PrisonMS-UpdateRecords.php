<?php

    session_start();
    $servername="localhost";
    $username="root";
    $password="";
    $db="prison_management";

    $con=mysqli_connect($servername,$username,$password,$db);
    mysqli_select_db($con, "prison_management"); 

    if (isset($_SESSION['uname'])) {
    if(isset($_POST["btnupdate"])) {
        $idToUpdate = $_POST["prisidToUpdate"];
        $newData = $_POST["prisNewData"];
        $newAddress = $_POST["prisNewAddress"];
        $newCrime = $_POST["prisNewCrime"];
        $newCaseID = $_POST["prisNewCaseID"];
        $newContact = $_POST["prisNewContact"];
        $newSerialNumber = $_POST["prisNewSerialNumber"];

        $update_query = "UPDATE prisoner SET Bio_data = '$newData',Address = '$newAddress',Crime = '$newCrime', Case_ID = '$newCaseID', Contact = '$newContact',serial_number = '$newSerialNumber'WHERE Prisoner_ID = '$idToUpdate'";
        if(mysqli_query($con, $update_query)) {

            echo"<script> alert('Record Updated successfully')</script>"; 

        } else {
            echo "There is an Error in Query or Connection";
        }
    }
    mysqli_close($con);
?>

<html>
<head>
    <title>Update Records - Prison Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 110vh;
        }

        form {
            text-align: left;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 300px;
            width: 100%;
        }

        h2 {
            color: #006699;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .container {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .welcome {
            font-size: 20px;
            color: #333;
            margin-bottom: 20px;
        }

        .options a {
            display: block;
            padding: 10px;
            margin: 10px;
            background-color: #4caf50;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .options a:hover {
            background-color: #45a049;
        }

        .logout a {
            display: block;
            margin-top: 20px;
            color: #00F;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="container">
        <?php
        if (isset($_SESSION['uname'])) {
            echo "<div class='options'>";
            echo "<a href='main.php'>Go to Main Menu</a>";
            echo "<a href='PrisonMS-INSERT.php'>Insert Records</a>";
            echo "<a href='PrisonMS-DeleteRecords.php'>Delete Records</a>";
            echo "<a href='PrisonMS-ViewRecords.php'>View Records</a>";
            echo "</div>";
            echo "<div class='logout'><a href='logout.php'>Logout</a></div>";
        } else {
            echo "<div class='welcome'><a href='PMS-AdminLogin.php'>Login please</a></div>";
        }
        ?>
    </div>
    <form action="PrisonMS-UpdateRecords.php" method="post" name="frm">
        <h2>Update Records</h2>
        <label for="prisidToUpdate">Enter Prisoner ID to Update:</label>
        <input type="text" name="prisidToUpdate" id="prisidToUpdate" required>

        <label for="prisNewData">Update BIO Data</label>
        <textarea name="prisNewData" id="prisNewData"></textarea>

        <label for="prisNewAddress">Update Address</label>
        <input type="text" name="prisNewAddress" id="prisNewAddress">

        <label for="prisNewCrime">Update Crime</label>
        <input type="text" name="prisNewCrime" id="prisNewCrime" >

        <label for="prisNewCaseID">Update CASE ID</label>
        <input type="text" name="prisNewCaseID" id="prisNewCaseID" >

        <label for="prisNewContact">Update Contact</label>
        <input type="text" name="prisNewContact" id="prisNewContact">

        <label for="prisNewSerialNumber">Update Serial Number</label>
        <input type="text" name="prisNewSerialNumber" id="prisNewSerialNumber">

        <input type="submit" name="btnupdate" id="btnupdate" value="Update Record"> 

    </form>
    <?php 
    }
    else {
        echo "<div class='welcome'><a href='PMS-AdminLogin.php'>Login please</a></div>";
    }
    ?>
</body>
</html>