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
    public function index(Security $security, InfosRepository $infosRepository): Response
    {   
        $imgLogo = $infosRepository->findImageLogo();
        $mappingsParams = $this->getParameter('vich_uploader.mappings');
        $imgPath = $mappingsParams['infos']['uri_prefix'].'/'.$imgLogo;
        dump($imgPath);
        $user = $security->getUser();
        return $this->render('home/index.html.twig', [
            'director' => 'Vincent Parrot',
            'user' => $user,
            'imgPath' => $imgPath,
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
