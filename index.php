
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wesagn Hunet Management System</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f4f8;
            margin: 0;
            padding: 0;
        }

        header {
            background: #123b63;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .container {
            width: 80%;
            max-width: 700px;
            margin: 40px auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 10px #cccccc;
        }

        h2 {
            color: #123b63;
        }

        a.button {
            display: inline-block;
            background: #123b63;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin: 5px;
        }

        a.button:hover {
            background: #205d91;
        }

        footer {
            text-align: center;
            color: #666;
            padding: 20px;
        }
    </style>
</head>

<body>

<header>
    <h1>Wesagn Hunet Management System</h1>
    <p>Welcome to Our Management System</p>
</header>

<div class="container">
    <h2>Home Page</h2>

    <p>This is the beginning of the Wesagn Hunet Management System.</p>

    <?php
        echo "<p>PHP is working successfully!</p>";
    ?>

    <a href="login.php" class="button">Login</a>
    <a href="register.php" class="button">Register</a>
</div>

<footer>
    <p>&copy; 2026 Wesagn Hunet Management System</p>
</footer>

</body>
</html>