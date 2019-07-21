<?php

namespace App\Form;

use App\Entity\Pet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

class PetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'mapped' => true,
                'attr' => [
                    'maxlength' => 50,
                    'autofocus' => true
                ],
                'required' => true,
                'constraints' => [
                    new Type('alpha'),
                    new NotBlank(),
                    new Length(['min' => 2, 'max' => 50]),
                ]
            ])
            ->add('type')
            ->add('sex')
            ->add('birthdate', BirthdayType::class, [
                'mapped' => true,
                'years' => range(1940,2019),
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Pet::class,
        ]);
    }
}
