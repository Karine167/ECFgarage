<?php

namespace App\Controller\newAdmin;

use App\Entity\User;
use App\Repository\InfosRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/newAdmin/employee', name: 'admin_employee')]
class EmployeeCrudController extends AbstractController 
{
    #[Route('/show/{id}', methods:['GET'], name: '_show')]
    public function showEmployee(int $id, User $employee, InfosRepository $infosRepository, UserRepository $userRepository, Security $security): Response
    {
        $page = 'admin/new_dashboard/employee_show.html.twig';
        //recherche du path du logo
        $mappingsParams = $this->getParameter('vich_uploader.mappings');
        $imagePath = $mappingsParams['infos']['uri_prefix'].'/';
        
        //recherche des infos de l'accueil, du header et du footer 
        $infos = $infosRepository->getInfos();

        //recherche des employés
        $employee = $userRepository->findOneById($id);
        dump($employee);
        $user = $security->getUser();
        if ($user && in_array('ROLE_ADMIN', $user->getRoles())  ){
            return $this->render('admin/new_dashboard/newDashboard.html.twig', [
                'user' => $user,
                'infos' => $infos,
                'imagePath' => $imagePath,
                'page' => $page,
                'employee' => $employee,
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
