<?php
session_start();

require_once "../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        echo "Email dan Password harus diisi";
    }

    // membuat query
    $sql = "SELECT * FROM users WHERE email = ?";

    // prepare statement
    $stmt = mysqli_prepare($conn, $sql);

    // bind parameter
    mysqli_stmt_bind_param($stmt, "s", $email);

    // eksekusi query
    mysqli_stmt_execute($stmt);

    // ambil hasil query
    $result = mysqli_stmt_get_result($stmt);

    // cek apakah ada user
    if (empty($email) || empty($password)) {
        echo "Email dan Password harus diisi";
        exit;
    }

    if (mysqli_num_rows($result) === 1) {

        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            header("Location: ../index.php");
            exit;
        } else {
            echo "Password salah";
        }
    } else {
        echo "Email belum terdaftar";
    }
}
