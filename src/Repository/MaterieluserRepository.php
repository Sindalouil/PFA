<?php

namespace App\Repository;

use App\Entity\Materieluser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Materieluser|null find($id, $lockMode = null, $lockVersion = null)
 * @method Materieluser|null findOneBy(array $criteria, array $orderBy = null)
 * @method Materieluser[]    findAll()
 * @method Materieluser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaterieluserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Materieluser::class);
    }

    // /**
    //  * @return Materieluser[] Returns an array of Materieluser objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Materieluser
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
