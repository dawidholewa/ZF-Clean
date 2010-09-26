<?php
class IndexControllerTest extends ControllerTestCase {
    
    public function setUp() {
        parent::setUp();
    }
    
    public function testCanGetToIndexPage() {
        $this->dispatch("/");
        $this->assertController("index");
        $this->assertAction("index");
        $this->assertResponseCode(200);
        
        $this->assertXpathContentContains("id('content')", "Controller");
    }
}

