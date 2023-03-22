<?php

namespace App\Form;

use App\Entity\Information;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InformationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('pizza',ChoiceType::class,[
                'choices'  => [
                    'vleespizza' => 'vleespizza',
                    'vispizza' => 'vispizza',
                    'veggiepizza' => 'veggiepizza',
                ],
            ])
            ->add('size',ChoiceType::class,[
                'TextType'  => [
                    '25 cm' => '25 cm',
                    '35 cm' => '35 cm',
                    'calzone' => 'calzone',
                ],
            ])
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Order::class,
        ]);
    }
}
