<?php

namespace App\Controller\newAdmin;

use App\Repository\InfosRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewDashboardController extends AbstractController
{
    #[Route('/new_dashboard/employee', name: 'admin_employee')]
    public function employeeManagement(InfosRepository $infosRepository,UserRepository $userRepository, Security $security): Response
    {
        $page = 'admin/new_dashboard/employee.html.twig';
        //recherche du path du logo
        $mappingsParams = $this->getParameter('vich_uploader.mappings');
        $imagePath = $mappingsParams['infos']['uri_prefix'].'/';
        
        //recherche des infos de l'accueil, du header et du footer 
        $infos = $infosRepository->getInfos();

        //recherche des employés
        $employees = $userRepository->findAll();
        dump($employees);
        $user = $security->getUser();
        if ($user && in_array('ROLE_ADMIN', $user->getRoles())  ){
            return $this->render('admin/new_dashboard/newDashboard.html.twig', [
                'user' => $user,
                'infos' => $infos,
                'imagePath' => $imagePath,
                'page' => $page,
                'employees' => $employees,
            ]);
        } else {
            return $this->render('admin/new_dashboard/newDashboardError.html.twig', [
                'user' => $user,
                'infos' => $infos,
                'imagePath' => $imagePath,
            ]);
        };   
    }
}
