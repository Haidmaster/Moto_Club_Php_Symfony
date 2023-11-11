<?php

namespace App\Form;

use App\Entity\Marque;
use App\Entity\Modele;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ModeleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libelle', TextType::class, [
                'label' => 'Modèle',
                'attr' => [
                    'placeholder' => 'Saisir le modèle'
                ]
            ])
            ->add('marque', EntityType::class,[
                    'label' => 'Liste des marques',
                    // ChoiceType::class,
                    // 'choices' => [
                    //     'Honda' => 'Honda',
                    //     'Yamaha' => 'Yamaha',
                    //     'Suzuki' => 'Suzuki',
                    //     'Kawasaki' => 'Kawasaki',
                    //     'Ducati' => 'Ducati',
                    //     'Triumph' => 'Triumph',
                    //     'BMW' => 'BMW',
                    //     'KTM' => 'KTM',
                    //     'Harley-Davidson' => 'Harley-Davidson',
                    //     'Autre' => 'Autre'
                    // ],
                    'class' => Marque::class,
                    'choice_label' => 'libelle',
                    // 'mapped' => false,
                    'placeholder' => 'Choisir une marque',
                    'expanded' => false,
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Modele::class,
        ]);
    }
}
