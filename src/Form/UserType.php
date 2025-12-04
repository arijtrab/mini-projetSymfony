<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Name',
                    'class' => 'input--style-3'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Email',
                    'class' => 'input--style-3'
                ]
            ])
            ->add('password', PasswordType::class, [
                'label' => false,
                'mapped' => false, // Important pour le hasher avant de sauvegarder
                'attr' => [
                    'placeholder' => 'Password',
                    'class' => 'input--style-3'
                ]
            ])
            ->add('role', ChoiceType::class, [
                'label' => false,
                'choices' => [
                    'Client' => 'CLIENT',
                    'Organisateur' => 'ORGANISATEUR',
                ],
                'placeholder' => 'Role',
                'attr' => [
                    'class' => 'input--style-3'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
