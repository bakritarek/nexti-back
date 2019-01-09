<?php
/**
 * Created by PhpStorm.
 * User: tarek
 * Date: 09.10.18
 * Time: 14:07
 */

namespace CalendarBundle\Service;


use Doctrine\ORM\EntityManager;

class SyncData
{
    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function SynchroCalendar($systemid) {
        // Staff

    }

}