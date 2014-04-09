<?php

namespace jtaf;

class JtafDao {

    private $con;

    function __construct() {
        $this->con = new \mysqli("127.0.0.1", "jtaf", "jtaf", "jtaf");

        if ($this->con->connect_errno) {
            echo "Failed to connect to MySQL: " . $this->con->connect_error;
        }
    }
    
    function __destruct() {
        $this->con->close();
    }

    public function listSecurityUsers() {
        $result = $this->con->query("SELECT email, firstName, lastName FROM SecurityUser");

        while ($row = $result->fetch_array()) {
            echo $row['email'] . " " . $row['firstName'] . " " . $row['lastName'];
            echo "<br>";
        }
        $result->close();
    }

}
