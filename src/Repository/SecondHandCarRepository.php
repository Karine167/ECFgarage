<?php

namespace App\Repository;

use App\Data\SearchData;
use App\Entity\SecondHandCar;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\Expr\Select;
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

    /**
     * @return SecondHandCar[] Returns an array of SecondHandCar objects, after filters
    */
    public function findBySearch(SearchData $search) : array
    {
        $query = $this
            ->createQueryBuilder('s');
        if (!empty($search->kmMin)){
            $query = $query
                ->andWhere('s.kilometers >= :kmMin')
                ->setParameter('kmMin', $search->kmMin);
        }
        if (!empty($search->kmMax)){
            $query = $query
                ->andWhere('s.kilometers <= :kmMax')
                ->setParameter('kmMax', $search->kmMax);
        }
        if (!empty($search->priceMin)){
            $query = $query
                ->andWhere('s.price >= :priceMin')
                ->setParameter('priceMin', $search->priceMin);
        }
        if (!empty($search->priceMax)){
            $query = $query
                ->andWhere('s.price <= :priceMax')
                ->setParameter('priceMax', $search->priceMax);
        }
        if (!empty($search->yearMin)){
            $query = $query
                ->andWhere('s.circulation_year >= :yearMin')
                ->setParameter('yearMin', $search->yearMin.'-01-01');
        }
        if (!empty($search->yearMax)){
            $query = $query
                ->andWhere('s.circulation_year <= :yearMax')
                ->setParameter('yearMax', $search->yearMax.'-12-31');  
        }    
            
        $query = $query    
            ->orderBy('s.create_date', 'DESC');

        return $query->getQuery()->getResult();
    }


    /**
     * @return SecondHandCar[] Returns an array of SecondHandCar objects
     */
    public function findExtrema(): array
    {
        return $this->createQueryBuilder('s')
            ->Select ('min(s.kilometers), max(s.kilometers), min(s.price), max(s.price), min(s.circulation_year), max(s.circulation_year)')
            ->getQuery()
            ->getResult()
        ;
    }

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
