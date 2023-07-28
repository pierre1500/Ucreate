<?php

namespace App\Repository;

use App\Entity\TemplateSite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TemplateSite>
 *
 * @method TemplateSite|null find($id, $lockMode = null, $lockVersion = null)
 * @method TemplateSite|null findOneBy(array $criteria, array $orderBy = null)
 * @method TemplateSite[]    findAll()
 * @method TemplateSite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TemplateSiteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TemplateSite::class);
    }

//    /**
//     * @return TemplateSite[] Returns an array of TemplateSite objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TemplateSite
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
