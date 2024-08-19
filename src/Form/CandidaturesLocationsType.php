<?php

namespace App\Form;

use App\Entity\CandidaturesLocations;
use App\Entity\Proprietes;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CandidaturesLocationsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom_complet')
            ->add('email')
            ->add('telephone')
            ->add('statut')
            ->add('date_location', null, [
                'widget' => 'single_text',
            ])
            ->add('duree_location')
            // ->add('proprietes', EntityType::class, [
            //     'class' => Proprietes::class,
            //     'choice_label' => 'nom',
            //     'multiple' => true,
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CandidaturesLocations::class,
        ]);
    }
}
