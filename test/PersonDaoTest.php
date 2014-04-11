<?php

namespace test;

require_once dirname(__FILE__) . '/../util/import.php';

class PersonDaoTest extends \PHPUnit_Framework_TestCase {

    private static $personDao;

    /**
     * @beforeClass
     */
    public static function beforeClass() {
        self::$personDao = new \dao\PersonDao();
    }

    public function testListPeople() {
        $list = self::$personDao->listPeople();

        $this->assertTrue(count($list) > 0);
    }

    public function testGetPerson() {
        $person = self::$personDao->getPerson(1);

        $this->assertNotNull($person);
    }

    public function testInsertPerson() {
        $person = new \model\Person(NULL, "Test");
        $person = self::$personDao->insertPerson($person);
        
        $this->assertNotNull($person->getId());
    }

    public function testUpdatePerson() {
        $person = self::$personDao->getPerson(1);
        $this->assertNotNull($person);

        self::$personDao->updatePerson($person);
    }

}
