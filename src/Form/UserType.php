<?php

namespace App\Form;

use App\Entity\Contact;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Validator\ValidatorExtension;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Test\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('roles', ChoiceType::class, [
                'choices' => [
                    'ROLE_ADMIN' => 'ROLE_ADMIN',
                    'ROLE_EMPLOYEE' => 'ROLE_EMPLOYEE',
                ],
                'multiple' => true])
            ->add('firstname', TextType::class, [
                'label' => 'Prénom'
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Nom'
            ])
            ->add('telephon',TextType::class, [
                'label' => 'N° de téléphone'
            ])
            ->add('address', TextType::class, [
                'label' => 'Adresse'
            ])
            
            ->add('password', RepeatedType::class, [
                'type' => TextType::class,
                'row_attr' => ['type' => 'password'],
                'first_options'  => ['label' => 'Mot de passe', 
                    'help' => 'Le mot de passe doit faire au moins 15 caratères, et comporter des minuscules, des majuscules, des chiffres et des caractères spéciaux.',
                    ],
                'second_options'  => ['label' => 'Confirmation du mot de passe',],
                'required' => $options['require_password'],
            ]) 
        
            /* ->add('contacts', EntityType::class, [
                'class' => Contact::class,
                'choice_label' => 'id',
                'multiple' => true,
            ]) */
            ->add('save', SubmitType::class, [
                'label' => 'Enregistrer',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'require_password' => false,
        ]);

        $resolver->setAllowedTypes('require_password', 'bool');
    }
    
}