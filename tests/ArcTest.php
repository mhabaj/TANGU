<?php

require __DIR__ . "/../src/Arc.php";//





class ArcTest extends PHPUnit\Framework\TestCase {

    public function testCreaArc() {

        $arc1 = new Arc("arc1",1,1,1,"conpound","rhbfgdgdvbngf",1);
        $this->assertEquals(1, $arc1->getArcID(), "L'arc n°1 n'a pas été crée");
        $arc2 = new Arc("arc2",9,2,9,"classique","dfrgrhsfdtfv",1);
        $this->assertEquals(2, $arc2->getArcID(), "L'arc n°2 n'a pas été crée");
        $arc3 = new Arc("arc3",1,1,1,"long","gfsiubercg",1);
        $this->assertEquals(3, $arc3->getArcID(), "L'arc n°3 n'a pas été crée");

    }

    public function testCheckArc() {

        $arc4 = new Arc("arc1",10,10,10,"conpound","rhbfgdgdvbngf",1);
        $this->assertNotFalse($arc4, "L'arc a été crée");

    }

}