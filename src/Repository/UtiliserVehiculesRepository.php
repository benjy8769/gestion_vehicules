<?php

namespace App\Repository;

use App\Entity\UtiliserVehicules;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UtiliserVehicules>
 *
 * @method UtiliserVehicules|null find($id, $lockMode = null, $lockVersion = null)
 * @method UtiliserVehicules|null findOneBy(array $criteria, array $orderBy = null)
 * @method UtiliserVehicules[]    findAll()
 * @method UtiliserVehicules[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UtiliserVehiculesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UtiliserVehicules::class);
    }

    public function save(UtiliserVehicules $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(UtiliserVehicules $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return UtiliserVehicules[] Returns an array of UtiliserVehicules objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?UtiliserVehicules
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
