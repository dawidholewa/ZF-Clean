<?php
class UserTest extends Zend_Test_PHPUnit_ControllerTestCase
{
    public function setUp()
    {

    }
    public function testCanCreateUser()
    {
        $u = new Model_User();
        $u->email = 'jon@lebensold.ca';
        $u->name = "Jon Lebensold";
        $u->save();
        $this->assertTrue(intval($u->id) === 1);

        $u2 = new Model_User();
        $u2->email = 'jane@example.com';
        $u2->name = 'jane doe';
        $u2->save();
        $this->assertTrue(intval($u2->id) === 2);
    }
    public function tearDown()
    {
        
    }
}
