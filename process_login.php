<?php
// process_login.php
// process_login.php

// Pastikan file koneksi database sudah disertakan
require_once 'db_connection.php';

// Ambil data POST dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Query untuk mencari user berdasarkan username
$sql = "SELECT * FROM m_user WHERE username = ?";
$stmt = $db->prepare($sql);
$stmt->bind_param("s", $username); // 's' berarti string
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Jika username ditemukan, ambil data user
    $user = $result->fetch_assoc();

    // Verifikasi password (pastikan password di database sudah di-hash)
    if (md5(($password) === $user['password'])) {
        // Password benar, set session atau login berhasil
        session_start();
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $user['username'];
        $_SESSION['role_id'] = $user['role_id'];
        echo 'success';  // Login berhasil
    } else {
        // Password salah
        echo 'failure';
    }
} else {
    // Username tidak ditemukan
    echo 'failure';
}
