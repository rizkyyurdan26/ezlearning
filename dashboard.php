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

        /* Hero Section */
        .hero {
            background: url('img/bg2.jpg') no-repeat center center/cover;
            height: 1000px;
            color: white;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .hero h1 {
            font-size: 100px;
            margin-bottom: 20px;
        }
        .hero h2{
            font-size: 30px;
            margin-bottom: 50px;
        }

        .hero p {
            font-size: 20px;
            margin-bottom: 40px;
        }

        .hero .cards {
            display: flex;
            justify-content: center;
            gap: 150px;
            margin-top: 20px;
        }

        .hero .card {
            background-color: rgba(0, 0, 90, 0.8);
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            height: 200px;
            color: white;
            text-align: left;
        }

        .hero .card h3 {
            margin-bottom: 10px;
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
            font-size: 28px; /* Atur sesuai kebutuhan, misalnya 24px */
            color: #ccc; /* Warna ikon */
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
        <div class="dashboard"> Dashboard</div>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#footer">Contact</a></li>
                <li><a href="myclass.php">MyClass</a></li>
                <li><a href="index.php">Log Out</a></li>
                
            </ul>
        </nav>
    </header>

    <section class="hero">
        <h1>Find Quality Courses Only Here</h1>
        <h2>Discover the experience of exploring high quality Courses according to your needs</h2>
        <div class="input-container">
                <input type="text" name="text" placeholder="search" required>
                <i class="fas fa-search search-icon"></i>
        </div>
    </section>



    <section class="products">
    <h2>Availble Courses</h2>
    <p>find your suitable courses based on your opportunities</p>
    <div class="products-grid">
        <?php
        include 'db.php'; // Menghubungkan ke database

        $query = "SELECT * FROM kelas";
        $result = mysqli_query($conn, $query);
        
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<a href='detail_kelas.php?id=" . $row['id'] . "' class='product-card' style='position: relative; text-decoration: none;'>";
                echo "<img src='" . $row['gambar_kelas'] . "' alt='" . $row['nama_kelas'] . "' style='width: 100%; height: 400px; object-fit: cover;'>";
                echo "<div class='product-info' style='position: absolute;background-color: rgba(0, 0, 0, 0.4); padding: 10px; bottom: 0px; left: 0px; right: 0px; color: white;'>";
                echo "<p style='font-size: 20px; margin-left: 10px; font-weight: bold; margin-bottom: 5px;'>Rp. " . number_format($row['harga'], 2, ',', '.') . "</p>"; // Harga, format mata uang
                echo "<p style='font-size: 20px; margin-left: 10px; font-weight: bold; margin-bottom: 15px;'>" . $row['nama_kelas'] . "</p>"; // Nama Kelas
                echo "<p style='font-size: 15px; margin: 0; display: flex; margin-left: 10px; align-items: center;'>";
                echo "<img src='img/toko.png' alt='Toko Icon' style='width: 20px; height: 20px; margin-right: 5px;'>"; // Ikon Toko
                echo $row['nama_toko'] . "</p>";
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
            <a href="login_admin.php">Admin</a>
            <p>&nbsp;&nbsp;</p>
            <p>&copy; 2024 EzLearning. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
