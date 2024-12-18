<?php
// controllers/LoginController.php
require_once '../models/UserModel.php';

class LoginController
{

    private $userModel;

    public function __construct($db)
    {
        $this->userModel = new UserModel($db);
    }

    // Proses login
    public function login($username, $password)
    {
        $user = $this->userModel->checkLogin($username, $password);
        if ($user) {
            session_start();
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $user['username'];
            return true;
        }
        return false;
    }

    // Ambil data pengguna
    public function getUsers()
    {
        return $this->userModel->getUsers();
    }
}
