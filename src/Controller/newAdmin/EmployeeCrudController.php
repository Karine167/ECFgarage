<?php

namespace App\Controller\newAdmin;

use App\Entity\User;
use App\Form\UserNewType;
use App\Repository\InfosRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

use function PHPUnit\Framework\isNull;

#[Route('/newAdmin/employee', name: 'admin_employee_')]
class EmployeeCrudController extends AbstractController 
{

    #[Route('/show/{id}', name: 'show')]
    #[IsGranted('ROLE_EMPLOYEE')]
    public function showEmployee(int $id, User $employee, InfosRepository $infosRepository, UserRepository $userRepository, Security $security): Response
    {
        $user = $security->getUser();
        
        $page = 'admin/newAdmin/employee_show.html.twig';
        //recherche du path du logo
        $mappingsParams = $this->getParameter('vich_uploader.mappings');
        $imagePath = $mappingsParams['infos']['uri_prefix'].'/';
        
        //recherche des infos de l'accueil, du header et du footer 
        $infos = $infosRepository->getInfos();

        if ($this->isGranted('show', $employee)){
            //recherche de l'employé
            $employee = $userRepository->findOneById($id);
            
            return $this->render('admin/newAdmin/newDashboard.html.twig', [
                'user' => $user,
                'infos' => $infos,
                'imagePath' => $imagePath,
                'page' => $page,
                'employee' => $employee,
            ]);   
        } else {
            $page = 'admin/newAdmin/newDashboardError.html.twig';
            return $this->render('admin/newAdmin/newDashboard.html.twig', [
                'user' => $user,
                'infos' => $infos,
                'imagePath' => $imagePath,
                'page' => $page,
                'employee' => $employee,
            ]);   
        }
    }

    #[Route('/edit/{id}', name: 'edit', methods:['GET', 'POST'])]
    #[Route('/create', name: 'create')]
    #[IsGranted('ROLE_ADMIN')]
    public function edit(Request $request, EntityManagerInterface $em, Security $security, InfosRepository $infosRepository, UserPasswordHasherInterface $passwordHasher, ?User $employee = null ): Response
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
        if (!$isCreate) {
            $oldPassword = $employee->getPassword();
            $employeeToModify->setPassword('*******Entrer**votre***mot**de***passe**ici**********');
        }

        $form = $this->createForm(UserNewType::class, $employeeToModify, [
            'require_password' => $isCreate,
        ]);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var User $employeeToModify */
            $employeeToModify = $form->getData();
            $plaintextPassword = $employeeToModify->getPassword();
            
            if ((strlen($plaintextPassword) !== 60) && ($plaintextPassword !== '*******Entrer**votre***mot**de***passe**ici**********')){
                $hashedPassword = $passwordHasher->hashPassword(
                    $employeeToModify,
                    $plaintextPassword
                );
                $employeeToModify->setPassword($hashedPassword);
            }else{
                $employeeToModify->setPassword($oldPassword);
            }
            
            $em->persist($employeeToModify);
            $em->flush();

            $this->addFlash('success', $isCreate ? 'L\'employé a bien été créé' : 'L\'employé a bien été modifié');
            if ($isCreate){
                return $this->redirectToRoute('admin_employee_list');
            } else { 
                return $this->redirectToRoute('app_newAdmin');
            }
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
