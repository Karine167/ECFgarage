<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewDashboardController extends AbstractController
{
    #[Route('/new_dashboard/employee', name: 'admin_employee')]
    public function employeeManagement(): Response
    {
        return $this->render('new_dashboard/employee.html.twig', [
            
        ]);
    }
}
