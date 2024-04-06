<?php

namespace App\Form;

use App\Entity\Equipments;
use App\Entity\EquipmentsMinusOne;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class EquipmentsMinusOneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('small_description')
            ->add('big_description')
            ->add('image',FileType::class, array('mapped' => false))
            ->add('equipments', EntityType::class, [
                'class' => Equipments::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => EquipmentsMinusOne::class,
        ]);
    }
}
