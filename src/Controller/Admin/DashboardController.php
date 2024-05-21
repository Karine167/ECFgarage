<?php

namespace App\Controller\Admin;

use App\Entity\Brand;
use App\Entity\Color;
use App\Entity\Contact;
use App\Entity\Energy;
use App\Entity\Equipments;
use App\Entity\Galery;
use App\Entity\Infos;
use App\Entity\Model;
use App\Entity\Options;
use App\Entity\Review;
use App\Entity\SecondHandCar;
use App\Entity\Type;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('GarageParrot');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Accueil', 'fa-solid fa-house-user', 'app_home');
        yield MenuItem::linkToDashboard('Tableau de bord', 'fa fa-home');
        yield MenuItem::linkToCrud('Employés', 'fas fa-user-tie', User::class)
        ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Informations', 'fas fa-book', Infos::class)
        ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Annonces','fa-solid fa-car', SecondHandCar::class);
        yield MenuItem::linkToCrud('Marque', 'fa-solid fa-trademark', Brand::class);
        yield MenuItem::linkToCrud('Modèle', 'fa-regular fa-id-card', Model::class);
        yield MenuItem::linkToCrud('Type', 'fa-solid fa-truck-pickup', Type::class);
        yield MenuItem::linkToCrud('Couleurs', 'fa-solid fa-palette', Color::class);
        yield MenuItem::linkToCrud('Energie', 'fa-solid fa-gas-pump', Energy::class);
        yield MenuItem::linkToCrud('Equipements', 'fa-solid fa-toolbox', Equipments::class);
        yield MenuItem::linkToCrud('Options', 'fa-solid fa-plus', Options::class);
        yield MenuItem::linkToCrud('Photos', 'fa-regular fa-images', Galery::class);
        yield MenuItem::linkToCrud('Commentaires', 'fa-regular fa-comment-dots', Review::class);
        yield MenuItem::linkToCrud('Demande de contact', 'fa-solid fa-phone', Contact::class);
        
    }

}
