<html>
<head>
    <title>Admin Login - Prison Management System</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        form {
            max-width: 300px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        h2 {
            text-align: center;
            color: #666;
        }

        label {
            display: block;
            margin-bottom: 10px;
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
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php session_start(); ?>
    <form action="session.php" method="POST">
        <h1>Prison Management System</h1>
        <h2>Admin Panel</h2>
        <label for="uname">User Name:</label>
        <input type="text" name="uname" required>

        <label for="pass">Password:</label>
        <input type="password" name="pass" required>

        <input type="submit" value="Login">
    </form>
</body>
</html>