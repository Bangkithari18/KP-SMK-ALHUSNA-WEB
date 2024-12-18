<?php

class MasterInfo
{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getInfo()
    {
        $stmt = $this->db->query("SELECT * FROM master_info");
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }

    public function addNewInfo($title, $content, $attachment, $create_user)
    {
        // Correct query: no need to insert the ID, it will auto-increment
        // Use CURDATE() for the create_date, if that is what you intend
        $query = "INSERT INTO master_info (title, content, attachment, create_date, create_user) 
                  VALUES (?, ?, ?, CURDATE(), ?)";

        // Prepare statement
        if ($stmt = $this->db->prepare($query)) {
            // Bind parameters
            // 'ssss' means 4 strings (title, content, attachment, create_user)
            $stmt->bind_param('ssss', $title, $content, $attachment, $create_user);

            // Execute the statement and check for success
            if ($stmt->execute()) {
                return true; // Success
            } else {
                return false; // Failure
            }
        } else {
            return false; // Prepare failed
        }
    }
}
