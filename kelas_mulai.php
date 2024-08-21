<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mulai Kelas</title>
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

        .container h1 {
            font-size: 30px;
            margin-bottom: 20px;
        }

        .container p {
            font-size: 18px;
            margin-bottom: 10px;
            line-height: 1.5;
        }

        .container video, .container iframe {
            width: 100%;
            height: 400px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .toko-info {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }

        .toko-info img {
            width: 40px;
            height: 40px;
            margin-right: 10px;
            vertical-align: middle;
        }

        .toko-info p {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
        }

    </style>
</head>
<body>

<header>
    <div class="logo">EzLearning</div>
    <div class="dashboard">Mulai Kelas</div>
    <nav>
        <ul>
           
            <li><a href="myclass.php">MyClass</a></li>
            <li><a href="index.php">Log Out</a></li>
        </ul>
    </nav>
</header>

<div class="container">
    <?php
    include 'db.php'; // Menghubungkan ke database

    // Fungsi untuk mengonversi URL video menjadi URL embed
    function getEmbedUrl($url) {
        if (strpos($url, 'youtube.com') !== false) {
            // Jika URL adalah YouTube dengan format watch?v=
            $query_str = parse_url($url, PHP_URL_QUERY);
            parse_str($query_str, $query_params);
            $video_id = $query_params['v'];
            return "https://www.youtube.com/embed/$video_id";
        } elseif (strpos($url, 'youtu.be') !== false) {
            // Jika URL adalah YouTube dengan format youtu.be
            $video_id = explode("youtu.be/", $url)[1];
            return "https://www.youtube.com/embed/$video_id";
        } elseif (strpos($url, 'vimeo.com') !== false) {
            // Jika URL adalah Vimeo
            $video_id = (int)substr(parse_url($url, PHP_URL_PATH), 1);
            return "https://player.vimeo.com/video/$video_id";
        } else {
            // Jika URL tidak dikenal atau formatnya tidak didukung
            return $url;
        }
    }

    $id = $_GET['id'];
    $query = "SELECT * FROM kelas_beli WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        echo "<h1>" . $row['nama_kelas'] . "</h1>";
        echo "<div class='toko-info'><img src='img/toko.svg' alt='Toko'><p>" . $row['nama_toko'] . "</p></div>";
        echo "<p><strong>Deskripsi Kelas:</strong> " . $row['deskripsi'] . "</p>";

        // Menampilkan video berdasarkan link yang diambil dari database
        $video_link = $row['link'];
        $embed_link = getEmbedUrl($video_link);

        // Tampilkan video dalam iframe
        echo "<iframe src='$embed_link' frameborder='0' allow='autoplay; encrypted-media' allowfullscreen></iframe>";
    } else {
        echo "<p>Kelas tidak ditemukan.</p>";
    }

    $conn->close();
    ?>
</div>

</body>
</html>
