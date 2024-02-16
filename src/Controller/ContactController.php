<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\InfosRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\PseudoTypes\StringValue;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact/{ref}', name: 'app_contact')]
    public function index(InfosRepository $infosRepository, Request $request, EntityManagerInterface $manager): Response
    {
                
        //recherche du path du logo
        $mappingsParams = $this->getParameter('vich_uploader.mappings');
        $imagePath = $mappingsParams['infos']['uri_prefix'].'/';
        
        //recherche des infos de l'accueil, du header et du footer 
        $infos = $infosRepository->getInfos();
    
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $contact= $form->getData();
            $ref = $request->attributes->get('_route_params')['ref'];
            if ($ref){
                $contact->setContent($ref.' : '.$contact->getContent());
            }
            $manager->persist($contact);
            $manager->flush();

            $this->addFlash(
                'success',
                'Votre demande a bien été prise en compte !'
            );
            
            return $this->redirectToRoute('app_contact', ['ref'=> 'formContact']);
        }
        return $this->render('contact/index.html.twig', [
            'infos' => $infos,
            'imagePath' => $imagePath,
            'form' => $form->createView()
        ]);
    }
}
