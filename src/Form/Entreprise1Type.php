<?php

namespace App\Form;

use App\Entity\Entreprise;
use App\Entity\MediaSocial;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Entreprise1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('logo')
            ->add('title')
            ->add('website')
            ->add('description')
            ->add('company_name')
            ->add('partner_from')
            ->add('creation_date')
            ->add('region')
            ->add('margin_top')
            ->add('margin_left')
            ->add('socialmedia', EntityType::class, [
                'class' => MediaSocial::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Entreprise::class,
        ]);
    }
}
