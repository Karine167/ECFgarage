<?php

namespace App\Controller\Admin;

use App\Entity\Infos;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class InfosCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Infos::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('label', 'Titre');
        yield TextField::new('content', 'Détails');
        yield BooleanField::new('hide', 'caché');
        yield AssociationField::new('location', 'position');
    }
    
}
