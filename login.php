<?php
include 'db.php';
session_start();

$error_message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            header('Location: list_barang.php');
            exit();
        } else {
            $error_message = "Invalid password";
        }
    } else {
        $error_message = "No user found";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            background-color: #f3f0ec;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-form {
            background-color: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 320px;
            border: 1px solid #dfd8cc;
        }
        .login-form h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #4a4035;
            font-weight: bold;
        }
        .login-form label {
            display: block;
            margin-bottom: 5px;
            color: #6d6055;
        }
        .login-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            background-color: #f8f6f5;
            box-sizing: border-box;
        }
        .login-form button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            background-color: #d4a65a;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            font-size: 16px;
        }
        .login-form button:hover {
            background-color: #b98b4b;
        }
        .login-form button:active {
            background-color: #a07a3d;
        }
        .register-link {
            text-align: center;
            margin-top: 15px;
            color: #4a4035;
        }
        .register-link a {
            text-decoration: none;
            color: #d4a65a;
            font-weight: bold;
        }
        .register-link a:hover {
            color: #b98b4b;
        }
        .error-message {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="login-form">
    <h2>Login</h2>
    <form method="post" action="login.php">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>

        <button type="submit">Login</button>
    </form>
    <div class="register-link">
        <p>Don't have an account? <a href="register.php">Register</a></p>
    </div>
    <?php if (!empty($error_message)): ?>
        <div class="error-message"><?php echo $error_message; ?></div>
    <?php endif; ?>
</div>

</body>
</html>
