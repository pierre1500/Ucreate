<?php

namespace App\Repository;

use App\Entity\TemplateUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TemplateUser>
 *
 * @method TemplateUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method TemplateUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method TemplateUser[]    findAll()
 * @method TemplateUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TemplateUserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TemplateUser::class);
    }

//    /**
//     * @return TemplateUser[] Returns an array of TemplateUser objects
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

//    public function findOneBySomeField($value): ?TemplateUser
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
