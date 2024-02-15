<?php

namespace App\Form;

use App\Data\SearchData;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Range;

class SearchForm extends AbstractType
{
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('kmMin', NumberType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'km min',
                    'class' => 'col-2'
                ],
                'constraints' => [
                    new Range(['min'=> 0 , 'max'=> 3000000])
                ]
            ])
            ->add('kmMax', NumberType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'km max',
                    'class' => 'col-2'
                ],
                'constraints' => [
                    new Range(['min'=> 0 , 'max'=> 3000000])
                ]
            ])
            ->add('priceMin', NumberType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'prix min',
                    'class' => 'col-2'
                ],
                'constraints' => [
                    new Range(['min'=> 0 , 'max'=> 100000000])
                ]
            ])
            ->add('priceMax', NumberType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'prix max',
                    'class' => 'col-2'
                ],
                'constraints' => [
                    new Range(['min'=> 0 , 'max'=> 100000000])
                ]
            ])
            ->add('yearMin', NumberType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'année min',
                    'class' => 'col-2'
                ],
                'constraints' => [
                    new Range(['min'=> 1770 , 'max'=> 2200])
                ]
            ])
            ->add('yearMax', NumberType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'année max',
                    'class' => 'col-2'
                ],
                'constraints' => [
                    new Range(['min'=> 1770 , 'max'=> 2200])
                ]
            ])
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SearchData::class,
            'method' => 'GET',
            'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }

}