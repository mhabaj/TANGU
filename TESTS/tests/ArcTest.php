<?php

include "../controllers/classes/Arc.php";
include "../controllers/classes/User.php";


/**
 * Class ArcTest
 */
class ArcTest extends PHPUnit\Framework\TestCase {

    /**
     *
     */
    public function testCreaArctrue() {

        $arc1 = new Arc("arc1",15,25,10,"conpound","rhbfgdgdvbngf","blabla");
        $this->assertEquals(1, $arc1->getArcID(), "L'arc n°1 n'a pas été crée");
        $arc2 = new Arc("arc2",19,20,29,"classique","dfrgrhsfdtfv","rhbfgdgdvblalbabngf");
        $this->assertEquals(2, $arc2->getArcID(), "L'arc n°2 n'a pas été crée");

    }

    /**
     *
     */
    public function testCheckArc() {

        $arc1 = new Arc("arc1",10,10,10,"conpound","rhbfgdgdvbngf","rhbfgdgdvbngf");
        $this->assertEquals(null, $arc1->getArcID() , "L'arc a été crée");

    }



    public function testSupprArc() {

        $arc = new Arc("arc3",15,25,10,"conpound","rhbfgdgdvbngf","rhbfgdgdvbngf");
        $this->assertEquals(3, $arc->getArcID(), "L'arc n°3 n'a pas été crée");
        $arc->supprimerArc();
        $this->assertEquals(null, $arc->getArcID(), "L'arc n°3 n'a pas été supprimé");

    }

    /**
     *Le but de cette méthode de test est de montrer comment à la fois on peut reprerer des failles
     * dans le traitement des données avant la base de données et aussi comment la base de données
     * est configuré contre certains types d'erreurs.
     */
    public function testCreaArcFalse() {

        $arc1 = new Arc("arcf","","","","classique","dfrgrhsfdtfv","rhbfgdgdvbngf");
        $this->assertEquals(null, $arc1->getArcID(), "L'arc n°2 a été crée");
        $arc2 = new Arc(null,null,null,null,null,null,null);
        $this->assertEquals(null, $arc2->getArcID(), "L'arc n°3 a été crée");
        $arc3 = new Arc("arcf",1,10000000000000000000000000000000000,1,"conpound","rhbfgdgdvbngf","rhbfgdgdvbngf");
        $this->assertEquals(null, $arc3->getArcID(), "L'arc n°4 a été crée");
        $arc4 = new Arc("arcf",10000000000000000000000000000,1,1,"conpound","rhbfgdgdvbngf","rhbfgdgdvbngf");
        $this->assertEquals(null, $arc4->getArcID(), "L'arc n°5 a été crée");
        $arc5 = new Arc("arcf",1,1,1000000000000000000000000000000000000,"conpound","rhbfgdgdvbngf","rhbfgdgdvbngf");
        $this->assertEquals(null, $arc5->getArcID(), "L'arc n°6 a été crée");
        $arc6 = new Arc("yrutgbrughftgfhurikggtygidftgfrygtrutgfidfyutjyhryghhufdjkgryukdghg",1,1,1,"conpound","rhbfgdgdvbngf","rhbfgdgdvbngf");
        $this->assertEquals(null, $arc6->getArcID(), "L'arc n°7 a été crée");
        $arc7 = new Arc("arcf",1,1,1,"conpoundytgrufbjyetfgybdryfedygrvydutusgybdyguurdggbtgfyrydcffghbyvbdfvbhv","rhbfgdgdvbngf","rhbfgdgdvbngf");
        $this->assertEquals(null, $arc7->getArcID(), "L'arc n°8 a été crée");

    }

}