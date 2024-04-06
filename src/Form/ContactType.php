<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom et Prénom', 
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Message', 
            ])
            ->add('mail', TextType::class, [
                'label' => 'Email', 
            ])
            ->add('tel', TextType::class, [
                'label' => 'Téléphone', 
            ])
            ->add('brasserie_exist', CheckboxType::class, [
                'required' => false, 
                'label' => 'Oui'
            ])
            ->add('brasserie_name',TextType::class, [
                'required' => false,
                'label' => 'Nom de la Brasserie'
            ])
            ->add('project',TextareaType::class, [
                'required' => false,
                'label' => 'Que voulez-vous réaliser ?'
            ])
            ->add('save', SubmitType::class, array('label' => 'Envoyer votre message'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
{
    $resolver->setDefaults([
        'data_class' => Contact::class,
    ]);
}

}
