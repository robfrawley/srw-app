<?php

namespace App\Repository;

use App\Entity\NamedLinkRedirect;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method NamedLinkRedirect|null find($id, $lockMode = null, $lockVersion = null)
 * @method NamedLinkRedirect|null findOneBy(array $criteria, array $orderBy = null)
 * @method NamedLinkRedirect[]    findAll()
 * @method NamedLinkRedirect[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NamedLinkRedirectRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, NamedLinkRedirect::class);
    }

//    /**
//     * @return NamedLinkRedirect[] Returns an array of NamedLinkRedirect objects
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
    public function findOneBySomeField($value): ?NamedLinkRedirect
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
