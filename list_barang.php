<?php
include 'db.php';
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

$sql = "SELECT * FROM products";
$result = $conn->query($sql);
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List Barang</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f3f0ec;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #4a4035;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dfd8cc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #d4a65a;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f8f6f5;
        }

        tr:hover {
            background-color: #eae1db; 
        }

        button {
            background-color: #d4a65a; 
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            display: block;
            margin: 20px auto;
        }

        button:hover {
            background-color: #b98b4b; 
        }
    </style>
</head>
<body>
    <h1>Hello, <?php echo htmlspecialchars($username); ?>!</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Ukuran</th>
            <th>Warna</th>
        </tr>
        <?php 
        while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td>Rp<?php echo number_format($row['price'], 2, ',', '.'); ?></td>
            <td><?php echo $row['size']; ?></td>
            <td><?php echo $row['color']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <form method='post' action="logout.php">
        <button type="submit">Logout</button>
    </form>
</body>
</html>
