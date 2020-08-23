<?php

namespace App\Repository;

use App\Entity\CarCar;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CarCar|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarCar|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarCar[]    findAll()
 * @method CarCar[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarCarRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CarCar::class);
    }

    // /**
    //  * @return CarCar[] Returns an array of CarCar objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CarCar
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
