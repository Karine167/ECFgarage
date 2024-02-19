<?php

namespace App\Controller\Admin;

use App\Entity\Contact;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ContactCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Contact::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->onlyOnIndex();
        yield TextField::new('first_name', 'Prénom');
        yield TextField::new('last_name', 'Nom');
        yield EmailField::new('email', 'Adresse email');
        yield TextField::new('telephon', 'N° de téléphone: 0000000000');
        yield TextareaField::new('content','Demande de contact');
        yield TextareaField::new('comment','Commentaires (si non finalisée)');
        yield AssociationField::new('user', 'Personne référente');
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
        // Ajout de la suppression d'une demande de contact sur le formulaire d'édition
        ->add(Crud::PAGE_EDIT, Action::DELETE);
    }
}
