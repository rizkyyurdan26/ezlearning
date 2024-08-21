<?php
// Koneksi ke database
include 'db.php';

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_toko = $_POST['nama_toko'];
    $nama_kelas = $_POST['nama_kelas'];
    $harga = $_POST['harga'];
    $gambar_kelas = $_POST['gambar_kelas'];
    $deskripsi = $_POST['deskripsi'];
    $link = $_POST['link'];
    $payment_method = $_POST['payment'];
    $nomor_akun = $_POST['account_number'];
    $nama_akun = $_POST['account_name'];

    // Simpan data ke tabel kelas_beli
    $stmt = $conn->prepare("INSERT INTO kelas_beli (nama_toko, nama_kelas, harga, gambar_kelas, deskripsi, nomor_akun, nama_akun, link) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdsssss", $nama_toko, $nama_kelas, $harga, $gambar_kelas, $deskripsi, $nomor_akun, $nama_akun, $link);

    if ($stmt->execute()) {
        // Redirect ke halaman myclass setelah pembelian berhasil
        echo "<script>alert('Pembayaran berhasil, lanjutkan belajar!'); window.location.href='myclass.php';</script>";
    } else {
        echo "Terjadi kesalahan: " . $stmt->error;
    }

    $stmt->close();
} else {
    // Ambil data kelas dari database berdasarkan id yang dikirim via URL
    $id = $_GET['id'];
    $query = "SELECT * FROM kelas WHERE id = $id";
    $result = $conn->query($query);

    if ($row = $result->fetch_assoc()) {
        // Tampilkan form checkout dengan data kelas yang diambil
        $nama_toko = $row['nama_toko'];
        $nama_kelas = $row['nama_kelas'];
        $harga = $row['harga'];
        $gambar_kelas = $row['gambar_kelas'];
        $deskripsi = $row['deskripsi'];
        $link = $row['link'];
    } else {
        echo "<script>alert('Kelas tidak ditemukan.'); window.location.href='detail_kelas.php';</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            box-sizing: border-box;
            background-color: #f8f9fa;
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
            text-align: center;
        }

        .payment-methods {
            margin-bottom: 20px;
        }

        .payment-method {
            margin-bottom: 10px;
        }

        .payment-method input {
            margin-right: 10px;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
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
    </style>
</head>
<body>

<div class="container">
    <h1>Pilih Metode Pembayaran</h1>
    <form method="POST" action="">
        <div class="payment-methods">
            <div class="payment-method">
                <input type="radio" id="bank_transfer" name="payment" value="bank_transfer" required>
                <label for="bank_transfer">Transfer Bank</label>
            </div>
            <div class="payment-method">
                <input type="radio" id="credit_card" name="payment" value="credit_card" required>
                <label for="credit_card">Kartu Kredit</label>
            </div>
            <div class="payment-method">
                <input type="radio" id="ewallet" name="payment" value="ewallet" required>
                <label for="ewallet">E-Wallet</label>
            </div>
        </div>
        <div class="input-group">
            <label for="account_number">Nomor Akun</label>
            <input type="text" id="account_number" name="account_number" required>
        </div>
        <div class="input-group">
            <label for="account_name">Nama Akun</label>
            <input type="text" id="account_name" name="account_name" required>
        </div>
        <!-- Hidden fields to capture class details -->
        <input type="hidden" name="nama_toko" value="<?php echo $nama_toko; ?>">
        <input type="hidden" name="nama_kelas" value="<?php echo $nama_kelas; ?>">
        <input type="hidden" name="harga" value="<?php echo $harga; ?>">
        <input type="hidden" name="gambar_kelas" value="<?php echo $gambar_kelas; ?>">
        <input type="hidden" name="deskripsi" value="<?php echo $deskripsi; ?>">
        <input type="hidden" name="link" value="<?php echo $link; ?>">
        <button type="submit" class="buy-button">Pesan Kelas</button>
    </form>
</div>

</body>
</html>
