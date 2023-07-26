<?php

namespace App\Repository;

use App\Entity\DomainTemplate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DomainTemplate>
 *
 * @method DomainTemplate|null find($id, $lockMode = null, $lockVersion = null)
 * @method DomainTemplate|null findOneBy(array $criteria, array $orderBy = null)
 * @method DomainTemplate[]    findAll()
 * @method DomainTemplate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DomainTemplateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DomainTemplate::class);
    }

//    /**
//     * @return DomainTemplate[] Returns an array of DomainTemplate objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DomainTemplate
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
