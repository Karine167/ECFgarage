<?php

namespace App\Controller;

use App\Repository\InfosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(InfosRepository $infosRepository): Response
    {   
        //recherche du path du logo
        $imgLogo = $infosRepository->getLogo();
        $mappingsParams = $this->getParameter('vich_uploader.mappings');
        $imgPath = $mappingsParams['infos']['uri_prefix'].'/'.$imgLogo;
        $imagePath = $mappingsParams['infos']['uri_prefix'].'/';
        //recherche des horaires
        $scheduleM = $infosRepository->getScheduleM();
        $scheduleD = $infosRepository->getScheduleD();
        //recherche des contacts
        $contactM = $infosRepository->getContactM();
        $contactD = $infosRepository->getContactD();
        //recherche des infos de l'accueil 
        $infos = $infosRepository->getInfos();
        

        dump($infos);
        return $this->render('home/index.html.twig', [
            'director' => 'Vincent Parrot',
            'imgPath' => $imgPath,
            'scheduleM' => $scheduleM,
            'scheduleD' => $scheduleD,
            'contactM' => $contactM,
            'contactD' => $contactD, 
            'infos' => $infos,
            'imagePath' => $imagePath
        ]);
    }
    #[Route('/admin', name: 'app_admin')]
    public function admin(Security $security): Response
    {
        $user = $security->getUser();
        return $this->render('admin/dashboard.html.twig', [
            'user' => $user,
        ]);
    }
}
