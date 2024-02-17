<?php

namespace App\Controller\Admin;

use App\Entity\Infos;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
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
        yield IdField::new('id')->hideOnForm();
        $mappingsParams = $this->getParameter('vich_uploader.mappings');
        $infosImagePath = $mappingsParams['infos']['uri_prefix'];
        yield TextField::new('label', 'Titre');
        yield TextEditorField::new('content', 'Détails');
        yield BooleanField::new('hide', 'caché');
        yield AssociationField::new('location', 'position');
        yield TextareaField::new('imageFile','Choix de l\'image : <br> <strong> Attention, si vous décidez de supprimer 
        l\'image actuelle, cette action est irréversible ! <strong> <br> Les images ne concernent que les positions 
        suivantes : Warning, infos et logo.')->setFormType(VichImageType::class)->hideOnIndex();
        yield ImageField::new('imageName')->setBasePath($infosImagePath)->hideOnForm();
        
        
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->remove(Crud::PAGE_INDEX, Action::DELETE);
            
    } 

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
        ->setDefaultSort(['location' => 'DESC', 'id' => 'ASC']);
    }
}