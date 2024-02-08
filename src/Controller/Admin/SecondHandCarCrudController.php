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
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
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
        $mappingsParams = $this->getParameter('vich_uploader.mappings');
        $galeriesImagePath = $mappingsParams['galeries']['uri_prefix'];
        yield NumberField::new('price', 'Prix');
        yield IntegerField::new('kilometers', 'Km');
        yield DateField::new('circulation_year', 'Année de mise en circulation');
        yield IntegerField::new('fiscal_power', 'Puissance fiscale');
        yield IntegerField::new('din_power', 'Puissance DIN');
        yield IntegerField::new('doors', 'Nombre de portes');
        yield IntegerField::new('seats', 'Nombre de places');
        yield BooleanField::new('auto_gear_box', 'Boîte de vitesse automatique');
        yield IntegerField::new('critair_nb', 'Crit\'air');
        yield AssociationField::new('model', 'Modèle');
        yield AssociationField::new('type', 'Type');
        yield AssociationField::new('energies', 'Energies');
        yield AssociationField::new('colors', 'Couleurs');
        yield TextareaField::new('imageFile')->setFormType(VichImageType::class)->hideOnIndex();
        yield ImageField::new('imageName')->setBasePath($galeriesImagePath)->hideOnForm();
        //yield AssociationField::new('galeries', 'Photos');
        yield AssociationField::new('options', 'Options');
        yield AssociationField::new('equipments', 'Equipements');
        yield AssociationField::new('user', 'Employé');
        yield DateField::new('create_date', 'Date de mise en ligne');
    }
    
}
