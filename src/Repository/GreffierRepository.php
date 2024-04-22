<?php

namespace App\Repository;

use App\Entity\Greffier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Greffier>
 *
 * @method Greffier|null find($id, $lockMode = null, $lockVersion = null)
 * @method Greffier|null findOneBy(array $criteria, array $orderBy = null)
 * @method Greffier[]    findAll()
 * @method Greffier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GreffierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Greffier::class);
    }

//    /**
//     * @return Greffier[] Returns an array of Greffier objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('g.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Greffier
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
