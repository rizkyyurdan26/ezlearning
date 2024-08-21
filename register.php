<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            background: url('img/bg1.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: left;
            height: 100vh;
            margin: 0;
        }
        .login-box {
            width: 300px;
            padding: 40px;
            background-color: rgba(237, 237, 237, 0.5); /* Warna abu-abu terang transparan */
            border-radius: 20px;
            margin-left: 200px;
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.2), /* Inner shadow */
                        0 4px 8px rgba(0, 0, 0, 0.1); /* Shadow luar halus */
        }
        h2 {
            text-align: center;
            margin-bottom: 50px;
            font-weight: bold;
        }
        .input-container {
            position: relative;
            margin-bottom: 20px;
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: calc(100% - 20px);
            padding: 20px;
            margin: 0;
            margin-left: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }
        .toggle-password {
            position: absolute;
            right: 25px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
        input[type="submit"] {
            width: calc(100% - 20px);
            padding: 15px;
            margin-left:20px;
            margin-top: 30px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        a {
            text-decoration: none;
            color: #0113B0;
        }
        .register {
            text-align: center;
            margin-top: 10px;
        }
        .error-message, .success-message {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
        .success-message {
            color: green;
        }
    </style>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- For Font Awesome Icons -->
</head>
<body>
    <div class="login-box">
        <h2>Register</h2>

        <?php
        include('db.php'); // Import koneksi database

        $error_message = "";
        $success_message = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            // Validasi jika password dan confirm password sesuai
            if ($password !== $confirm_password) {
                $error_message = "Password dan Confirm Password tidak cocok.";
            } else {
                // Cek apakah username sudah ada
                $check_username = "SELECT * FROM users WHERE username='$username'";
                $result = $conn->query($check_username);

                if ($result->num_rows > 0) {
                    $error_message = "Username sudah ada. Silakan pilih username lain.";
                } else {
                    // Hash password
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                    // Simpan ke database
                    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

                    if ($conn->query($sql) === TRUE) {
                        $success_message = "Akun berhasil dibuat! Silakan Login";
                    } else {
                        $error_message = "Terjadi kesalahan: " . $conn->error;
                    }
                }
            }
        }
        ?>

        <form method="POST" action="">
            <div class="input-container">
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="input-container">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-container">
                <input type="password" id="password" name="password" placeholder="Password" required>
                <img src="img/eye-icon.png" class="toggle-password" onclick="togglePassword()">
            </div>
            <div class="input-container">
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
            </div>
            <input type="submit" value="Register">
        </form>

        <!-- Menampilkan pesan sukses atau error -->
        <?php
        if (!empty($error_message)) {
            echo "<div class='error-message'>$error_message</div>";
        }

        if (!empty($success_message)) {
            echo "<div class='success-message'>$success_message</div>";
        }
        ?>

        <div class="register">
            Already have an Account? <a href="login.php">Login</a>
        </div>
    </div>

    <script>
        function togglePassword() {
            var passwordField = document.getElementById("password");
            var confirmPasswordField = document.getElementById("confirm_password");
            var toggleIcon = document.querySelector(".toggle-password");

            if (passwordField.type === "password" && confirmPasswordField.type === "password") {
                passwordField.type = "text";
                confirmPasswordField.type = "text";
                toggleIcon.src = "img/eye-slash-icon.png";
            } else {
                passwordField.type = "password";
                confirmPasswordField.type = "password";
                toggleIcon.src = "img/eye-icon.png";
            }
        }
    </script>
</body>
</html>
