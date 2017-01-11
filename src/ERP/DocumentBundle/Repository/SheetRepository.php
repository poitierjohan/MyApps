<?php

namespace ERP\DocumentBundle\Repository;

/**
 * SheetRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SheetRepository extends \Doctrine\ORM\EntityRepository
{
    public function findByUser($user)
    {
        $bq = $this->createQueryBuilder("s")
            ->where("s.user = :user")
            ->orderBy('s.name', 'ASC')
            ->setParameters([
                "user" => $user
            ]);
        return $bq->getQuery()->getResult();
    }
}
