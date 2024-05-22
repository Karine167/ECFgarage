<?php

namespace App\Controller\newAdmin;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\InfosRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

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

    #[Route('/edit/{id}', methods:['GET'], name: '_edit')]
    #[Route('/create', name: '_create')]
    #[IsGranted('ROLE_ADMIN')]
    public function edit(Request $request, EntityManagerInterface $em, ?User $user = null, InfosRepository $infosRepository): Response
    {
        $page = 'admin/new_dashboard/employee_edit.html.twig';
        //recherche du path du logo
        $mappingsParams = $this->getParameter('vich_uploader.mappings');
        $imagePath = $mappingsParams['infos']['uri_prefix'].'/';
        
        //recherche des infos de l'accueil, du header et du footer 
        $infos = $infosRepository->getInfos();

        $isCreate = !$user;
        $employee = $user ?? new User(); 
        $form = $this->createForm(UserType::class, $employee);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var User $employee */
            $employee = $form->getData();
            $em->persist($employee);
            $em->flush();

            $this->addFlash('success', $isCreate ? 'L\'employé a bien été créé' : 'L\'employé a été modifié');
            return $this->redirectToRoute('admin_employee');
        }

        return $this->render('admin/new_dashboard/newDashboard.html.twig', [
            'user' => $user,
            'infos' => $infos,
            'imagePath' => $imagePath,
            'page' => $page,
            'employee' => $employee,
            'form' => $form,
            'is_create' => $isCreate
        ]);   
        
    }

}
