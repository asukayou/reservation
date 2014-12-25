<?php

namespace Ay\ReservationBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ay\ReservationBundle\Entity\Facility;

class LoadData implements FixtureInterface {

    public function load(ObjectManager $om) {
        $facility_a = new Facility();
        $facility_a->setName('会議室Ａ');
        $facility_a->setDeleted(false);
        $om->persist($facility_a);

        $facility_b = new Facility();
        $facility_b->setName('会議室Ｂ');
        $facility_b->setDeleted(true);
        $om->persist($facility_b);

        $facility_c = new Facility();
        $facility_c->setName('会議室Ｃ');
        $facility_c->setDeleted(false);
        $om->persist($facility_c);

        $om->flush();
    }

}
