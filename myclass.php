<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EzLearning Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Global Styles */
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* memastikan halaman memenuhi tinggi viewport */
        }

        /* Sticky Header */
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

        /* Top Products Section */
        .products {
            padding: 50px 50px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            flex-grow: 1; /* memastikan section ini mengisi ruang yang tersedia */
        }
        .products h2 {
            font-size: 32px;
            margin-bottom: 0px;
        }
        .products p{
            font-size: 20px;
            margin-bottom: 70px;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 80px;
            justify-content: center;
            align-items: center;
        }

        .product-card {
            background-color: #f5f5f5;
            border-radius: 10px;
            overflow: hidden;
            text-align: left;
            position: relative;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-card img {
            width: 100%;
            height: auto;
        }

        .product-card h3, .product-card p {
            padding: 0px;
            margin: 0;
        }

        .product-card .brand {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 5px 10px;
            font-size: 12px;
            border-radius: 5px;
        }

        .input-container {
            position: relative;
            margin-top: 50px;
        }
        input[type="text"] {
            width: 700px;
            padding: 20px 20px 20px 70px;
            margin: 0;
            margin-left: 20px;
            border: 1px solid #ccc;
            border-radius: 15px;
            font-size: 20px;
            box-sizing: border-box;
        }
        .search-icon {
            font-size: 28px;
            color: #ccc;
            position: absolute;
            top: 50%;
            left: 50px;
            transform: translateY(-50%);
            pointer-events: none;
        }

        /* Footer Section */
        footer {
            background-color: #111;
            color: white;
            padding: 20px;
            padding-left: 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        footer .contact-info {
            font-size: 18px;
        }

        footer .contact-info i {
            margin-right: 10px;
        }

        /* Responsive Styles */
        @media (max-width: 1200px) {
            .products-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .products-grid {
                grid-template-columns: 1fr;
            }

            .hero {
                height: 400px;
            }

            .hero .card {
                width: 150px;
            }

            .hero h1 {
                font-size: 32px;
            }

            .hero p {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>

    <header>
        <div class="logo"> EzLearning</div>
        <div class="dashboard"> My Class</div>
        <nav>
            <ul>
                <li><a href="dashboard.php">Home</a></li>
                <li><a href="#footer">Contact</a></li>
                <li><a href="myclass.php">MyClass</a></li>
                <li><a href="index.php">Log Out</a></li>
            </ul>
        </nav>
    </header>


    <section class="products">
        <div class="products-grid">
            <?php
            include 'db.php'; // Menghubungkan ke database

            $query = "SELECT * FROM kelas_beli";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<a href='kelas_mulai.php?id=" . $row['id'] . "' class='product-card' style='position: relative; text-decoration: none;'>";
                    echo "<img src='" . $row['gambar_kelas'] . "' alt='" . $row['nama_kelas'] . "' style='width: 100%; height: 400px; object-fit: cover;'>";
                    echo "<div class='product-info' style='position: absolute;background-color: rgba(0, 0, 0, 0.4); padding: 10px; bottom: 0px; left: 0px; right: 0px; color: white;'>";
                    echo "<p style='font-size: 20px; margin-left: 10px; font-weight: bold; margin-bottom: 5px;'>Rp. " . number_format($row['harga'], 2, ',', '.') . "</p>";
                    echo "<p style='font-size: 20px; margin-left: 10px; font-weight: bold; margin-bottom: 15px;'>" . $row['nama_kelas'] . "</p>";
                    echo "<p style='font-size: 15px; margin: 0; display: flex; margin-left: 10px; align-items: center;'>";
                    echo "<img src='img/toko.png' alt='Toko Icon' style='width: 20px; height: 20px; margin-right: 5px;'>";
                    echo $row['nama_toko'] . "</p>";
                    echo "</div>";
                    echo "</a>";
                }
            } else {
                echo "No classes found.";
            }

            $conn->close();
            ?>
        </div>
    </section>

    <footer id="footer">
        <div class="contact-info">
            <p><i class="fas fa-envelope"></i> Email: ezlearning@gmail.com</p>
            <p><i class="fas fa-phone"></i> Phone: +123-456-7890</p>
            <p><i class="fas fa-map-marker-alt"></i> Jalan Kaliurang No. 123, Jogja, Indonesia</p>
            <a href="login_admin.php">Admin</a>
            <p>&nbsp;&nbsp;</p>
            <p>&copy; 2024 EzLearning. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
