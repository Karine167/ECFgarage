<?php

namespace App\Repository;

use App\Entity\SecondHandCar;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SecondHandCar>
 *
 * @method SecondHandCar|null find($id, $lockMode = null, $lockVersion = null)
 * @method SecondHandCar|null findOneBy(array $criteria, array $orderBy = null)
 * @method SecondHandCar[]    findAll()
 * @method SecondHandCar[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SecondHandCarRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SecondHandCar::class);
    }


    public function findOneByIdJoinedToEquipments(int $secondHandCarId): ?SecondHandCar
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT s, e
            FROM App\Entity\SecondHandCar s
            INNER JOIN s.equipments e
            WHERE s.id = :id'
        )->setParameter('id', $secondHandCarId);

        return $query->getOneOrNullResult();
    }

    public function findOneByIdJoinedToOptions(int $secondHandCarId): ?SecondHandCar
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT s, o
            FROM App\Entity\SecondHandCar s
            INNER JOIN s.options o
            WHERE s.id = :id'
        )->setParameter('id', $secondHandCarId);

        return $query->getOneOrNullResult();
    }

    public function findOneByIdJoinedToColor(int $secondHandCarId): ?SecondHandCar
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT s, c
            FROM App\Entity\SecondHandCar s
            INNER JOIN s.color c
            WHERE s.id = :id'
        )->setParameter('id', $secondHandCarId);

        return $query->getOneOrNullResult();
    }

    public function findOneByIdJoinedToEnergy(int $secondHandCarId): ?SecondHandCar
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT s, en
            FROM App\Entity\SecondHandCar s
            INNER JOIN s.energies en
            WHERE s.id = :id'
        )->setParameter('id', $secondHandCarId);

        return $query->getOneOrNullResult();
    }

//    /**
//     * @return SecondHandCar[] Returns an array of SecondHandCar objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?SecondHandCar
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
