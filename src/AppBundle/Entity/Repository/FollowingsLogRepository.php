<?php

namespace AppBundle\Entity\Repository;

use AppBundle\Entity\Link;
use Doctrine\ORM\EntityRepository;

/**
 * FollowingsLogRepository
 */
class FollowingsLogRepository extends EntityRepository
{
    public function viewLinkStatistics(Link $link)
    {
        $query = $this->createQueryBuilder('fl')
            ->select('l.short, fl.ip, fl.browser, COUNT(fl) AS followingsCount')
            ->leftJoin('fl.link', 'l')
            ->where('l.short = :link')
            ->groupBy('fl.ip, fl.browser')
            ->setParameter('link', $link->getShort())
        ;

        return $query->getQuery();
    }
}
