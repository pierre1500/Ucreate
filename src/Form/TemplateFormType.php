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
                'label' => 'Logo',
                'mapped' => false,
                'required' => true,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('Titre', TextType::class, [
                'label' => 'Titre',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('SousTitre', TextType::class, [
                'label' => 'Sous-titre',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('Image_de_fond', FileType::class, [
                'label' => 'Image de fond',
                'mapped' => false,
                'required' => true,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('Titre_de_la_deuxieme_section', TextType::class, [
                'label' => 'Titre de la deuxième section',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('Sous_titre_de_la_deuxieme_section', TextType::class, [
                'label' => 'Sous-titre de la deuxième section',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('Image_de_la_deuxieme_section', FileType::class, [
                'label' => 'Image de la deuxième section',
                'mapped' => false,
                'required' => true,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('Deuxieme_titre_de_la_deuxieme_section', TextType::class, [
                'label' => 'Deuxième titre de la deuxième section',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('Deuxieme_sous_titre_de_la_deuxieme_section', TextType::class, [
                'label' => 'Deuxième sous-titre de la deuxième section',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('Deuxieme_image_de_la_deuxieme_section', FileType::class, [
                'label' => 'Deuxième image de la deuxième section',
                'mapped' => false,
                'required' => true,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('Troisieme_titre_de_la_deuxieme_section', TextType::class, [
                'label' => 'Troisième titre de la deuxième section',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('Troisieme_sous_titre_de_la_deuxieme_section', TextType::class, [
                'label' => 'Troisième sous-titre de la deuxième section',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('Troisieme_image_de_la_deuxieme_section', FileType::class, [
                'label' => 'Troisième image de la deuxième section',
                'mapped' => false,
                'required' => true,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('Copiright', TextType::class, [
                'label' => 'Copiright',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
