<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kelas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            box-sizing: border-box;
            background-color: #f8f9fa;
        }

        header {
            background-color: rgba(0, 0, 60, 0.5);
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        header .logo {
            font-size: 24px;
            font-weight: bold;
            margin-left: 20px;
        }
        header .dashboard {
            font-size: 35px;
            font-weight: bold;
            margin-left: 200px;
        }

        header nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        header nav ul li {
            margin-right: 20px;
        }

        header nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container img {
            width: 100%;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .container h1 {
            font-size: 30px;
            margin-bottom: 20px;
        }

        .container p {
            font-size: 18px;
            margin-bottom: 10px;
            line-height: 1.5;
        }

        .price {
            font-size: 24px;
            color: #007bff;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .buy-button {
            display: block;
            width: 100%;
            padding: 15px;
            text-align: center;
            background-color: #007bff;
            color: white;
            font-size: 20px;
            font-weight: bold;
            border-radius: 10px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .buy-button:hover {
            background-color: #0056b3;
        }

        .toko-info {
            display: flex;
            align-items: center;
            margin-bottom: 5px; /* Penambahan margin bawah */
        }

        .toko-info img {
            width: 40px; /* Ukuran gambar */
            height: 40px;
            margin-right: 10px; /* Jarak antara ikon dan teks */
            vertical-align: middle;
        }

        .toko-info p {
            margin: 0;
            font-size: 18px; /* Ukuran teks */
            font-weight: bold;
        }

    </style>
</head>
<body>

<header>
    <div class="logo">EzLearning</div>
    <div class="dashboard">Detail Kelas</div>
    <nav>
        <ul>
            <li><a href="dashboard.php">Home</a></li>
            <li><a href="myclass.php">MyClass</a></li>
            <li><a href="index.php">Log Out</a></li>
        </ul>
    </nav>
</header>

<div class="container">
    <?php
    include 'db.php'; // Menghubungkan ke database

    $id = $_GET['id'];
    $query = "SELECT * FROM kelas WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        echo "<img src='" . $row['gambar_kelas'] . "' alt='" . $row['nama_kelas'] . "'>";
        echo "<h1>" . $row['nama_kelas'] . "</h1>";
        echo "<div class='toko-info'><img src='img/toko.svg' alt='Toko'><p>" . $row['nama_toko'] . "</p></div>";
        echo "<p><strong>Deskripsi Kelas:</strong> " . $row['deskripsi'] . "</p>";
        echo "<p class='price'>Rp. " . number_format($row['harga'], 2, ',', '.') . "</p>";
        echo "<a href='checkout.php?id=" . $row['id'] . "' class='buy-button'>Beli Kelas</a>";
    } else {
        echo "<p>Detail kelas tidak ditemukan.</p>";
    }

    $conn->close();
    ?>
</div>

</body>
</html>
