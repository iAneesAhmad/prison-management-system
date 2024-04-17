<?php

    session_start();

    $servername="localhost";
    $username="root";
    $password="";
    $db="prison_management";

    $con=mysqli_connect($servername,$username,$password,$db);
    mysqli_select_db($con, "prison_management"); 

    if (isset($_SESSION['uname'])) {
   
    $view_query = mysqli_query($con, "SELECT * FROM prisoner");
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
    <table>
        <tr>
            <th>Prisoner ID</th>
            <th>Bio Data</th>
            <th>Address</th>
            <th>Crime</th>
            <th>Case ID</th>
            <th>Contact</th>
            <th>Serial Number</th>
        </tr>
        <?php
            while($row = mysqli_fetch_assoc($view_query)) {
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
        }
        else {
            echo "<div class='welcome'><a href='PMS-AdminLogin.php'>Login please</a></div>";
        }
        ?>
    </table>
</body>
</html>