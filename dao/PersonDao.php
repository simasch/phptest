<?php

namespace dao;

require_once dirname(__FILE__) . '/../util/import.php';

class PersonDao {

    private $con;

    public function __construct() {
        $config = new \config\Config();
        $this->con = $config->getDbConnection();
    }

    public function __destruct() {
        $this->con->close();
    }

    public function listPeople() {
        $result = $this->con->query("SELECT id, name FROM person order by id");

        $array = array();

        while ($row = $result->fetch_array()) {
            $person = new \model\Person($row['id'], $row['name']);
            $array[] = $person;
        }
        $result->close();

        return $array;
    }

    public function getPerson($id) {
        $stmt = $this->con->prepare("SELECT id, name FROM person where id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_array();

        $person = new \model\Person($row['id'], $row['name']);
        return $person;
    }

    public function insertPerson(\model\Person $person) {
        $stmt = $this->con->prepare("INSERT INTO person (name) VALUES (?)");
        $stmt->bind_param("s", $person->getName());
        $stmt->execute();
        $id = $this->con->insert_id;
        $stmt->close();
        
        $person->setId($id);
        return $person;
    }

    public function updatePerson(\model\Person $person) {
        $stmt = $this->con->prepare("UPDATE person SET name = ? WHERE id = ?");
        $stmt->bind_param("si", $person->getName(), $person->getId());
        $stmt->execute();
        $stmt->close();
    }

}
