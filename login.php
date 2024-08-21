<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            height: 400px;
            background-color: rgba(237, 237, 237, 0.5); /* Warna abu-abu terang transparan */
            border-radius: 20px;
            margin-left: 400px;
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
        input[type="text"], input[type="password"] {
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
            margin-top: 30px;
            padding: 15px;
            margin-left: 20px;
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
            margin-top: 30px;
        }
        .error-message {
            color: red;
            text-align: center;
            margin-top: 20px;
        }
    </style>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    <div class="login-box">
        <h2>Login</h2>

        <?php
        session_start();

        // Include koneksi dari db.php
        include('db.php');

        // Variabel untuk pesan error
        $error_message = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];  // Hanya username
            $password = $_POST['password'];

            // Cek apakah username ada di database
            $sql = "SELECT * FROM users WHERE username=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Mendapatkan data user
                $user = $result->fetch_assoc();

                // Verifikasi password
                if (password_verify($password, $user['password'])) {
                    // Jika password benar, simpan username ke session dan redirect ke dashboard
                    $_SESSION['username'] = $user['username'];
                    header("Location: dashboard.php");
                    exit();
                } else {
                    $error_message = "Login gagal. Password salah.";
                }
            } else {
                $error_message = "Login gagal. Username tidak ditemukan.";
            }
        }
        ?>

        <form method="POST" action="">
            <div class="input-container">
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="input-container">
                <input type="password" id="password" name="password" placeholder="Password" required>
                <img src="img/eye-icon.png" class="toggle-password" onclick="togglePassword()">
            </div>
            <input type="submit" value="Login">
        </form>

        <!-- Tampilkan pesan error jika ada -->
        <?php
        if (!empty($error_message)) {
            echo "<div class='error-message'>$error_message</div>";
        }
        ?>

        <div class="register">
            Don't have an Account? <a href="register.php">Register</a>
        </div>
    </div>

    <script>
        function togglePassword() {
            var passwordField = document.getElementById("password");
            var toggleIcon = document.querySelector(".toggle-password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleIcon.src = "img/eye-slash-icon.png";
            } else {
                passwordField.type = "password";
                toggleIcon.src = "img/eye-icon.png";
            }
        }
    </script>
</body>
</html>
