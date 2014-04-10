<?php

namespace config;

class Config {

    private $con;

    public function __construct() {
        $this->con = new \mysqli("127.0.0.1", "root", "", "test");
        if ($this->con->connect_errno) {
            throw new Exception("Failed to connect to MySQL: " . $this->con->connect_error);
        }
    }

    public function getDbConnection() {
        return $this->con;
    }

}
