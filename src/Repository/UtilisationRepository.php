<?php

namespace App\Repository;

use App\Entity\Utilisation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Utilisation>
 *
 * @method Utilisation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Utilisation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Utilisation[]    findAll()
 * @method Utilisation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UtilisationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Utilisation::class);
    }

    public function save(Utilisation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Utilisation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findUtilisation($identifiantVehicule, $identifiantPersonnel): ?Utilisation
    {
        $criteria = array('voiture_id' => $identifiantVehicule, );

        $utilisation = $this->findBy($criteria);

        if($utilisation == array()){
            $utilisation[0] = new Utilisation();
        }

        return $utilisation[0];
    }

//    /**
//     * @return Utilisation[] Returns an array of Utilisation objects
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

//    public function findOneBySomeField($value): ?Utilisation
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
