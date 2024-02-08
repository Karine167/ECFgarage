<?php

namespace App\Controller\Admin;

use App\Entity\Infos;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class InfosCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Infos::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        $mappingsParams = $this->getParameter('vich_uploader.mappings');
        $infosImagePath = $mappingsParams['infos']['uri_prefix'];
        yield TextField::new('label', 'Titre');
        yield TextEditorField::new('content', 'Détails');
        yield TextareaField::new('imageFile')->setFormType(VichImageType::class)->hideOnIndex();
        yield ImageField::new('imageName')->setBasePath($infosImagePath)->hideOnForm();
        //yield BooleanField::new('hide', 'caché');
        yield AssociationField::new('location', 'position');
    }
}