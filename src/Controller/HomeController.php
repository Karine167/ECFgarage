<?php

namespace App\Controller;

use App\Entity\Review;
use App\Form\ReviewType;
use App\Repository\InfosRepository;
use App\Repository\ReviewRepository;
use Doctrine\ORM\EntityManagerInterface;
use PharIo\Manifest\ContainsElement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(InfosRepository $infosRepository, Request $request, EntityManagerInterface $entityManager, ReviewRepository $reviewRepository): Response
    {   
        //recherche du path du logo
        $mappingsParams = $this->getParameter('vich_uploader.mappings');
        $imagePath = $mappingsParams['infos']['uri_prefix'].'/';
        
        //recherche des infos de l'accueil, du header et du footer 
        $infos = $infosRepository->getInfos();

        //récupération des commentaires validés
        $averageRate = $reviewRepository->getAverageRate();
        $reviewsApproved = $reviewRepository->findReviewApproved();
        
        //reviews
        $review = new Review();
        $form = $this->createForm(ReviewType::class, $review);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($review);
            $entityManager->flush();
            $this->addFlash(
                'success',
                'Votre commentaire a bien été pris en compte ! Il apparaîtra dans la liste des commentaires après approbation par nos services.'
            );
            return $this->redirectToRoute('app_home');
        }
    
        return $this->render('home/index.html.twig', [
            'director' => 'Vincent Parrot', 
            'infos' => $infos,
            'imagePath' => $imagePath,
            'form'=> $form,
            'reviewsApproved' => $reviewsApproved,
            'averageRate' => $averageRate
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

    #[Route('/newAdmin', name: 'app_newAdmin')]
    
    public function newAdmin(InfosRepository $infosRepository, Security $security): Response
    {
        //recherche du path du logo
        $mappingsParams = $this->getParameter('vich_uploader.mappings');
        $imagePath = $mappingsParams['infos']['uri_prefix'].'/';
        
        //recherche des infos de l'accueil, du header et du footer 
        $infos = $infosRepository->getInfos();

        $user = $security->getUser();
        if ($user && in_array('ROLE_EMPLOYEE', $user->getRoles())  ){
            return $this->render('admin/new_dashboard/newDashboard.html.twig', [
                'user' => $user,
                'infos' => $infos,
                'imagePath' => $imagePath,
                'page' => 'admin/new_dashboard/accueilNewDasboard.html.twig',
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
