<?php

namespace App\Controller;

use App\Data\SearchData;

use App\Entity\Equipments;
use App\Entity\SecondHandCar;
use App\Form\SearchForm;
use App\Repository\EquipmentsRepository;
use App\Repository\GaleryRepository;
use App\Repository\InfosRepository;
use App\Repository\SecondHandCarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class SecondHandCarController extends AbstractController
{
    #[Route('/advert_list/{page?1}', name: 'app_advert_list')]
    public function index(SecondHandCarRepository $secondHandCarRepository,InfosRepository $infosRepository, GaleryRepository $galeryRepository,
    Request $request, SessionInterface $sessionInterface, $page): Response
    {   
        $nbre = 4;
        //récupération des données de la précédente recherche
        $sessionInterface->set('previous_url', $request->getUri());

        //recherche du path du logo
        $mappingsParams = $this->getParameter('vich_uploader.mappings');
        $imagePath = $mappingsParams['infos']['uri_prefix'].'/';
        
        //recherche des infos de l'accueil, du header et du footer 
        $infos = $infosRepository->getInfos();
        
        //formulaire de recherche
        $data = new SearchData();
        $form = $this->createForm(SearchForm::class, $data);

        // récupération des données du formulaire 
        $form->handleRequest($request);
        $message="";
        if ( $data->kmMax && $data->kmMin > $data->kmMax){
            $message = "Le nombre minimal de kilomètres  doit être inférieur au nombre maximal de kilomètres. ";
        } 
        if ($data->priceMax && $data->priceMin > $data->priceMax){
            $message .= "Le prix minimal doit être inférieur au prix maximal. ";
        } 
        if ($data->yearMax && $data->yearMin > $data->yearMax){
            $message .= "L'année minimale doit être inférieure à l'année maximale. ";
        } 
        if ($form->isSubmitted() && $form->isValid() && !($request->isXmlHttpRequest())){
            $kmMin = $data->kmMin;
            $kmMax = $data->kmMax;
            $priceMin = $data->priceMin;
            $priceMax = $data->priceMax;
            $yearMin = $data->yearMin;
            $yearMax = $data->yearMax;
            $secondHandCarsAll = $secondHandCarRepository->findBySearch($data); 
        }else{
            // initialisation des valeurs du filtre
            $kmMin = null;
            $kmMax = null;
            $priceMin = null;
            $priceMax = null;
            $yearMin = null;
            $yearMax = null;
            $secondHandCarsAll = $secondHandCarRepository->findBy([]);
        }
        
        // pagination
        $nbreCars = count($secondHandCarsAll);
        $nbrePage = ceil($nbreCars / $nbre);
        if ($nbrePage<$page) {
            $page = 1;
        }
        if ($nbrePage > 1) {
            $secondHandCars = array_slice($secondHandCarsAll,($page - 1)*$nbre ,$nbre);
            $isPaginated = true;
        }else{
            $secondHandCars = $secondHandCarsAll;
            $isPaginated = false;
        }
        
        if (!($request->isXmlHttpRequest())){
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
        }

        if ($request->isXmlHttpRequest()){
            return new JsonResponse([
                'content' => $this->renderView('advert_list/_Cars.html.twig', ['secondHandCars' => $secondHandCars])
            ]);
        }  
        //chemin pour les photos des véhicules
        $photoPath = $mappingsParams['galeries']['uri_prefix'].'/';

        return $this->render('advert_list/index.html.twig', [
            'secondHandCars' => $secondHandCars,
            'message' => $message,
            'infos' => $infos,
            'imagePath' => $imagePath,
            'photos' => $photos,
            'photoPath' => $photoPath,
            'nbrePage' => $nbrePage,
            'page' => $page,
            'nbre' => $nbre,
            'isPaginated' => $isPaginated, 
            'form' => $form->createView(),
            'kmMin' => $kmMin,
            'kmMax' => $kmMax,
            'priceMin' => $priceMin,
            'priceMax' => $priceMax,
            'yearMin' => $yearMin,
            'yearMax' => $yearMax,
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
