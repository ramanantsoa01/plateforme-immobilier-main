<?php

namespace App\Controller\Admin;

use App\Entity\Proprietes;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ProprietesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Proprietes::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('Nom'),
            TextEditorField::new('description'),
            MoneyField::new('Prix')->setCurrency('MGA'),
            TextField::new('Adresse'),
            IntegerField::new('Surface'),
            // DateField::new('createdAt')->hideWhenCreating(),
            AssociationField::new('typesProprietes'),
            CollectionField::new('Photos')
                -> setEntryType(FileType::class)
                -> setFormTypeOptions
                ([
                    'required' => false,
                    'mapped' => false,
                    'entry_options' => ['label' => false],
                    'allow_add' => true,
                    'allow_delete' => true,
                ])
                ->onlyOnForms(),
            // DateField::new('updatedAt')->hideWhenUpdating(),

        ];
    }
    
}
