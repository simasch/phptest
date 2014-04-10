<?php

namespace controller;

define('__ROOT__', dirname(dirname(__FILE__)));

include __ROOT__ . '/auth.php';

require_once __ROOT__ . '/dao/PersonDao.php';
require_once __ROOT__ . '/model/Person.php';

if (isset($_GET['function'])) {
    $host = $_SERVER['HTTP_HOST'];
    $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $page = '';
    $function = $_GET['function'];

    if ($function == 'addPerson') {
        $page = '../edit.php';
    } else if ($function == 'editPerson') {
        $page = '../edit.php?id=' . $_GET['id'];
    } else if ($function == 'savePerson') {
        $personController = new \controller\PersonController();
        $personController->savePerson();
        $page = '../index.php';
    }

    header("Location: http://$host$uri/$page");
    exit;
}

class PersonController {

    private $personDao;

    public function __construct() {
        $this->personDao = new \dao\PersonDao();
    }

    function savePerson() {
        $person = new \model\Person($_POST['id'], $_POST['name']);
        if ($_GET['new'] == 1) {
            $this->personDao->insertPerson($person);
        } else {
            $this->personDao->updatePerson($person);
        }
    }

    function getPerson($id) {
        return $this->personDao->getPerson($id);
    }

    function listPeople() {
        return $this->personDao->listPeople();
    }

}
