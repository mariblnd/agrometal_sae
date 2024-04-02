<?php

namespace App\Form;

use App\Entity\Entreprise;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EntrepriseType extends AbstractType
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
            ->add('instagramActive')
            ->add('instagram')
            ->add('linkedinActive')
            ->add('linkedin')
            ->add('facebookActive')
            ->add('facebook')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Entreprise::class,
        ]);
    }
}
