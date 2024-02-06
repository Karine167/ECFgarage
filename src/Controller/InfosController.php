<?php

namespace App\Controller;

use App\Repository\InfosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InfosController extends AbstractController
{
    
    public function index(InfosRepository $infosRepository): Response
    {
        $infosImage = $infosRepository->findBy(['label' => 'Logo']);
        $imgLogo = $infosImage[0]->getImageName();
        $mappingsParams = $this->getParameter('vich_uploader.mappings');
        $imgPath = $mappingsParams['infos']['uri_prefix'].'/'.$imgLogo;
        dump($imgPath);
        return $this->render('partials/header.html.twig', [
            'infosImage' => $infosImage,
            'imgPath' => $imgPath,
        ]);
    }
}
