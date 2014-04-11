<?php

namespace dao;

require_once dirname(__FILE__) . '/../util/import.php';

class UserDao {

    private $con;

    public function __construct() {
        $config = new \config\Config();
        $this->con = $config->getDbConnection();
    }

    public function __destruct() {
        $this->con->close();
    }

    public function getUser($email, $secret) {
        $stmt = $this->con->prepare("SELECT email FROM user where email = ? AND secret = ?");
        $stmt->bind_param("ss", $email, $secret);
        $stmt->execute();

        return $stmt->get_result()->num_rows == 1;
    }

}
