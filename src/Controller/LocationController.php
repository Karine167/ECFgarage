<?php

namespace App\Controller;

use App\Entity\Location;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LocationController extends AbstractController
{
    #[Route('/location', name: 'app_location')]
    public function createLocation(EntityManagerInterface $em): Response
    {
        $location1 = new Location();
        $location1->setPosition('warningM');
        $em->persist($location1);

        $location2 = new Location();
        $location2->setPosition('warningD');
        $em->persist($location2);

        $location3 = new Location();
        $location3->setPosition('scheduleM');
        $em->persist($location3);

        $location4 = new Location();
        $location4->setPosition('scheduleD');
        $em->persist($location4);

        $location5 = new Location();
        $location5->setPosition('contactM');
        $em->persist($location5);

        $location6 = new Location();
        $location6->setPosition('contactD');
        $em->persist($location6);

        $location7 = new Location();
        $location7->setPosition('info1M');
        $em->persist($location7);

        $location8 = new Location();
        $location8->setPosition('info1D');
        $em->persist($location8);

        $location9 = new Location();
        $location9->setPosition('info2M');
        $em->persist($location9);

        $location10 = new Location();
        $location10->setPosition('info2D');
        $em->persist($location10);

        $location11 = new Location();
        $location11->setPosition('info3M');
        $em->persist($location11);

        $location12 = new Location();
        $location12->setPosition('info3D');
        $em->persist($location12);

        $location13 = new Location();
        $location13->setPosition('info4M');
        $em->persist($location13);

        $location14 = new Location();
        $location14->setPosition('info4D');
        $em->persist($location14);
        
        $em->flush();
        return new Response('saved new locations');
    }
}
