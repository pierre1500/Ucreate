<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'e-mail'
                ],
                'constraints' => [
                    new Regex(
                        '/^[a-zA-Z0-9.-_]+[@]{1}[a-zA-Z0-9.-_]+[.]{1}[a-z]{2,10}$/',
                        'Veuillez rentrer une addresse e-mail, Enfinnnn !'
                    )
                ],
                'label' => false
            ])
            ->add('lastname', TextType::class,[
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'nom'
                ],
                'empty_data' => 'Nom',
                'label' => false
            ])
            ->add('name', TextType::class,[
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'prénom'
                ],
                'empty_data' => 'Prénom',
                'label' => false
            ])
            ->add('plainPassword', PasswordType::class, [
                'mapped' => false,
                'attr' => [
                    'autocomplete' => 'new-password',
                    'class' => 'form-control',
                    'placeholder' => 'mot de passe'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuilez renseigner un mot de passe',
                    ]),
                   /* new Regex(
                        '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/',
                        'Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule et un chiffre'
                    ),*/
                ],
                'label' => false

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
