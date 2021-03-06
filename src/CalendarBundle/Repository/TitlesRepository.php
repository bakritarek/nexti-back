<?php

namespace CalendarBundle\Repository;

/**
 * TitlesRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TitlesRepository extends \Doctrine\ORM\EntityRepository
{
    public function getTitles($title1, $titlex) {
        $qb = $this->createQueryBuilder('t')
            ->select('t')
            ->where('t.name != :title1')
            ->andWhere('t.name != :titlex')
            ->setParameter('title1', $title1)
            ->setParameter('titlex', $titlex)
        ;

        return $qb->getQuery()->getResult();
    }
}
