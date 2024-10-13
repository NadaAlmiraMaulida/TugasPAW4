<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['Username'];
    $password = password_hash($_POST['Password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password) VALUES ('$username' , '$password')";
    if ($conn->query($sql) == TRUE) {
        $_SESSION['username'] = $username; 
        header('Location: list_barang.php');
        echo "Registration successful!";
    } else {
        echo "Error, failed to register: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            background-color: #f8f4f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .registration-form {
            background-color: #fff; 
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 320px;
            border: 1px solid #e0dcd3; 
        }
        .registration-form h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #4b3f36; 
            font-weight: bold;
        }
        .registration-form label {
            display: block;
            margin-bottom: 5px;
            color: #6e6259;
        }
        .registration-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            background-color: #f9f7f6; 
            box-sizing: border-box;
        }
        .registration-form button {
            width: 100%;
            padding: 12px;
            background-color: #d1a054; 
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            font-size: 16px;
        }
        .registration-form button:hover {
            background-color: #b38d45; 
        }
        .registration-form button:active {
            background-color: #996f38;
        }
        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="registration-form">
    <h2>Register</h2>
    <form method="post" action="register.php">
        <label for="username">Username</label>
        <input type="text" id="username" name="Username" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="Password" required>

        <button type="submit">Submit</button>
    </form>
</div>

</body>
</html>
