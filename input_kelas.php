<?php
// Include koneksi ke database dari db.php
include('db.php');

$success = false;
$error_message = "";

// Cek apakah form di-submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $nama_toko = $_POST['nama_toko'];
    $nama_kelas = $_POST['nama_kelas'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $link = $_POST['link'];

    // Mengambil data file gambar
    $gambar_kelas = $_FILES['gambar_kelas']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($gambar_kelas);

    // Validasi jika gambar berhasil di-upload
    if (move_uploaded_file($_FILES['gambar_kelas']['tmp_name'], $target_file)) {
        // Query untuk menyimpan data ke tabel kelas (dengan harga dan deskripsi)
        $sql = "INSERT INTO kelas (nama_toko, nama_kelas, harga, deskripsi, gambar_kelas, link) VALUES (?, ?, ?, ?, ?, ?)";
        
        // Siapkan statement untuk mencegah SQL Injection
        if ($stmt = $conn->prepare($sql)) {
            // Bind parameter
            $stmt->bind_param("ssisss", $nama_toko, $nama_kelas, $harga, $deskripsi, $target_file, $link); // 's' untuk string dan 'i' untuk integer

            // Eksekusi statement
            if ($stmt->execute()) {
                $success = true;
            } else {
                $error_message = "Terjadi kesalahan saat menyimpan data: " . $stmt->error;
            }
            
            // Tutup statement
            $stmt->close();
        } else {
            $error_message = "Terjadi kesalahan pada query: " . $conn->error;
        }
    } else {
        $error_message = "Gagal mengupload gambar.";
    }
}

// Tutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kelas</title>
    <style>
        /* Styling form */
        .form-container {
            margin: 50px;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            margin: 50px auto;
        }
        input[type="text"], input[type="file"], input[type="number"], textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Notifikasi popup */
        .notification {
            visibility: hidden;
            min-width: 300px;
            background-color: #333;
            color: white;
            text-align: center;
            padding: 16px;
            position: fixed;
            z-index: 1;
            left: 50%;
            top: 30px;
            transform: translateX(-50%);
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .notification.success {
            background-color: #28a745;
        }

        .notification.error {
            background-color: #dc3545;
        }

        .notification.show {
            visibility: visible;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        @keyframes fadein {
            from { top: 0; opacity: 0; }
            to { top: 30px; opacity: 1; }
        }

        @keyframes fadeout {
            from { top: 30px; opacity: 1; }
            to { top: 0; opacity: 0; }
        }

        /* Tombol kembali atau close */
        .btn {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn.close {
            background-color: #dc3545;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Form Tambah Kelas</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="nama_toko">Nama Institusi:</label>
            <input type="text" id="nama_toko" name="nama_toko" required>

            <label for="nama_kelas">Nama Kelas:</label>
            <input type="text" id="nama_kelas" name="nama_kelas" required>

            <label for="harga">Harga (Rp):</label>
            <input type="number" id="harga" name="harga" required>

            <label for="deskripsi">Deskripsi Kelas:</label>
            <textarea id="deskripsi" name="deskripsi" required></textarea>

            <label for="link">Link Video:</label>
            <input type="text" id="link" name="link" required>

            <label for="gambar_kelas">Upload Gambar Kelas:</label>
            <input type="file" id="gambar_kelas" name="gambar_kelas" required>

            <input type="submit" value="Tambah Kelas">
        </form>
    </div>

    <!-- Notifikasi -->
    <div id="notification" class="notification">
        <p id="notification-message"></p>
        <a id="notification-button" class="btn"></a>
    </div>

    <script>
        // Function to show notification
        function showNotification(message, type, buttonText, buttonLink) {
            var notification = document.getElementById('notification');
            var messageElement = document.getElementById('notification-message');
            var buttonElement = document.getElementById('notification-button');

            messageElement.innerText = message;
            notification.classList.add(type);
            buttonElement.innerText = buttonText;

            // Set button action based on type
            if (type === 'success') {
                buttonElement.href = buttonLink;
            } else {
                buttonElement.href = "#";
                buttonElement.onclick = function() { hideNotification(); };
            }

            notification.classList.add('show');
        }

        // Function to hide notification
        function hideNotification() {
            var notification = document.getElementById('notification');
            notification.classList.remove('show');
        }

        // Show appropriate notification based on PHP result
        <?php if ($success): ?>
            showNotification("Kelas berhasil ditambahkan!", "success", "Kembali ke Home", "admin.php");
        <?php elseif (!empty($error_message)): ?>
            showNotification("<?php echo $error_message; ?>", "error", "Close", "#");
        <?php endif; ?>
    </script>

</body>
</html>
