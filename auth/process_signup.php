<?php
require_once "../config/database.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // ambil POST
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // validasi sederhana
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        echo "Field harus diisi";
        exit();
    }

    // cek password
    if ($password !== $confirm_password) {
        echo "Password tidak sama";
        exit();
    }

    // cek query
    $sql = "SELECT id FROM users WHERE email = ?";

    // prepare statement
    $stmt = mysqli_prepare($conn, $sql);

    // bind parameter
    mysqli_stmt_bind_param($stmt, "s", $email);

    // eksekusi query
    mysqli_stmt_execute($stmt);

    // ambil hasil query
    $result = mysqli_stmt_get_result($stmt);

    // cek email apakah sudah ada
    if (mysqli_num_rows($result) > 0) {
        echo "Email sudah terdaftar";
        exit();
    }

    // hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // query baru untuk di insert
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?) ";

    // prepare ulang statement
    $stmt = mysqli_prepare($conn, $sql);

    // bind parameter
    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashed_password);

    // execute
    if (mysqli_stmt_execute($stmt) > 0) {
        echo "Signup Berhasil";
    } else {
        echo "Terjadi kesalahan";
    }
}
