<?php

namespace Uvweb\UvBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * CommentRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class NewsRepository extends EntityRepository
{
    public function findLastNews()
    {
        $queryBuilder = $this->createQueryBuilder('n');
        $queryBuilder->setMaxResults(20);
        $queryBuilder->orderBy('n.date', 'desc');
        return $queryBuilder->getQuery()->getResult();
    }
}
