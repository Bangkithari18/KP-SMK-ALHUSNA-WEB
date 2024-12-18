<?php
// db_connection.php
$db = new mysqli('localhost', 'root', '', 'db_smk_alhusna');
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
