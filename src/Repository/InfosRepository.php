<?php

namespace App\Repository;

use App\Entity\Infos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use phpDocumentor\Reflection\Types\Null_;

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
    * recherche des infos à afficher sur la page d'accueil
    */
    public function getInfos():array
    {
        $infosTab = $this->createQueryBuilder('i')
                ->andWhere('i.hide = :val')
                ->setParameter('val', 'false')
                ->orderBy('i.location', 'ASC')
                ->getQuery()
                ->getResult();
        //Réorganisation des infos issues de la BDD
        $infosAccueil=[]; 
        foreach ($infosTab as $infos){
            $location =$infos->getLocation()->getId();
            $title = $infos->getLabel();
            $content = $infos->getContent();
            $imageName = $infos->getImageName();
            $infosAccueil[]=['location' => $location, 'title' => $title, 'content' => $content,
            'imageName' => $imageName ];
        }
        
        // Complétion pour les données manquantes
        $infosAccueilFinal=[];
        $j=0 ;
        for ($i=0; $i<=15; $i++){
            if ($infosAccueil[$j]['location'] != $i) {
                $infosAccueilFinal[] = ['location' => $i, 'title' => 'En Construction', 'content' => 'En construction',
                'imageName' => null ];
            } else {
                $infosAccueilFinal[] = $infosAccueil[$j];
                $j +=1;
            }
        }
        
        return  $infosAccueilFinal;
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
