<?php

namespace App\Form;

use App\Entity\Entreprise;
use App\Entity\PointCarte;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PointCarteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('region')
            ->add('margin_top')
            ->add('margin_left')
            ->add('entreprise', EntityType::class, [
                'class' => Entreprise::class,
                'choice_label' => 'title',
                'required' => false, 
                'placeholder' => 'Choisir une entreprise',
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PointCarte::class,
        ]);
    }
}
