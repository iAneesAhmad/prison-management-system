
<?php
session_start();
?>

<html>
<head>
    <title>Admin Panel - Prison Management System</title>
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
            echo "<div class='welcome'>View Records</div>";
            echo "<div class='options'>";
            echo "<a href='PrisonMS-ViewSingleRecord.php'>View Single Prison Record</a>";
            echo "<a href='PrisonMS-ViewFullRecord.php'>View All Prisons Record</a>";
            echo "</div>";
            echo "<div class='logout'><a href='logout.php'>Logout</a></div>";

        } else {
            echo "<div class='welcome'><a href='PMS-AdminLogin.php'>Login please</a></div>";
        }
        ?>
    </div>
</body>
</html>