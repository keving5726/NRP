<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\GreaterThanOrEqual;
use Symfony\Component\Validator\Constraints\LessThanOrEqual;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nationality', ChoiceType::class, [
                'label_attr' => ['class' => 'sr-only'],
                'mapped' => false,
                'choices' => [
                    'V' => true,
                    'E' => false,
                ],
                'required' => true,
                'constraints' => [
                    new Type('bool'),
                ]
            ])
            ->add('idCard', NumberType::class, [
                'label_attr' => ['class' => 'sr-only'],
                'mapped' => false,
                'input' => 'string',
                'attr' => [
                    'placeholder' => 'Identification Card',
                    'maxlength' => 8,
                    'autofocus' => true
                ],
                'required' => true,
                'constraints' => [
                    new NotBlank(),
                    new Length(['min' => 7, 'max' => 8]),
                    new GreaterThanOrEqual(9000000),
                    new LessThanOrEqual(30000000),
                ]
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'mapped' => false,
                'invalid_message' => 'The password fields must match.',
                'first_options'  => [
                    'label_attr' => ['class' => 'sr-only'],
                    'attr' => [
                        'maxlength' => 30,
                        'placeholder' => 'Password',
                    ]
                ],
                'second_options' => [
                    'label_attr' => ['class' => 'sr-only'],
                    'attr' => [
                        'maxlength' => 30,
                        'placeholder' => 'Repeat Password',
                    ]
                ],
                'required' => true,
                'constraints' => [
                    new NotBlank(),
                    new Length(['min' => 6, 'max' => 30]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
