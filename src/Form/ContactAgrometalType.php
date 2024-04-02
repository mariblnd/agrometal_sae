<?php

namespace App\Form;

use App\Entity\ContactAgrometal;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactAgrometalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('adress')
            ->add('telephone')
            ->add('adress_title')
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
            'data_class' => ContactAgrometal::class,
        ]);
    }
}
