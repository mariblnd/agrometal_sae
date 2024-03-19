<?php

namespace App\Form;

use App\Entity\EquipmentsMinusOne;
use App\Entity\EquipmentsMinusTwo;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EquipmentsMinusTwoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('value')
            ->add('equipments_minus_one', EntityType::class, [
                'class' => EquipmentsMinusOne::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => EquipmentsMinusTwo::class,
        ]);
    }
}
