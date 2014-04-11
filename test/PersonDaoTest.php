<?php

namespace test;

require_once dirname(__FILE__) . '/../util/import.php';

class PersonDaoTest extends \PHPUnit_Framework_TestCase {

    public function testListPeople() {
        $personDao = new \dao\PersonDao();
        
        $list = $personDao->listPeople();
        
        $this->assertTrue(count($list) > 0);
    }

}
