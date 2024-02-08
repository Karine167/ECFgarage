<?php

namespace App\Controller\Admin;

use App\Entity\SecondHandCar;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class SecondHandCarCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SecondHandCar::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->onlyOnIndex();
        yield TextField::new('reference', 'Référence');
        yield NumberField::new('price', 'Prix');
        yield IntegerField::new('kilometers', 'Km')->hideOnIndex();
        yield DateField::new('circulation_year', 'Mise en circulation');
        yield IntegerField::new('fiscal_power', 'Puissance fiscale')->hideOnIndex();
        yield IntegerField::new('din_power', 'Puissance DIN')->hideOnIndex();
        yield IntegerField::new('doors', 'Nombre de portes')->hideOnIndex();
        yield IntegerField::new('seats', 'Nombre de places')->hideOnIndex();
        yield BooleanField::new('auto_gear_box', 'Boîte automatique');
        yield IntegerField::new('critair_nb', 'Crit\'air')->hideOnIndex();
        yield AssociationField::new('model', 'Modèle');
        yield AssociationField::new('type', 'Type');
        yield AssociationField::new('energies', 'Energies');
        yield AssociationField::new('colors', 'Couleurs');
        yield AssociationField::new('options', 'Options');
        yield AssociationField::new('equipments', 'Equipements');
        yield AssociationField::new('user', 'Employé')->hideOnIndex();
        yield DateField::new('create_date', 'Date de mise en ligne')->hideOnIndex();
    }
    
}
