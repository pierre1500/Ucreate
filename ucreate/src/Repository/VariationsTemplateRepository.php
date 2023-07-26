<?php

namespace App\Repository;

use App\Entity\VariationsTemplate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<VariationsTemplate>
 *
 * @method VariationsTemplate|null find($id, $lockMode = null, $lockVersion = null)
 * @method VariationsTemplate|null findOneBy(array $criteria, array $orderBy = null)
 * @method VariationsTemplate[]    findAll()
 * @method VariationsTemplate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VariationsTemplateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VariationsTemplate::class);
    }

//    /**
//     * @return VariationsTemplate[] Returns an array of VariationsTemplate objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?VariationsTemplate
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
