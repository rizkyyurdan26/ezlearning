<?php
include 'db.php';

$success = false;
$error_message = "";

// Ambil ID kelas dari URL
$id = $_GET['id'];

// Cek apakah form di-submit untuk update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $nama_toko = $_POST['nama_toko'];
    $nama_kelas = $_POST['nama_kelas'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $link = $_POST['link'];

    // Update gambar jika di-upload
    if (!empty($_FILES['gambar_kelas']['name'])) {
        $gambar_kelas = $_FILES['gambar_kelas']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($gambar_kelas);

        // Upload file gambar
        if (move_uploaded_file($_FILES['gambar_kelas']['tmp_name'], $target_file)) {
            $gambar_kelas_path = $target_file;
        } else {
            $error_message = "Gagal mengupload gambar.";
        }
    } else {
        // Jika gambar tidak diubah, tetap gunakan gambar yang ada
        $gambar_kelas_path = $_POST['gambar_lama'];
    }

    // Query untuk update data kelas
    $query = "UPDATE kelas SET nama_toko = ?, nama_kelas = ?, harga = ?, deskripsi = ?, gambar_kelas = ?, link = ? WHERE id = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("ssisssi", $nama_toko, $nama_kelas, $harga, $deskripsi, $gambar_kelas_path, $link, $id);

        if ($stmt->execute()) {
            $success = true;
        } else {
            $error_message = "Terjadi kesalahan saat menyimpan data: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $error_message = "Terjadi kesalahan pada query: " . $conn->error;
    }
}

// Hapus kelas jika tombol delete ditekan
if (isset($_POST['confirm_delete'])) {
    $query = "DELETE FROM kelas WHERE id = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            header("Location: admin.php"); // Redirect setelah berhasil hapus
            exit();
        } else {
            $error_message = "Terjadi kesalahan saat menghapus data: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $error_message = "Terjadi kesalahan pada query: " . $conn->error;
    }
}

// Ambil data kelas dari database untuk ditampilkan di form
$query = "SELECT * FROM kelas WHERE id = ?";
if ($stmt = $conn->prepare($query)) {
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $kelas = $result->fetch_assoc();
    $stmt->close();
} else {
    die("Query gagal: " . $conn->error);
}

// Tutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kelas</title>
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
            margin-top: 10px;
            margin-bottom: 10px;
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

        /* Popup konfirmasi delete */
        .confirm-delete {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            z-index: 1000;
        }

        .confirm-delete button {
            padding: 10px 20px;
            margin: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .confirm-delete .btn-yes {
            background-color: #28a745;
            color: white;
        }

        .confirm-delete .btn-no {
            background-color: #dc3545;
            color: white;
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
            background-color: gray;
        }

        /* Tambahan untuk tombol dalam notifikasi */
        .notification a.btn {
            margin-top: 10px;
            display: block;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Edit Kelas</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="nama_toko">Nama Institusi:</label>
            <input type="text" id="nama_toko" name="nama_toko" value="<?php echo $kelas['nama_toko']; ?>" required>

            <label for="nama_kelas">Nama Kelas:</label>
            <input type="text" id="nama_kelas" name="nama_kelas" value="<?php echo $kelas['nama_kelas']; ?>" required>

            <label for="harga">Harga (Rp):</label>
            <input type="number" id="harga" name="harga" value="<?php echo $kelas['harga']; ?>" required>

            <label for="deskripsi">Deskripsi:</label>
            <textarea id="deskripsi" name="deskripsi" rows="5" required><?php echo $kelas['deskripsi']; ?></textarea>

            <label for="link">Link Video:</label>
            <input type="text" id="link" name="link" value="<?php echo $kelas['link']; ?>" required>

            <label for="gambar_kelas">Upload Gambar Kelas:</label>
            <input type="file" id="gambar_kelas" name="gambar_kelas">
            <input type="hidden" name="gambar_lama" value="<?php echo $kelas['gambar_kelas']; ?>">

            <input type="submit" name="update" value="Update Kelas">
        </form>
        <form id="deleteForm" action="" method="POST">
            <input type="submit" name="delete" value="Hapus Kelas" style="background-color: red; color: white;" onclick="showConfirmDelete(event)">
        </form>
        <a href="admin.php" class="btn close">Kembali</a>
    </div>

    <div class="notification <?php echo $success ? 'success' : 'error'; ?> <?php echo ($success || !empty($error_message)) ? 'show' : ''; ?>">
        <?php
        if ($success) {
            echo "Kelas berhasil diperbarui.";
        } elseif (!empty($error_message)) {
            echo "Error: " . $error_message;
        }
        ?>
        <a href="admin.php" class="btn">Home</a>
    </div>

    <!-- Popup konfirmasi delete -->
    <div class="confirm-delete" id="confirmDeletePopup">
        <p>Apakah Anda yakin ingin menghapus kelas ini?</p>
        <button class="btn-yes" onclick="confirmDelete()">Ya</button>
        <button class="btn-no" onclick="cancelDelete()">Tidak</button>
    </div>

    <script>
        function showConfirmDelete(event) {
            event.preventDefault(); // Mencegah form submit langsung
            document.getElementById('confirmDeletePopup').style.display = 'block';
        }

        function confirmDelete() {
            // Submit form untuk menghapus kelas
            document.getElementById('deleteForm').innerHTML += '<input type="hidden" name="confirm_delete" value="1">';
            document.getElementById('deleteForm').submit();
        }

        function cancelDelete() {
            document.getElementById('confirmDeletePopup').style.display = 'none';
        }
    </script>
</body>
</html>
