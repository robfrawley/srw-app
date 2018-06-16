<?php

namespace App\Repository;

use App\Entity\NamedFileRedirect;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method NamedFileRedirect|null find($id, $lockMode = null, $lockVersion = null)
 * @method NamedFileRedirect|null findOneBy(array $criteria, array $orderBy = null)
 * @method NamedFileRedirect[]    findAll()
 * @method NamedFileRedirect[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NamedFileRedirectRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, NamedFileRedirect::class);
    }

//    /**
//     * @return NamedFileRedirect[] Returns an array of NamedFileRedirect objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NamedFileRedirect
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
