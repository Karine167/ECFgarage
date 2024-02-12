<?php

namespace App\Controller;

use App\Entity\SecondHandCar;
use App\Repository\GaleryRepository;
use App\Repository\InfosRepository;
use App\Repository\SecondHandCarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecondHandCarController extends AbstractController
{
    #[Route('/advert', name: 'app_advert')]
    public function index(SecondHandCarRepository $secondHandCarRepository,InfosRepository $infosRepository, GaleryRepository $galeryRepository): Response
    {
        //recherche du path du logo
        $mappingsParams = $this->getParameter('vich_uploader.mappings');
        $imagePath = $mappingsParams['infos']['uri_prefix'].'/';
        
        //recherche des infos de l'accueil, du header et du footer 
        $infos = $infosRepository->getInfos();
        $secondHandCars = $secondHandCarRepository->findBy([], ['create_date' => 'DESC']);
        // recherche de la première photo des véhicules
        $photos=[];
        foreach ($secondHandCars as $secondHandCar){
            $photoId = $secondHandCar->getId();
            $photo = $galeryRepository->findOneBy(['vehicle'=> $photoId]);
            if ($photo){
                $photoName = $photo->getImageName();
            }else{
                $photoName = null;
            }
            $photos[$photoId] = $photoName;
        }
        //chemin pour les photos des véhicules
        $photoPath = $mappingsParams['galeries']['uri_prefix'].'/';
        return $this->render('advert/index.html.twig', [
            'secondHandCars' => $secondHandCars,
            'infos' => $infos,
            'imagePath' => $imagePath,
            'photos' => $photos,
            'photoPath' => $photoPath
        ]);
    }

    #[Route('/advert/{id}', name: 'app_advert_oneCar')]
    public function showVehicle(SecondHandCar $secondHandCar, InfosRepository $infosRepository, GaleryRepository $galeryRepository): Response
    {
        dump($secondHandCar);
        //recherche du path du logo
        $mappingsParams = $this->getParameter('vich_uploader.mappings');
        $imagePath = $mappingsParams['infos']['uri_prefix'].'/';
        
        //recherche des infos de l'accueil, du header et du footer 
        $infos = $infosRepository->getInfos();

        $id = $secondHandCar->getId();
        dump($id);
        // recherche de toutes les images du véhicule
        $photos = $galeryRepository->findBy(['vehicle'=> $id]);
        dump($photos);
        //recherche du path des images 
        $mappingsParams = $this->getParameter('vich_uploader.mappings');
        $photoPath = $mappingsParams['galeries']['uri_prefix'].'/'; 

        return $this->render('advert/showOneCar.html.twig', [
            'infos' => $infos,
            'imagePath' => $imagePath,
            'secondHandCar' => $secondHandCar, 
            'photos' => $photos,
            'photoPath' => $photoPath 
        ]);
    }
}
