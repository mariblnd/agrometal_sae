<?php

namespace App\Form;

use App\Entity\ContactAgrometal;
use App\Entity\Entreprise;
use App\Entity\MediaSocial;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MediaSocialType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('link')
            ->add('image')
            ->add('title')
            ->add('active')
            ->add('contact', EntityType::class, [
                'class' => ContactAgrometal::class,
                'choice_label' => 'adress_title',
                'required' => false, // Rendre le champ non requis
                'placeholder' => 'Choisir un contact', 
            ])
            ->add('entreprise', EntityType::class, [
                'class' => Entreprise::class,
                'choice_label' => 'title',
                'required' => false, // Rendre le champ non requis
                'placeholder' => 'Choisir une entreprise',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MediaSocial::class,
        ]);
    }
}
