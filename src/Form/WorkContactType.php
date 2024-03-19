<?php

namespace App\Form;

use App\Entity\ContactAgrometal;
use App\Entity\WorkContact;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WorkContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('mail')
            ->add('name')
            ->add('title')
            ->add('telephone')
            ->add('contact', EntityType::class, [
                'class' => ContactAgrometal::class,
                'choice_label' => 'adress_title',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => WorkContact::class,
        ]);
    }
}
