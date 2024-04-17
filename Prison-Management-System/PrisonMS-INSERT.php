<?php

    session_start();
    $servername="localhost";
    $username="root";
    $password="";
    $db="prison_management";

    $con=mysqli_connect($servername,$username,$password,$db);
    mysqli_select_db($con, "prison_management");
    
    if (isset($_SESSION['uname'])) {
    if(isset($_POST["btnsave"]))
    {
        $id=$_POST["pris_id"];             
        $data=$_POST["pris_data"];        
        $address=$_POST["pris_address"];          
        $crime=$_POST["pris_crime"];       
        $case=$_POST["pris_caseid"];           
        $contact=$_POST["pris_contact"];      
        $serial=$_POST["pris_serial"];   
        
        $insertquery="INSERT INTO `prisoner`(`Prisoner_ID`, `Bio_data`, `Address`, `Crime`, `Case_ID`, `Contact`, `serial_number`) VALUES ('$id','$data','$address','$crime','$case','$contact','$serial')";
        if(mysqli_query($con, $insertquery))
            {
                 echo"<script> alert('Record added successfully')</script>"; 
                 
            }
        else
            {
                  echo"There is an Error in the Connection or Query!";  
            }

    }

    mysqli_close($con);
?>

<html>
<head>
    <title>Insert Record - Prison Management System</title>
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
            echo "<a href='PrisonMS-DeleteRecords.php'>Delete Records</a>";
            echo "<a href='PrisonMS-UpdateRecords.php'>Update Records</a>";
            echo "<a href='PrisonMS-ViewRecords.php'>View Records</a>";
            echo "</div>";
            echo "<div class='logout'><a href='logout.php'>Logout</a></div>";
        } else {
            echo "<div class='welcome'><a href='PMS-AdminLogin.php'>Login please</a></div>";
        }
        ?>
    </div>
    <form action="" method="post" name="frm">
        <h2>Add Prisoner Information</h2>
        <label for="pris_id">Prisoner Id*</label>
        <input type="text" name="pris_id" id="pris_id" required>

        <label for="pris_data">BIO Data*</label>
        <textarea name="pris_data" id="pris_data" required></textarea>

        <label for="pris_address">Address</label>
        <input type="text" name="pris_address" id="pris_address">

        <label for="pris_crime">Crime*</label>
        <input type="text" name="pris_crime" id="pris_crime" required>

        <label for="pris_caseid">CASE ID*</label>
        <input type="text" name="pris_caseid" id="pris_caseid" required>

        <label for="pris_contact">Contact</label>
        <input type="text" name="pris_contact" id="pris_contact">

        <label for="pris_serial">Serial Number</label>
        <input type="text" name="pris_serial" id="pris_serial">

        <input type="submit" name="btnsave" id="btnsave" value="Submit">
        
        
    </form>
    <?php 
    }
    else {
        echo "<div class='welcome'><a href='PMS-AdminLogin.php'>Login please</a></div>";
    }
    ?>
</body>
</html>