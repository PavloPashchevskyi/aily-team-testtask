<?php

namespace AppBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * LinkRepository
 */
class LinkRepository extends EntityRepository
{
    /**
     * @return \Doctrine\ORM\Query
     */
    public function getFindAllQueryHandler()
    {
        return $this->createQueryBuilder('l')->getQuery();
    }
}
