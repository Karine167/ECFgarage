<?php

namespace App\Controller;

use App\Entity\Equipments;
use App\Entity\SecondHandCar;
use App\Repository\EquipmentsRepository;
use App\Repository\GaleryRepository;
use App\Repository\InfosRepository;
use App\Repository\SecondHandCarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class SecondHandCarController extends AbstractController
{
    #[Route('/advert', name: 'app_advert')]
    public function index(SecondHandCarRepository $secondHandCarRepository,InfosRepository $infosRepository, GaleryRepository $galeryRepository,
    Request $request, SessionInterface $sessionInterface): Response
    {   
        //récupération des données de la précédente recherche
        $sessionInterface->set('previous_url', $request->getUri());

        //recherche du path du logo
        $mappingsParams = $this->getParameter('vich_uploader.mappings');
        $imagePath = $mappingsParams['infos']['uri_prefix'].'/';
        
        //recherche des infos de l'accueil, du header et du footer 
        $infos = $infosRepository->getInfos();

        // recherche des valeurs extrêmes 
        $extrema = $secondHandCarRepository->findExtrema();
        $kmMinCar = $extrema[0][1];
        $kmMaxCar = $extrema[0][2]; 
        $priceMinCar = $extrema[0][3];
        $priceMaxCar = $extrema[0][4]; 
        $yearMinCar =  $extrema[0][5]; 
        $yearMaxCar = $extrema[0][6];
        
        //récupération des choix de filtres
        $kmMin = $request->get('kmMin');
        $kmMax = $request->get('kmMax');
        $priceMin = $request->get('priceMin');
        $priceMax = $request->get('priceMax');
        $yearMin = $request->get('yearMin');
        $yearMax = $request->get('yearMax');

        $secondHandCars = $secondHandCarRepository->search($kmMin, $kmMax, $priceMin, $priceMax, $yearMin, $yearMax);
        
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
            'photoPath' => $photoPath,
            'kmMinCar' => $kmMinCar,
            'kmMaxCar' => $kmMaxCar, 
            'priceMinCar' => $priceMinCar,
            'priceMaxCar' => $priceMaxCar,
            'yearMinCar' => $yearMinCar,
            'yearMaxCar' => $yearMaxCar
        ]);
    }

    #[Route('/advert/{id}', name: 'app_advert_oneCar')]
    public function showVehicle(SecondHandCar $secondHandCar, InfosRepository $infosRepository, GaleryRepository $galeryRepository, SecondHandCarRepository $secondHandCarRepository): Response
    {
        //recherche du path du logo
        $mappingsParams = $this->getParameter('vich_uploader.mappings');
        $imagePath = $mappingsParams['infos']['uri_prefix'].'/';
        
        //recherche des infos de l'accueil, du header et du footer 
        $infos = $infosRepository->getInfos();

        $id = $secondHandCar->getId();
        // recherche de toutes les images du véhicule
        $photos = $galeryRepository->findBy(['vehicle'=> $id]);

        //recherche du path des images 
        $mappingsParams = $this->getParameter('vich_uploader.mappings');
        $photoPath = $mappingsParams['galeries']['uri_prefix'].'/';
        
        //recherche des équipements du véhicule
        $equipments = $secondHandCar->showEquipments($secondHandCarRepository, $id);

        //recherche des options du véhicule
        $options = $secondHandCar->showOptions($secondHandCarRepository, $id);

        //recherche des couleurs du véhicule
        $colors = $secondHandCar->showColors($secondHandCarRepository, $id);

        //recherche des énergies du véhicule
        $energies = $secondHandCar->showEnergies($secondHandCarRepository, $id);
        
        return $this->render('advert/showOneCar.html.twig', [
            'infos' => $infos,
            'imagePath' => $imagePath,
            'secondHandCar' => $secondHandCar, 
            'photos' => $photos,
            'photoPath' => $photoPath,
            'equipments' => $equipments,
            'options' => $options,
            'colors' => $colors,
            'energies' => $energies
        ]);
    }
}
