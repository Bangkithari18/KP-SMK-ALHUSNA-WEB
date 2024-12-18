<?php
// models/UserModel.php
class UserModel
{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Cek kredensial login
    public function checkLogin($username, $password)
    {
        $stmt = $this->db->prepare("SELECT * FROM m_user WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Ambil data user
    public function getUsers()
    {
        $stmt = $this->db->query("SELECT id, username, password, role_id, create_date FROM m_user");
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }
}
