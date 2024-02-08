<?php

namespace App\Controller\Admin;

use App\Entity\Galery;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class GaleryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Galery::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        $mappingsParams = $this->getParameter('vich_uploader.mappings');
        $galeriesImagePath = $mappingsParams['galeries']['uri_prefix'];
        yield TextareaField::new('imageFile')->setFormType(VichImageType::class)->hideOnIndex();
        yield ImageField::new('imageName')->setBasePath($galeriesImagePath)->hideOnForm();
        yield AssociationField::new('vehicle', 'Identifiant du véhicule');
    }
    
}
