<?php

namespace App\Form;

use App\Entity\Proprietes;
use App\Entity\TypesProprietes;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProprietesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', null, [
                'label' => 'Nom (*)',
                'attr' => [
                    'placeholder' => 'Nom',
                ],
            ])
            ->add('description', null, [
                'label' => 'Description (*)',
                'attr' => [
                    'placeholder' => 'Description',
                ],
            ])
            ->add('prix', null, [
                'label' => 'Prix (*)',
                'attr' => [
                    'placeholder' => 'Prix',
                ],
            ])
            ->add('adresse', null, [
                'label' => 'Adresse (*)',
                'attr' => [
                    'placeholder' => 'Adresse',
                ],
            ])
            ->add('surface', null, [
                'label' => 'Surface en m2 (*)',
                'attr' => [
                    'placeholder' => 'Surface',
                ],
            ])
            ->add('typesProprietes', EntityType::class, [
                'label' => 'Types',
                'class' => TypesProprietes::class,
                'choice_label' => 'nom',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Proprietes::class,
        ]);
    }
}
