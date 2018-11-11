<?php

include "../controller/classes/Arc.php";

/**
 * Class ArcTest
 */
class ArcTest extends PHPUnit\Framework\TestCase {

    /**
     *
     */
    public function testCreaArc() {

        $arc1 = new Arc("arc1",1,1,1,"conpound","rhbfgdgdvbngf");
        $this->assertEquals(1, $arc1->getArcID(), "L'arc n°1 n'a pas été crée");
        $arc2 = new Arc("arc2",9,2,9,"classique","dfrgrhsfdtfv");
        $this->assertEquals(2, $arc2->getArcID(), "L'arc n°2 n'a pas été crée");
        $arc3 = new Arc("arc3",1,1,1,"long","gfsiubercg");
        $this->assertEquals(3, $arc3->getArcID(), "L'arc n°3 n'a pas été crée");

    }

    /**
     *
     */
    public function testCheckArc() {

        $arc4 = new Arc("arc1",10,10,10,"conpound","rhbfgdgdvbngf");
        $this->assertNotFalse($arc4, "L'arc a été crée");

    }

}
