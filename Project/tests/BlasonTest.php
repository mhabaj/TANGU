<?php
/**
 * Created by PhpStorm.
 * User: belda
 * Date: 11/11/2018
 * Time: 15:28
 */

include "../controller/classes/Blason.php";
include "../controller/classes/User.php";

use PHPUnit\Framework\TestCase;

class BlasonTest extends TestCase {

    public function testCreaBlasonTrue() {

        $blason1 = new Blason("blason1", 40, "rgfghrgbr");
        $this->assertEquals(1, $blason1->getBlasonID(), "Le blason n°1 n'a pas été crée");
        $blason2 = new Blason("blason2", 60, "4hjht2fjgb5jjbg");
        $this->assertEquals(2, $blason2->getBlasonID(), "Le blason n°2 n'a pas été crée");

    }

    public function testModifBlason() {

        $blason = new Blason("blason3",15,"rhbfgdgdvbngf");
        $attr = array("NOMBLAS" => NULL, "TAILLEBLAS" => 20, "PHOTOBLAS" => "rthbhgfghbfhdr");
        $blason->modifierBlason($attr);
        $this->assertEquals("blason3", $blason->getNom(), "Le nom a été modifié");
        $this->assertEquals(20, $blason->getTaille(), "Le poids n'a pas été modifié");
        $this->assertEquals("rthbhgfghbfhdr", $blason->getPhoto(), "La photo n'a pas été modifié");

    }

    public function testSupprBlason() {

        $blason = new Blason("blason4",25,"rhbf5tfhh5bngf");
        $this->assertEquals(4, $blason->getBlasonID(), "Le blason n°4 n'a pas été crée");
        $blason->supprimerBlason();
        $this->assertEquals(null, $blason->getBlasonID(), "Le blason n°4 n'a pas été supprimé");

    }

    public function testCreaBlasonFalse() {

        $blason1 = new Blason(1,1,1);
        $this->assertEquals(null, $blason1->getBlasonID(), "Le blason n°1 a été crée");
        $blason2 = new Blason("arcf","","dfrgrhsfdtfv");
        $this->assertEquals(null, $blason2->getBlasonID(), "Le blason n°2 a été crée");
        $blason3 = new Blason(null,null,null);
        $this->assertEquals(null, $blason3->getBlasonID(), "Le blason n°3 a été crée");
        $blason4 = new Blason("arcf",10000000000000000000000000000000000,"rhbfgdgdvbngf");
        $this->assertEquals(null, $blason4->getBlasonID(), "Le blason n°4 a été crée");
        $blason5 = new Blason("yrutgbrughftgfhurikggtygidftgfrygtrutgfidfyutjyhryghhufdjkgryukdghg",1,"rhbfgdgdvbngf");
        $this->assertEquals(null, $blason5->getBlasonID(), "Le blason n°5 a été crée");
        $blason6 = new Blason("arcf",1,"conpoundytgrufbjyetfgybdryfedygrvydutusgybdyguurdggbtgfyrydcffghbyvbdfvbhv");
        $this->assertEquals(null, $blason6->getBlasonID(), "Le blason n°6 a été crée");

    }

    /**
     *
     */
    public function testCheckBlason() {

        $blason1 = new Blason("blason1", 10, "rhbfgdgdvbngf");
        $this->assertEquals(null, $blason1->getBlasonID() , "Le blason a été crée");

    }

}
