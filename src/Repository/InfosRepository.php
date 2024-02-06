<?php

namespace App\Repository;

use App\Entity\Infos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Infos>
 *
 * @method Infos|null find($id, $lockMode = null, $lockVersion = null)
 * @method Infos|null findOneBy(array $criteria, array $orderBy = null)
 * @method Infos[]    findAll()
 * @method Infos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InfosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Infos::class);
    }

    /**
    * @return Infos[] Returns an array of Infos objects
    * recherche du fichier contenant le logo 
    */
    public function getLogo():string
    {
        $infosImage = $this->findBy(['label' => 'Logo']);
        $imgLogo = $infosImage[0]->getImageName();
        return  $imgLogo;
    }

    /**
    * @return Infos[] Returns an array of Infos objects
    * recherche du fichier contenant les horaires pour la version mobile
    */
    public function getScheduleM():array
    {
        $infosSchedule = $this->findBy(['location' => 3]);
        dump($infosSchedule);
        foreach ($infosSchedule as $schedule){
            if (!($schedule->isHide())){
                $titleM = $schedule->getLabel();
                $contentM = $schedule->getContent();
            }
        }

        return  [
            'titleM' => $titleM,
            'contentM' => $contentM
        ];
    }

    /**
    * @return Infos[] Returns an array of Infos objects
    * recherche du fichier contenant les horaires pour la version Desktop
    */
    public function getScheduleD():array
    {
        $infosSchedule = $this->findBy(['location' => 4 ]);
        dump($infosSchedule);
        foreach ($infosSchedule as $schedule){
            if (!($schedule->isHide())){
                $titleD = $schedule->getLabel();
                $contentD = $schedule->getContent();
            }
        }

        return  [
            'titleD' => $titleD,
            'contentD' => $contentD
        ];
    }




    //   /**
    //   * @return Infos[] Returns an array of Infos objects
    //   * recherche du fichier contenant le logo 
    //   */
    //   /* public function findImageLogo(): string
    //   {
    //        $logo = $this->createQueryBuilder('i')
    //            ->andWhere('i.label = :val')
    //            ->setParameter('val', 'Logo')
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //        return $logo[0]->getImageName();  
    //    }


    //    /**
    //     * @return Infos[] Returns an array of Infos objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('i')
    //            ->andWhere('i.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('i.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Infos
    //    {
    //        return $this->createQueryBuilder('i')
    //            ->andWhere('i.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

}
