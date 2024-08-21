<?php
session_start();

// Cek apakah sesi admin ada
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login_admin.php");
    exit();
}
?>

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
            text-align: center;
            z-index: 1000;
        }

        header .logo {
            font-size: 24px;
            font-weight: bold;
            margin-left: 0px;
        }
        header .judul {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-left: 0px;
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
            align-items: center; /* Menyusun grid di tengah secara horizontal */
            justify-content: center; /* Menyusun grid di tengah secara vertikal */
            min-height: 100vh; /* Membuat section minimal setinggi viewport */
        }
        .products h2 {
            font-size: 32px;
            margin-bottom: 40px;
        }
        .products p{
            font-size: 20px;
            margin-bottom: 70px;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 80px;
            justify-content: center; /* Menyusun grid di tengah secara horizontal */
            align-items: center; /* Menyusun grid di tengah secara vertikal */
        }

        .product-card {
            background-color: #f5f5f5;
            border-radius: 10px;
            overflow: hidden;
            text-align: left;
            position: relative;
            cursor: pointer; /* Menambahkan cursor pointer */
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
        <div class="logo">EzLearning</div>
        <div class="judul">Admin</div>
        <nav>
            <ul>
                <li><a href="input_kelas.php">Add Class</a></li>
                
                <li><a href="logout_admin.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    

    <section class="products">
    <h2>Available Courses</h2>
    <div class="products-grid">
        <?php
        include 'db.php'; // Menghubungkan ke database

        $query = "SELECT * FROM kelas";
        $result = mysqli_query($conn, $query);
        
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<a href='edit_kelas.php?id=" . $row['id'] . "' class='product-card' style='position: relative; text-decoration: none;'>";
                echo "<img src='" . $row['gambar_kelas'] . "' alt='" . $row['nama_kelas'] . "' style='width: 100%; height: 400px; object-fit: cover;'>";
                echo "<div class='product-info' style='position: absolute;background-color: rgba(0, 0, 0, 0.4); padding: 10px; bottom: 0px; left: 0px; right: 0px; color: white;'>";
                echo "<p style='font-size: 20px; margin-left: 10px; font-weight: bold; margin-bottom: 5px;'>Rp. " . number_format($row['harga'], 2, ',', '.') . "</p>"; // Harga, format mata uang
                echo "<p style='font-size: 20px; margin-left: 10px; font-weight: bold; margin-bottom: 15px;'>" . $row['nama_kelas'] . "</p>"; // Nama Kelas
                echo "<p style='font-size: 15px; margin: 0; display: flex; margin-left: 10px; align-items: center; margin-bottom: 15px;'>";
                echo "<img src='img/toko.png' alt='Toko Icon' style='width: 20px; height: 20px; margin-right: 5px;'>"; // Ikon Toko
                echo $row['nama_toko'] . "</p>";
                echo "<span onclick=\"location.href='edit_kelas.php?id=" . $row['id'] . "'\" style='background-color: transparent; color: white; border: none; font-size: 15px; margin: 0; margin-left: 10px; text-decoration: underline; cursor: pointer;'>Edit</span>";
                echo "</div>";
                echo "</a>";
            }
        } else {
            echo "No classes found.";
        }

        // Tutup koneksi database
        $conn->close();
        ?>
    </div>
</section>


    <footer id="footer"> <!-- Added id to footer -->
        <div class="contact-info">
            <p><i class="fas fa-envelope"></i> Email: ezlearning@gmail.com</p>
            <p><i class="fas fa-phone"></i> Phone: +123-456-7890</p>
            <p><i class="fas fa-map-marker-alt"></i> Jalan Kaliurang No. 123, Jogja, Indonesia</p>
            <p>&nbsp;&nbsp;</p>
            <p>&copy; 2024 EzLearning. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
