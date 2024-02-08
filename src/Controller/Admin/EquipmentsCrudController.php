<?php

namespace App\Controller\Admin;

use App\Entity\Equipments;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EquipmentsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Equipments::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('equipment', 'Equipement');
    }
    
}
