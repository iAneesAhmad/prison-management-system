<?php

    session_start();
   
    $servername="localhost";
    $username="root";
    $password="";
    $db="prison_management";

    $con=mysqli_connect($servername,$username,$password,$db);
    mysqli_select_db($con, "prison_management"); 
    
    if (isset($_SESSION['uname'])) {
    if (isset($_POST["btnview"])) {
        $view_id = $_POST["view_id"];
        $view_query = mysqli_query($con, "SELECT * FROM prisoner WHERE Prisoner_ID = '$view_id'");
    }
?>

<html>
<head>
    <title>View Records</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    
    </style>
</head>
<body>
    <h2>View Records</h2>
    <form method="POST" action="">
        <label>Enter Prisoner ID to View:</label>
        <input type="text" name="view_id">
        <input type="submit" name="btnview" value="View Record">
    </form>

    <?php
    
        if (isset($view_query)) {
            if (mysqli_num_rows($view_query) > 0) {
                echo "<table>";
                echo "<tr>
                        <th>Prisoner ID</th>
                        <th>Bio Data</th>
                        <th>Address</th>
                        <th>Crime</th>
                        <th>Case ID</th>
                        <th>Contact</th>
                        <th>Serial Number</th>
                      </tr>";

                while ($row = mysqli_fetch_assoc($view_query)) {
                    echo "<tr>";
                    echo "<td>" . $row['Prisoner_ID'] . "</td>";
                    echo "<td>" . $row['Bio_data'] . "</td>";
                    echo "<td>" . $row['Address'] . "</td>";
                    echo "<td>" . $row['Crime'] . "</td>";
                    echo "<td>" . $row['Case_ID'] . "</td>";
                    echo "<td>" . $row['Contact'] . "</td>";
                    echo "<td>" . $row['serial_number'] . "</td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "No records found for the specified Prisoner ID.";
            }
        }
    }
    else {
        echo "<div class='welcome'><a href='PMS-AdminLogin.php'>Login please</a></div>";
    }
    ?>
</body>
</html>