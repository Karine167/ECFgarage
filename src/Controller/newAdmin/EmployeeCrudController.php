<?php

namespace App\Controller\newAdmin;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\InfosRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

use function PHPUnit\Framework\isNull;

#[Route('/newAdmin/employee', name: 'admin_employee_')]
class EmployeeCrudController extends AbstractController 
{

    #[Route('/show/{id}', methods:['GET'], name: 'show')]
    public function showEmployee(int $id, User $employee, InfosRepository $infosRepository, UserRepository $userRepository, Security $security): Response
    {
        $page = 'admin/newAdmin/employee_show.html.twig';
        //recherche du path du logo
        $mappingsParams = $this->getParameter('vich_uploader.mappings');
        $imagePath = $mappingsParams['infos']['uri_prefix'].'/';
        
        //recherche des infos de l'accueil, du header et du footer 
        $infos = $infosRepository->getInfos();

        //recherche des employés
        $employee = $userRepository->findOneById($id);

        $user = $security->getUser();
        if ($user && in_array('ROLE_ADMIN', $user->getRoles())  ){
            return $this->render('admin/newAdmin/newDashboard.html.twig', [
                'user' => $user,
                'infos' => $infos,
                'imagePath' => $imagePath,
                'page' => $page,
                'employee' => $employee,
            ]);
        } else {
            return $this->render('admin/newAdmin/newDashboardError.html.twig', [
                'user' => $user,
                'infos' => $infos,
                'imagePath' => $imagePath,
            ]);
        };   
    }

    #[Route('/edit/{id}', name: 'edit')]
    #[Route('/create', name: 'create')]
    #[IsGranted('ROLE_ADMIN')]
    public function edit(Request $request, EntityManagerInterface $em, ?User $employee = null, InfosRepository $infosRepository, Security $security): Response
    {
        $page = 'admin/newAdmin/employee_edit.html.twig';
        //recherche du path du logo
        $mappingsParams = $this->getParameter('vich_uploader.mappings');
        $imagePath = $mappingsParams['infos']['uri_prefix'].'/';
        
        //recherche des infos de l'accueil, du header et du footer 
        $infos = $infosRepository->getInfos();
        $isCreate = !($employee->getId());

        $user = $security->getUser();

        $employeeToModify = $employee ?? new User(); 
        
        $form = $this->createForm(UserType::class, $employeeToModify, [
            'require_password' => $isCreate,
        ]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            dump($employeeToModify);
            /** @var User $employeeToModify */
            $employeeToModify = $form->getData();
            $em->persist($employeeToModify);
            $em->flush();

            $this->addFlash('success', $isCreate ? 'L\'employé a bien été créé' : 'L\'employé a bien été modifié');
            return $this->redirectToRoute('admin_employee_list');
        }

        return $this->render('admin/newAdmin/newDashboard.html.twig', [
            'user' => $user,
            'infos' => $infos,
            'imagePath' => $imagePath,
            'page' => $page,
            'employee' => $employeeToModify,
            'form' => $form,
            'is_create' => $isCreate
        ]);   
    }
        
    #[Route('/delete/{id}', name: 'delete')]
    #[IsGranted('ROLE_ADMIN')]
    public function delete(EntityManagerInterface $em, User $employee, InfosRepository $infosRepository, Security $security): Response
    {
        $page = 'admin/newAdmin/employee_edit.html.twig';
        //recherche du path du logo
        $mappingsParams = $this->getParameter('vich_uploader.mappings');
        $imagePath = $mappingsParams['infos']['uri_prefix'].'/';
        
        //recherche des infos de l'accueil, du header et du footer 
        $infos = $infosRepository->getInfos();
        
        $user = $security->getUser();
        // rechercher de l'employé à supprimer 
        try {
        $em->remove($employee);
        $em->flush();
        $this->addFlash('success', 'L\'employé a bien été supprimé');
        return $this->redirectToRoute('admin_employee_list');
        }catch (Exception $e){
            $this->addFlash('danger', 'L\'employé n\'a pas pu être supprimé.');
        return $this->render('admin/newAdmin/newDashboard.html.twig', [
                    'user' => $user,
                    'infos' => $infos,
                    'imagePath' => $imagePath,
                    'page' => $page,
                    'employee' => $employee,
                ]);   
        }

    }



}
