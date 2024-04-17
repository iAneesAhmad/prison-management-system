<?php

    session_start();
    $servername="localhost";
    $username="root";
    $password="";
    $db="prison_management";

    $con=mysqli_connect($servername,$username,$password,$db);
    mysqli_select_db($con, "prison_management"); 
    
    if (isset($_SESSION['uname'])) {
    if(isset($_POST["btndelete"])) {
        $idToDelete = $_POST["PrisidToDelete"];

        $delete_query = "DELETE FROM prisoner WHERE Prisoner_ID = '$idToDelete'";
        if(mysqli_query($con, $delete_query)) {

            echo"<script> alert('Record deleted successfully')</script>"; 

        } else {
            echo "There is an Error in Query or Connection";
        }
    }
    mysqli_close($con);
?>

<html>
<head>
    <title>Delete Record - Prison Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
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

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #e74c3c;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #c0392b;
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
            echo "<a href='PrisonMS-UpdateRecords.php'>Update Records</a>";
            echo "<a href='PrisonMS-ViewRecords.php'>View Records</a>";
            echo "</div>";
            echo "<div class='logout'><a href='logout.php'>Logout</a></div>";
        } else {
            echo "<div class='welcome'><a href='PMS-AdminLogin.php'>Login please</a></div>";
        }
        ?>
    </div>
    <form method="POST" action="">
        <h2>Delete Record</h2>
        <label for="PrisidToDelete">Enter Prisoner ID to Delete:</label>
        <input type="text" name="PrisidToDelete" required>
        <br>
        <input type="submit" name="btndelete" value="Delete Record">
      

    </form>
    <?php 
    }
    else {
        echo "<div class='welcome'><a href='PMS-AdminLogin.php'>Login please</a></div>";
    }
    ?>
</body>
</html>