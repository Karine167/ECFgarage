<?php

namespace App\Controller;

use App\Repository\InfosRepository;
use App\Repository\SecondHandCarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecondHandCarController extends AbstractController
{
    #[Route('/advert', name: 'app_advert')]
    public function index(SecondHandCarRepository $secondHandCarRepository,InfosRepository $infosRepository): Response
    {
        //recherche du path du logo
        $mappingsParams = $this->getParameter('vich_uploader.mappings');
        $imagePath = $mappingsParams['infos']['uri_prefix'].'/';
        
        //recherche des infos de l'accueil, du header et du footer 
        $infos = $infosRepository->getInfos();
        $secondHandCars = $secondHandCarRepository->findBy([], ['create_date' => 'DESC']);
        return $this->render('advert/index.html.twig', [
            'secondHandCars' => $secondHandCars,
            'infos' => $infos,
            'imagePath' => $imagePath
        ]);
    }
}
