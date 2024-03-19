<?php

namespace App\Form;

use App\Entity\News;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class NewsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class)
            ->add('description', TextType::class)
            ->add('date', TextType::class)
            ->add('nombre1', IntegerType::class, [
                'required' => false,
            ])
            ->add('texte1', TextType::class, [
                'required' => false,
            ])
            ->add('nombre2', IntegerType::class, [
                'required' => false,
            ])
            ->add('texte2', TextType::class, [
                'required' => false,
            ])
            ->add('nombre3', IntegerType::class, [
                'required' => false,
            ])
            ->add('texte3', TextType::class, [
                'required' => false,
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Valider',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => News::class,
        ]);
    }
}
