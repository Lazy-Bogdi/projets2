<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class User1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('email', TextType::class, [
            'attr' => ['placeholder' => 'Email'],
            'label' => false
        ])
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'The password fields must match.',
                'options' => ['attr' => ['class' => 'password-field']],
                'mapped' => false,
                'required' => !$options['is_edit'],
                'first_options' => ['label' => 'Password'],
                'second_options' => ['label' => 'Repeat Password'],
            ])
            ->add('change_password', CheckboxType::class, [
                'mapped' => false,
                'required' => false,
                'label' => 'Change Password',
                'attr' => [
                    'class' => 'change-password-checkbox switch-input',
                ],
                'label_attr' => [
                    'class' => 'switch'
                ]
            ])
            ->add('lastname', TextType::class, [
                'attr' => ['placeholder' => 'Nom de famille'],
                'label' => false
            ])
            ->add('firstname', TextType::class, [
                'attr' => ['placeholder' => 'Prénom'],
                'label' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'is_edit' => false,
        ]);
    }
}