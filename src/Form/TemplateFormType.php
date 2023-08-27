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
                ],
                'label' => false
            ])
            ->add('Titre', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => false
            ])
            ->add('SousTitre', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => false
            ])
            ->add('Titre_de_la_deuxieme_section', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => false
            ])
            ->add('Sous_titre_de_la_deuxieme_section', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => false
            ])
            ->add('Image_de_la_deuxieme_section', FileType::class, [
                'mapped' => false,
                'required' => false,
                'attr' => [
                    'class' => 'custom-file-input', // Ajoutez des classes CSS personnalisées si nécessaire
                ],
                'label_attr' => [
                    'class' => 'custom-file-label', // Classe pour le label (peut être personnalisée)
                ],
                'label' => false
            ])
            ->add('Deuxieme_titre_de_la_deuxieme_section', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => false
            ])
            ->add('Deuxieme_sous_titre_de_la_deuxieme_section', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => false
            ])
            ->add('Deuxieme_image_de_la_deuxieme_section', FileType::class, [
                'mapped' => false,
                'required' => false,
                'attr' => [
                    'class' => 'custom-file-input'
                ],
                'label' => false
            ])
            ->add('Troisieme_titre_de_la_deuxieme_section', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => false
            ])
            ->add('Troisieme_sous_titre_de_la_deuxieme_section', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => false
            ])
            ->add('Troisieme_image_de_la_deuxieme_section', FileType::class, [
                'mapped' => false,
                'required' => false,
                'attr' => [
                    'class' => 'custom-file-input'
                ],
                'label' => false
            ])
            ->add('Copyright', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
        ]);
    }
}
