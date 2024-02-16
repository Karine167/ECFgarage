<?php

namespace App\Form;

use App\Entity\Review;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType as TypeTextType;
use Symfony\Component\Validator\Constraints as Assert;

class ReviewType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('rate', ChoiceType::class, [
                'choices' => [
                    '5' => '5',
                    '4' => '4',
                    '3' => '3',
                    '2' => '2',
                    '1' => '1',
                ], 
                'label' => 'Note',
                'label_attr' => [
                    'class' => 'form-label fs-4 fw-bold mt-2'
                ],
                'attr' => [
                    'class' => 'rate'
                ],
                'expanded' => true,
                'multiple' => false,
                ])
            ->add('username', TypeTextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'minlenght' => '2',
                    'maxlenght' => '50',
                ],
                'label' => 'Nom d\'utilisateur',
                'label_attr' => [
                    'class' => 'form-label mt-2 fs-4 fw-bold'
                ],
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Length(['min'=> 2, 'max' => 50])
                ]
                ])
            ->add('content', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'label' => 'Message',
                'label_attr' => [
                    'class' => 'form-label mt-2 fs-4 fw-bold'
                ],
                'constraints' => [
                    new Assert\NotBlank(),
                ]
                ])
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary mt-3'
                ],
                'label' => 'Envoyer le commentaire'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Review::class,
        ]);
    }
}
