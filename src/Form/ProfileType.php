<?php

namespace App\Form;

use App\Entity\Profile;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

class ProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class, [
                'mapped' => true,
                'attr' => [
                    'maxlength' => 50,
                    'autofocus' => true
                ],
                'required' => true,
                'constraints' => [
                    new Type('alpha'),
                    new NotBlank(),
                    new Length(['min' => 3, 'max' => 50]),
                ]
            ])
            ->add('lastName', TextType::class, [
                'mapped' => true,
                'attr' => [
                    'maxlength' => 50
                ],
                'required' => true,
                'constraints' => [
                    new Type('alpha'),
                    new NotBlank(),
                    new Length(['min' => 3, 'max' => 50]),
                ]
            ])
            ->add('sex')
            ->add('maritalStatus')
            ->add('birthdate', BirthdayType::class, [
                'mapped' => true,
                'years' => range(1940,2019),
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Profile::class,
        ]);
    }
}
