<?php

namespace App\Repository;

use App\Entity\Measure;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Measure|null find($id, $lockMode = null, $lockVersion = null)
 * @method Measure|null findOneBy(array $criteria, array $orderBy = null)
 * @method Measure[]    findAll()
 * @method Measure[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MeasureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Measure::class);
    }
}
