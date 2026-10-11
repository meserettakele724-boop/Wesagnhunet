<?php
require_once "db.php";
session_start();

$message = "";
$messageType = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"] ?? "");
    $password = $_POST["password"] ?? "";

    if ($username === "" || $password === "") {
        $message = "Please enter your username and password.";
        $messageType = "error";
    } else {
        try {
            $stmt = $pdo->prepare(
                "SELECT id, full_name, username, password, role
                 FROM users
                 WHERE username = ?"
            );
            $stmt->execute([$username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user["password"])) {
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["full_name"] = $user["full_name"];
                $_SESSION["username"] = $user["username"];
                $_SESSION["role"] = $user["role"];

                header("Location: index.php");
                exit;
            } else {
                $message = "Invalid username or password.";
                $messageType = "error";
            }
        } catch (PDOException $e) {
            error_log($e->getMessage());
            $message = "Login failed. Please try again.";
            $messageType = "error";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Wesagn Hunet</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #eef2f7;
            margin: 0;
            padding: 30px 15px;
        }

        .login-box {
            background: white;
            max-width: 430px;
            margin: 20px auto;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px #00000018;
        }

        h2 {
            color: #123b63;
            text-align: center;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-top: 7px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        button {
            width: 100%;
            padding: 12px;
            margin-top: 22px;
            border: none;
            border-radius: 6px;
            background: #123b63;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #205d91;
        }

        .message {
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 15px;
        }

        .success {
            background: #d8f5df;
            color: #17652b;
        }

        .error {
            background: #ffe0e0;
            color: #a40000;
        }

        .links {
            text-align: center;
            margin-top: 18px;
        }
    </style>
</head>

<body>
    <div class="login-box">
        <h2>Login</h2>
        <p style="text-align:center">
            Wesagn Hunet Management System
        </p>

        <?php if ($message !== ""): ?>
            <div class="message <?= htmlspecialchars($messageType) ?>">
                <?= htmlspecialchars($message) ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="login.php">
            <label for="username">Username</label>
            <input
                type="text"
                id="username"
                name="username"
                maxlength="50"
                autocomplete="username"
                required
            >

            <label for="password">Password</label>
            <input
                type="password"
                id="password"
                name="password"
                autocomplete="current-password"
                required
            >

            <button type="submit">Login</button>
        </form>

        <div class="links">
            <a href="regster.php">Create account</a>
            <br><br>
            <a href="index.php">Back to Home</a>
        </div>
    </div>
</body>
</html>
