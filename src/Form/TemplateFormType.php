<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TemplateFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('logo', FileType::class, [
                'mapped' => false,
                'required' => false,
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
            ->add('Titre', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('SousTitre', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('Titre_de_la_deuxieme_section', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('Sous_titre_de_la_deuxieme_section', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('Image_de_la_deuxieme_section', FileType::class, [
                'mapped' => false,
                'required' => false,
                'attr' => [
                    'class' => 'custom-file-input'
                ]
            ])
            ->add('Deuxieme_titre_de_la_deuxieme_section', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('Deuxieme_sous_titre_de_la_deuxieme_section', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('Deuxieme_image_de_la_deuxieme_section', FileType::class, [
                'mapped' => false,
                'required' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('Troisieme_titre_de_la_deuxieme_section', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('Troisieme_sous_titre_de_la_deuxieme_section', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('Troisieme_image_de_la_deuxieme_section', FileType::class, [
                'mapped' => false,
                'required' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('Copyright', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
        ]);
    }
}
